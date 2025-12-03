<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Etudiant;
use App\Models\Inscription;

class PaiementController extends Controller
{
    // Affiche la liste des paiements
    public function index()
    {
        $paiements = Paiement::with(['etudiant', 'inscription'])->latest()->get();
        return view('paiement', compact('paiements'));
    }

    // Affiche le formulaire pour créer un paiement
    public function create()
    {
        // Récupère toutes les inscriptions en chargeant l'étudiant et le niveau.
        // On n'applique pas de filtre sur le statut pour permettre au responsable
        // d'enregistrer un paiement même si l'inscription est encore "pending".
        $inscriptions = Inscription::with(['etudiant', 'niveau'])->get()->filter(function ($inscription) {
            return $inscription->etudiant !== null;
        });

        return view('paiement.creer', compact('inscriptions'));
    }

    // Enregistre un nouveau paiement
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'inscription_id' => 'required|exists:inscription,id',
            'montant' => 'required|numeric|min:1',
            'methode' => 'required|string|in:espece,virement,cheque,carte,mobile_money',
            'reference' => 'nullable|string|max:255',
            'date_paiement' => 'required|date',
        ]);

        // Récupérer l'inscription pour obtenir etudiant_id
        $inscription = Inscription::findOrFail($validatedData['inscription_id']);

        // Créer le paiement
        $paiement = Paiement::create([
            'etudiant_id' => $inscription->etudiant_id,
            'inscription_id' => $validatedData['inscription_id'],
            'montant' => $validatedData['montant'],
            'methode' => $validatedData['methode'],
            'reference' => $validatedData['reference'],
            'date_paiement' => $validatedData['date_paiement'],
            'statut' => 'completed',
        ]);

        return redirect()->route('paiement.index')->with('success', 'Paiement enregistré avec succès.');
    }

    // Affiche le reçu du paiement
    public function show($id)
    {
        $paiement = Paiement::with(['etudiant', 'inscription'])->findOrFail($id);
        return view('paiement.recu', compact('paiement'));
    }

    // Affiche le formulaire d'édition d'un paiement
    public function edit($id)
    {
        $paiement = Paiement::with(['etudiant', 'inscription'])->findOrFail($id);
        $inscriptions = Inscription::with(['etudiant', 'niveau'])->get()->filter(function ($inscription) {
            return $inscription->etudiant !== null;
        });

        return view('paiement.edit', compact('paiement', 'inscriptions'));
    }

    // Met à jour un paiement existant
    public function update(Request $request, $id)
    {
        $paiement = Paiement::findOrFail($id);

        $validatedData = $request->validate([
            'inscription_id' => 'required|exists:inscription,id',
            'montant' => 'required|numeric|min:1',
            'methode' => 'required|string|in:espece,virement,cheque,carte,mobile_money',
            'reference' => 'nullable|string|max:255',
            'date_paiement' => 'required|date',
            'statut' => 'nullable|string|in:pending,completed,failed',
        ]);

        $inscription = Inscription::findOrFail($validatedData['inscription_id']);

        $paiement->update([
            'inscription_id' => $validatedData['inscription_id'],
            'etudiant_id' => $inscription->etudiant_id,
            'montant' => $validatedData['montant'],
            'methode' => $validatedData['methode'],
            'reference' => $validatedData['reference'] ?? null,
            'date_paiement' => $validatedData['date_paiement'],
            'statut' => $validatedData['statut'] ?? $paiement->statut,
        ]);

        return redirect()->route('paiement.index')->with('success', 'Paiement mis à jour.');
    }

    // Supprime un paiement
    public function destroy($id)
    {
        $paiement = Paiement::findOrFail($id);
        $paiement->delete();
        return redirect()->route('paiement.index')->with('success', 'Paiement supprimé.');
    }
}

