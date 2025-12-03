@extends('layouts.app')

@section('content')
    <div style="max-width:1200px;margin:0 auto;padding:20px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px">
            <h1 style="color:#6d28d9;margin:0">Liste des Paiements</h1>
            <a href="{{ route('paiement.create') }}" style="background:#10b981;color:white;padding:10px 16px;border-radius:6px;text-decoration:none;font-weight:bold">+ Nouveau paiement</a>
        </div>

        @if(session('success'))
            <div style="padding:12px;background:#e6ffed;border:1px solid #b7f0c9;margin-bottom:16px;border-radius:6px">{{ session('success') }}</div>
        @endif

        <table style="width:100%;border-collapse:collapse;background:white;border-radius:8px;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,0.06)">
            <thead>
                <tr style="background:#f9fafb">
                    <th style="padding:14px;text-align:left;font-weight:bold;border-bottom:1px solid #f0f0f0">Étudiant</th>
                    <th style="padding:14px;text-align:left;font-weight:bold;border-bottom:1px solid #f0f0f0">Montant</th>
                    <th style="padding:14px;text-align:left;font-weight:bold;border-bottom:1px solid #f0f0f0">Méthode</th>
                    <th style="padding:14px;text-align:left;font-weight:bold;border-bottom:1px solid #f0f0f0">Date</th>
                    <th style="padding:14px;text-align:left;font-weight:bold;border-bottom:1px solid #f0f0f0">Statut</th>
                    <th style="padding:14px;text-align:left;font-weight:bold;border-bottom:1px solid #f0f0f0">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($paiements as $paiement)
                <tr style="border-bottom:1px solid #f0f0f0">
                    <td style="padding:14px">{{ $paiement->etudiant->nom ?? 'Inconnu' }} {{ $paiement->etudiant->prenom ?? '' }}</td>
                    <td style="padding:14px">{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</td>
                    <td style="padding:14px">{{ ucfirst($paiement->methode ?? 'N/A') }}</td>
                    <td style="padding:14px">{{ $paiement->date_paiement ? \Carbon\Carbon::parse($paiement->date_paiement)->format('d/m/Y') : 'N/A' }}</td>
                    <td style="padding:14px">
                        <span style="background:{{ $paiement->statut === 'completed' ? '#d1fae5' : '#fef3c7' }};color:{{ $paiement->statut === 'completed' ? '#065f46' : '#92400e' }};padding:4px 8px;border-radius:4px;font-size:12px;font-weight:bold">
                            {{ ucfirst($paiement->statut ?? 'pending') }}
                        </span>
                    </td>
                    <td style="padding:14px;display:flex;gap:8px;align-items:center">
                        <a href="{{ route('paiement.show', $paiement->id) }}" style="background:#3b2a56ff;color:white;padding:6px 12px;border-radius:4px;text-decoration:none;font-size:12px">Voir reçu</a>
                        <a href="{{ route('paiement.edit', $paiement->id) }}" style="background:#2563eb;color:white;padding:6px 12px;border-radius:4px;text-decoration:none;font-size:12px">Éditer</a>
                        <form action="{{ route('paiement.destroy', $paiement->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression de ce paiement ?');" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:#ef4444;color:white;padding:6px 12px;border-radius:4px;border:none;font-size:12px;cursor:pointer">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center;padding:20px">Aucun paiement trouvé.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
