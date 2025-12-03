<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Besoin;
use App\Models\Etudiant;


class BesoinController extends Controller
{
    
    public function index()
    {
        $besoins = Besoin::all();
        return view('besoin.index', compact('besoins'));
    }

    // Show form to create a besoin
    public function create()
    {
        $etudiants = Etudiant::all();
        return view('besoin.create', compact('etudiants'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'etudiant_id' => 'required|integer|exists:etudiant,id',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'nullable|string|in:open,in_progress,resolved,closed',
            'montant' => 'nullable|numeric',
            'date_demande' => 'nullable|date',
            'date_traitement' => 'nullable|date',
        ]);

        // create the besoin
        $besoin = Besoin::create($validatedData);

        return redirect()->route('besoin.index')->with('success', 'Besoin créé avec succès');
    }

    // Show edit form
    public function edit($id)
    {
        $besoin = Besoin::findOrFail($id);
        $etudiants = Etudiant::all();
        return view('besoin.edit', compact('besoin', 'etudiants'));
    }

    // Update besoin
    public function update(Request $request, $id)
    {
        $besoin = Besoin::findOrFail($id);

        $validatedData = $request->validate([
            'etudiant_id' => 'required|integer|exists:etudiant,id',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'statut' => 'nullable|string|in:open,in_progress,resolved,closed',
            'montant' => 'nullable|numeric',
            'date_demande' => 'nullable|date',
            'date_traitement' => 'nullable|date',
        ]);

        $besoin->update($validatedData);

        return redirect()->route('besoin.index')->with('success', 'Besoin mis à jour.');
    }

    // Delete besoin
    public function destroy($id)
    {
        $besoin = Besoin::findOrFail($id);
        $besoin->delete();
        return redirect()->route('besoin.index')->with('success', 'Besoin supprimé.');
    }
}
