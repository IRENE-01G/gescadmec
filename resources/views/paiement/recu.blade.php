@extends('layouts.app')

@section('content')
    <div style="max-width:800px;margin:40px auto;padding:20px;background:#fff;border-radius:8px;box-shadow:0 1px 3px rgba(0,0,0,0.06)">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <h2 style="margin:0;color:#6d28d9">Reçu de paiement</h2>
            <div>
                <button onclick="window.print()" style="background:#10b981;color:#fff;border:none;padding:8px 12px;border-radius:6px;cursor:pointer">Imprimer</button>
            </div>
        </div>

        <table style="width:100%;border-collapse:collapse;margin-bottom:12px">
            <tr>
                <td style="width:40%;padding:8px;font-weight:bold">Référence</td>
                <td style="padding:8px">{{ $paiement->reference ?? '—' }}</td>
            </tr>
            <tr style="background:#f9fafb">
                <td style="padding:8px;font-weight:bold">Date</td>
                <td style="padding:8px">{{ $paiement->date_paiement ? \Carbon\Carbon::parse($paiement->date_paiement)->format('d/m/Y') : '—' }}</td>
            </tr>
            <tr>
                <td style="padding:8px;font-weight:bold">Montant</td>
                <td style="padding:8px">{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</td>
            </tr>
            <tr style="background:#f9fafb">
                <td style="padding:8px;font-weight:bold">Méthode</td>
                <td style="padding:8px">{{ ucfirst($paiement->methode ?? '—') }}</td>
            </tr>
            <tr>
                <td style="padding:8px;font-weight:bold">Statut</td>
                <td style="padding:8px">{{ ucfirst($paiement->statut ?? 'pending') }}</td>
            </tr>
        </table>

        <h3 style="margin-top:12px;margin-bottom:8px">Détails de l'étudiant</h3>
        <table style="width:100%;border-collapse:collapse;margin-bottom:12px">
            <tr>
                <td style="width:30%;padding:8px;font-weight:bold">Nom</td>
                <td style="padding:8px">{{ $paiement->etudiant->nom ?? 'Inconnu' }} {{ $paiement->etudiant->prenom ?? '' }}</td>
            </tr>
            <tr style="background:#f9fafb">
                <td style="padding:8px;font-weight:bold">Email</td>
                <td style="padding:8px">{{ $paiement->etudiant->email ?? '—' }}</td>
            </tr>
            <tr>
                <td style="padding:8px;font-weight:bold">Téléphone</td>
                <td style="padding:8px">{{ $paiement->etudiant->telephone ?? '—' }}</td>
            </tr>
        </table>

        @if($paiement->inscription)
            <h3 style="margin-top:12px;margin-bottom:8px">Inscription liée</h3>
            <table style="width:100%;border-collapse:collapse;margin-bottom:12px">
                <tr>
                    <td style="width:30%;padding:8px;font-weight:bold">Niveau</td>
                    <td style="padding:8px">{{ $paiement->inscription->niveau->nom ?? '—' }}</td>
                </tr>
                <tr style="background:#f9fafb">
                    <td style="padding:8px;font-weight:bold">Année</td>
                    <td style="padding:8px">{{ $paiement->inscription->annee_academique ?? '—' }}</td>
                </tr>
                <tr>
                    <td style="padding:8px;font-weight:bold">Frais inscr.</td>
                    <td style="padding:8px">{{ isset($paiement->inscription->frais) ? number_format($paiement->inscription->frais,0,',',' ') . ' FCFA' : '—' }}</td>
                </tr>
            </table>
        @endif

        <div style="margin-top:18px;text-align:right">
            <a href="{{ route('paiement.index') }}" style="background:#6b7280;color:white;padding:8px 14px;border-radius:6px;text-decoration:none">Retour</a>
        </div>
    </div>
@endsection
