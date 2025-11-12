<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use

class PaiementController extends Controller
{
   public function index()
   {
    $paiements = Paiement::all();
    return view('paiement', compact('paiements'));
   }
   public function store(Request $request)
   {
    $validatedData = $request->validate([

        'etudiant_id'=>'nullable|exists:etudiant_id',
         'montant'=>'',
         'date_paiement'=>'',
         'mode_paiement'=>'',
         'statut'=>'',

    ]);
   }
}
