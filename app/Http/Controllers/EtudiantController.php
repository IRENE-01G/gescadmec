<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Inscription;

class EtudiantController extends Controller
{
    // Méthode pour afficher la liste des étudiants
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.index', compact('etudiants'));
    }

    public function incscription()
    {
        // On récupère toutes les inscriptions avec les infos de l'étudiant et du niveau
        $inscriptions = Inscription::with(['etudiant', 'niveau'])->get();

        // On renvoie ces données à la vue
        return view('etudiant.index', compact('inscriptions'));
    }

    // Méthode pour afficher le formulaire de création d'un étudiant
    public function create()
    {
        return view('etudiants.create');
    }

    // Méthode pour stocker un nouvel étudiant
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'nullable|date',
            'lieu_naissance' => 'nullable|string|max:255',
            'sexe' => 'nullable|in:M,F',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:etudiant,email',
            'adresse' => 'nullable|string|max:255',
            'niveau_id' => 'nullable|exists:niveau,id',
        ]);

        Etudiant::create($validatedData);
        return redirect()->route('etudiant.index')->with('success', 'Étudiant créé avec succès.');
    }

    // Affiche le formulaire d'édition
    public function edit(Etudiant $etudiant)
    {
        $niveaux = \App\Models\Niveau::all();
        return view('etudiant.edit', compact('etudiant', 'niveaux'));
    }

    // Met à jour l'étudiant
    public function update(Request $request, Etudiant $etudiant)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'nullable|date',
            'lieu_naissance' => 'nullable|string|max:255',
            'sexe' => 'nullable|in:M,F',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|unique:etudiant,email,' . $etudiant->id,
            'adresse' => 'nullable|string|max:255',
            'niveau_id' => 'nullable|exists:niveau,id',
        ]);

        $etudiant->update($validatedData);

        return redirect()->route('etudiant.index')->with('success', 'Étudiant mis à jour.');
    }

    // Supprime l'étudiant
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiant.index')->with('success', 'Étudiant supprimé.');
    }
}
