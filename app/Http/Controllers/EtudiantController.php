<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    // Méthode pour afficher la liste des étudiants
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant', compact('etudiants'));
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
        return redirect()->route('etudiant')->with('success', 'Étudiant créé avec succès.');
    }
    
    
}
