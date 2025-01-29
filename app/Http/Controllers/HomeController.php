<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Dossier;
use App\Models\Treatments;
use App\Models\Organ;
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
            'policy' => 'required|string|in:U1 Levensbedreigend,U2 Spoed,U3 Dringend,U4 Niet Dringend,U5 Advies',
            'caseexplanation' => 'nullable|string|max:255',
            'appointment' => 'nullable|date_format:Y-m-d H:i',
            'organs' => 'nullable|array', // Ensure organs is an array
        ]);

        // Maakt nieuwe dossier aan en vult het met de ingevoerde informatie
        $dossier = new Dossier();
        $diagnosis = new Diagnosis();
        $treatments = new Treatments();

        // Items die worden toegevoegd in tabel 'dossiers'
        $dossier->subject = $request->input('subject');
        $dossier->type = $request->input('type');
        $dossier->appointment = $request->input('appointment');

        // Items die worden toegevoegd in tabel 'treatments'
        $treatments->treatment = $request->input('treatment');
        $treatments->policy = $request->input('policy');

        // Items die worden toegevoegd in tabel 'diagnosis'
        $diagnosis->symptoms = $request->input('symptoms');
        $diagnosis->caseexplanation = $request->input('caseexplanation');
        $diagnosis->research = $request->input('research');

        // Slaat de gevalideerde informatie op in de database voor de nieuwe dossier
        $dossier->save();
        $diagnosis->dossierid = $dossier->id;
        $diagnosis->save();
        $treatments->diagnosisid = $diagnosis->id;
        $treatments->save();

        // Voeg geselecteerde organen toe aan de DiagnosisOrgans pivot table
        if ($request->has('organs')) {
            $diagnosis->organs()->attach($request->input('organs')); // Attach each selected organ to the diagnosis
        }

        // Redirect naar de index pagina
        return redirect()->route('index');
    }

    public function show(string $id)
    {
        // Haalt het dossier door middel van id en de bijbehorende diagnose en laad de treatment en organs die bij de diagnose horen
        $dossier = Dossier::with('diagnoses.treatments', 'diagnoses.organs')->findOrFail($id);
        // Weergeeft show pagina en geeft het gevonden dossier met de bijbehorende info.
        return view('show', compact('dossier'));
    }

    public function edit($id)
    {
        // Haalt het dossier met bijbehorende diagnose, behandeling en organen
        $dossier = Dossier::with(['diagnoses.treatments', 'diagnoses.organs'])->findOrFail($id);
        // Haalt alle organen op uit organs tabel
        $allOrgans = Organ::all();
        // Weergeeft edit pagina en geeft het gevonden dossier door.
        return view('edit', compact('dossier', 'allOrgans'));
    }

    public function update(Request $request, $id)
    {
        // Haalt het dossier met bijbehorende diagnose, behandeling en organen
        $dossier = Dossier::with('diagnoses.treatments', 'diagnoses.organs')->findOrFail($id);
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
            $dossier->diagnoses->first()->organs()->sync($request->organs);
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
