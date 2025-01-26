<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
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
            'urgency' => 'required|string|max:255',
            'questions' => 'nullable|string|max:255',
            'appointment' => 'nullable|date_format:Y-m-d H:i',
        ]);

        // Maakt nieuwe dossier aan en vult het met de ingevoerde informatie
        $dossier = new Dossier();
        $dossier->subject = $request->input('subject');
        $dossier->type = $request->input('type');
        $dossier->research = $request->input('research');
        $dossier->symptoms = $request->input('symptoms');
        $dossier->treatment = $request->input('treatment');
        $dossier->questions = $request->input('questions');
        $dossier->appointment = $request->has('appointment');
        // Slaat de gevalideerde informatie op in de database voor de nieuwe dossier
        $dossier->save();
        // Redirect naar de index pagina
        return redirect()->route('index');
    }

    public function show(string $id)
    {
        // Haalt het dossier door middel van id en de bijbehorende diagnoses
        $dossier = Dossier::with('diagnoses')->findOrFail($id);
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
        // Update alle nieuwe informatie voor het dossier
        $dossier->update($request->all());
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
