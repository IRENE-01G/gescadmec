<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Inscription;
use App\Models\Besoin;
use App\Models\Paiement;

class DashboardController extends Controller
{
	/**
	 * Display basic dashboard metrics.
	 */
    public function index()
    {
        $etudiants = Etudiant::count();
        $niveaux = Niveau::count();
        $inscriptions = Inscription::count();
        $besoins = Besoin::count();
        $paiements = Paiement::count();

        // Solde : somme des paiements complétés
        $solde = Paiement::where('statut', 'completed')->sum('montant') ?? 0;

        // Impayés : somme des paiements en attente
        $impayes = Paiement::where('statut', 'pending')->sum('montant') ?? 0;

        return view('dashboard', compact(
            'etudiants',
            'niveaux',
            'inscriptions',
            'besoins',
            'paiements',
            'impayes',
            'solde',
        ));
    }
}

