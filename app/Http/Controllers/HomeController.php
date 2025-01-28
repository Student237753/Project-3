<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Dossier;
use App\Models\Treatments;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   // Haalt alle data op van alle kolommen in de dossiers tabel
        $dossiers = Dossier::all();
        // Weergeeft index pagina en geeft alle gevonden dossiers door
        return view('index', compact('dossiers')); // Passes the data to the view
    }

    public function create()
    {
        // Weergeeft create pagina
        return view('create');
    }

    public function store(Request $request)
    {
        // Validatie controle voor alle nieuwe informatie
        $request->validate([
            'subject' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'research' => 'nullable|string|max:255',
            'symptoms' => 'required|string|max:255',
            'treatment' => 'nullable|string|max:255',
            'policy' => 'required|string|max:255',
            'caseexplanation' => 'nullable|string|max:255',
            'appointment' => 'nullable|date_format:Y-m-d H:i',
            'organs' => 'nullable|string|max:255',
        ]);

        // Maakt nieuwe dossier aan en vult het met de ingevoerde informatie
        $dossier = new Dossier();
        $diagnosis = new Diagnosis();
        $treatments = new Treatments();

        // Items die worden toegevoegd in tabel 'dossiers'
        $dossier->subject = $request->input('subject');
        $dossier->type = $request->input('type');
        $dossier->appointment = $request->has('appointment');

        // Items die worden toegevoegd in tabel 'treatments'
        $treatments->treatment = $request->input('treatment');
        $treatments->policy = $request->input('policy');

        // Items die worden toegevoegd in tabel 'diagnosis'
        $diagnosis->symptoms = $request->input('symptoms');
        $diagnosis->caseexplanation = $request->input('caseexplanation');
        $diagnosis->research = $request->input('research');
        $diagnosis->organs = $request->input('organs');

        // Slaat de gevalideerde informatie op in de database voor de nieuwe dossier
        $diagnosis->save();
        $dossier->save();
        // Redirect naar de index pagina
        return redirect()->route('index');
    }

    public function show(string $id)
    {
        // Haalt het dossier door middel van id en de bijbehorende diagnoses
        $dossier = Dossier::with('diagnoses.treatments')->findOrFail($id);
        // Weergeeft show pagina en geeft het gevonden dossier met de bijbehorende diagnose door.
        return view('show', compact('dossier'));
    }

    public function edit($id)
    {
        // Haalt het dossier door middel van id
        $dossier = Dossier::findOrFail($id);
        // Weergeeft edit pagina en geeft het gevonden dossier door.
        return view('edit', compact('dossier'));
    }

    public function update(Request $request, $id)
    {
        // Haalt het dossier door middel van id
        $dossier = Dossier::findOrFail($id);
        // Validatie voor de nieuwe informatie
        $request->validate([
            'subject' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'research' => 'nullable|string|max:255',
            'symptoms' => 'required|string|max:255',
            'treatment' => 'nullable|string|max:255',
            'policy' => 'required|string|max:255',
            'caseexplanation' => 'nullable|string|max:255',
            'appointment' => 'nullable|date_format:Y-m-d H:i',
            'organs' => 'nullable|string|max:255',
        ]);
        // Update alle nieuwe informatie voor het dossier
        $dossier->update($request->all());

        if ($request->has('organs')) {
            $dossier->organs = implode(',', $request->organs);
            $dossier->save();
        }
        // Redirect naar index pagina
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        // Haalt het dossier door middel van id
        $dossier = Dossier::findOrFail($id);
        // Verwijdert de diagnose die aan dit dossier gekoppeld is
        $dossier->diagnoses()->delete();
        // Verwijdert het dossier
        $dossier->delete();
        // Redirect naar de vorige pagina
        return redirect()->back();
    }
}
