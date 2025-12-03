<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\Niveau;

class InscriptionController extends Controller
{
    public function showInscriptionForm()
    {
        $inscriptions = Inscription::all();
        $niveaux=niveau::all();
        return view('inscription', compact('niveaux'));
    }

    public function inscription(Request $request)
    {

       
       $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|',
            'telephone'=>'required|string|max:20',
            'address'=>'required|string|max:255',
            'date_naissance'=>'required|date',
            'lieu_naissance'=>'required|string|max:255',
            'sexe'=>'required|in:male,female,other',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'montant' => 'required|string',
            'montant_impayer' => 'nullable|string',
            'niveau_id' => 'required|integer|exists:niveaux,id',
        ]);

        // // Insérer les données dans la table 'etudiant'
        $etudiant = Etudiant::create([
            'nom' => $validatedData['name'],
            'prenom' => $validatedData['prenom'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'adresse' => $validatedData['address'],
            'date_naissance' => $validatedData['date_naissance'],
            'lieu_naissance' => $validatedData['lieu_naissance'],
            'sexe' => $validatedData['sexe'],
            'niveau_id' => $validatedData['niveau_id'],
        ]);

        
        // Insérer les données dans la table 'inscription'
        $inscription = Inscription::create([
            'etudiant_id' => $etudiant->id,
            'niveau_id' => $validatedData['niveau_id'],
            'date_inscription' => now(),
            'statut' => 'en_cours',
            'frais' => $validatedData['montant'],
        ]);
        // Insérer les données dans la table 'paiement'
        $paiement = Paiement::create([
            'etudiant_id' => $etudiant->id,
            'inscription_id' => $inscription->id,
            'montant' => $validatedData['montant'],
            'statut' => 'pending',
            'date_paiement' => now(),
        ]);
        return redirect()->back()->with('success', 'Inscription réussie !');
       
    }

}
