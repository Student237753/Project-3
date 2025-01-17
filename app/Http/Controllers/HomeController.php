<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dossiers = Dossier::all(); // Gets all Data-rows from the 'dossiers' table
        return view('index', compact('dossiers')); // Passes the data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        $dossier = new Dossier();
        $dossier->subject = $request->input('subject');
        $dossier->type = $request->input('type');
        $dossier->research = $request->input('research');
        $dossier->symptoms = $request->input('symptoms');
        $dossier->treatment = $request->input('treatment');
        $dossier->questions = $request->input('questions');
        $dossier->appointment = $request->has('appointment')
            ? $request->input('appointment')
            : now()->format('Y-m-d H:i'); // Automatically set to now if not provided
        $dossier->save();

        return redirect()->route('index')->with('success', 'Dossier created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the Dossier by its ID
        $dossier = Dossier::findOrFail($id);

        // Return the view with the dossier data
        return view('show', compact('dossier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dossier = Dossier::findOrFail($id); // Find the dossier by ID
        $dossier->delete(); // Delete the dossier
        return redirect()->back();
    }
}
