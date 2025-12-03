@extends('layouts.app')

@section('content')
    <div class="container" style="max-width:700px;margin:40px auto;padding:20px">
        <h1 style="color:#6d28d9;margin-bottom:20px">Effectuer un paiement</h1>

        @if ($errors->any())
            <div style="padding:12px;background:#fff1f2;border:1px solid #fecaca;margin-bottom:12px;border-radius:6px">
                <ul style="margin:0;padding-left:20px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div style="padding:12px;background:#e6ffed;border:1px solid #b7f0c9;margin-bottom:12px;border-radius:6px">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('paiement.store') }}">
            @csrf

            <div style="margin-bottom:16px">
                <label style="display:block;margin-bottom:6px;font-weight:bold">Sélectionner votre inscription</label>
                <select name="inscription_id" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px;font-size:14px">
                    <option value="">-- Choisir une inscription --</option>
                    @foreach($inscriptions as $inscription)
                        <option value="{{ $inscription->id }}">
                            {{ $inscription->etudiant->nom }} {{ $inscription->etudiant->prenom }} 
                            - {{ $inscription->niveau->nom }} 
                            ({{ $inscription->annee_academique ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:16px">
                <label style="display:block;margin-bottom:6px;font-weight:bold">Montant à payer (FCFA)</label>
                <input type="number" name="montant" placeholder="Exemple: 50000" min="1" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-bottom:16px">
                <label style="display:block;margin-bottom:6px;font-weight:bold">Méthode de paiement</label>
                <select name="methode" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px">
                    <option value="">-- Choisir --</option>
                    <option value="espece">Espèce</option>
                    <option value="virement">Virement bancaire</option>
                    <option value="cheque">Chèque</option>
                    <option value="carte">Carte bancaire</option>
                    <option value="mobile_money">Mobile Money</option>
                </select>
            </div>

            <div style="margin-bottom:16px">
                <label style="display:block;margin-bottom:6px;font-weight:bold">Référence (optionnel)</label>
                <input type="text" name="reference" placeholder="N° de transaction, chèque, etc." style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-bottom:16px">
                <label style="display:block;margin-bottom:6px;font-weight:bold">Date du paiement</label>
                <input type="date" name="date_paiement" required style="width:100%;padding:10px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-top:24px;display:flex;gap:8px">
                <button type="submit" style="background:#10b981;color:white;padding:12px 20px;border-radius:6px;border:none;cursor:pointer;font-weight:bold;flex:1">Enregistrer le paiement</button>
                <a href="{{ route('paiement.index') }}" style="background:#6b7280;color:white;padding:12px 20px;border-radius:6px;text-decoration:none;display:flex;align-items:center;justify-content:center;font-weight:bold;flex:1">Annuler</a>
            </div>
        </form>
    </div>
@endsection
