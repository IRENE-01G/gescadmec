<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Besoin;


class BesoinController extends Controller
{
    
    public function index()
    {
        $besoins = Besoin::all();
        return view('besoin.index', compact('besoins'));
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

        return redirect()->back()->with('success', 'Besoin créé avec succès');
    }
}
