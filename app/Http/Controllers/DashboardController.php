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

        // Exemple d’impayés : si tu veux calculer une somme
        $impayes = Paiement::where('statut', 'impayé')->sum('montant') ?? 0;

        return view('dashboard', compact(
            'etudiants',
            'niveaux',
            'inscriptions',
            'besoins',
            'paiements',
            'impayes',
        ));
    }
}

