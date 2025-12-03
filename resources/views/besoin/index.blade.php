@extends('layouts.app')

@section('content')
    <div style="max-width:1200px;margin:28px auto;padding:20px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:18px">
            <h1 style="color:#6d28d9;margin:0">Liste des Besoins</h1>
            <div style="display:flex;gap:8px;align-items:center">
                <a href="{{ route('besoin.create') }}" style="background:#10b981;color:white;padding:8px 14px;border-radius:6px;text-decoration:none">+ Nouveau besoin</a>
                <a href="{{ url()->previous() }}" style="background:#7e1e99;color:white;padding:8px 14px;border-radius:6px;text-decoration:none">← Retour</a>
            </div>
        </div>

        @if(session('success'))
            <div style="padding:12px;background:#e6ffed;border:1px solid #b7f0c9;margin-bottom:16px;border-radius:6px">{{ session('success') }}</div>
        @endif

        <div style="background:white;border-radius:10px;overflow:hidden;box-shadow:0 6px 18px rgba(22,27,47,0.06)">
            <table style="width:100%;border-collapse:collapse">
                <thead style="background:#f8fafc">
                    <tr>
                        <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">#</th>
                        <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Étudiant</th>
                        <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Type</th>
                        <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Description</th>
                        <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Montant</th>
                        <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Statut</th>
                        <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Demandé le</th>
                        <th style="text-align:left;padding:12px;border-bottom:1px solid #eee">Traité le</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($besoins as $besoin)
                        <tr style="border-bottom:1px solid #f1f5f9">
                            <td style="padding:12px;vertical-align:top">{{ $besoin->id }}</td>
                            <td style="padding:12px;vertical-align:top">{{ $besoin->etudiant ? ($besoin->etudiant->nom . ' ' . $besoin->etudiant->prenom) : '—' }}</td>
                            <td style="padding:12px;vertical-align:top">{{ ucfirst($besoin->type) }}</td>
                            <td style="padding:12px;vertical-align:top;max-width:360px">{{ $besoin->description ?? '—' }}</td>
                            <td style="padding:12px;vertical-align:top">{{ $besoin->montant ? number_format($besoin->montant,0,',',' ') . ' FCFA' : '—' }}</td>
                            <td style="padding:12px;vertical-align:top">
                                @if($besoin->statut === 'resolved' || $besoin->statut === 'closed')
                                    <span style="background:#ecfdf5;color:#065f46;padding:6px 10px;border-radius:6px;font-weight:600;font-size:13px">{{ ucfirst($besoin->statut) }}</span>
                                @elseif($besoin->statut === 'in_progress')
                                    <span style="background:#fff7ed;color:#92400e;padding:6px 10px;border-radius:6px;font-weight:600;font-size:13px">En cours</span>
                                @else
                                    <span style="background:#fef3c7;color:#92400e;padding:6px 10px;border-radius:6px;font-weight:600;font-size:13px">{{ $besoin->statut ? ucfirst($besoin->statut) : 'open' }}</span>
                                @endif
                            </td>
                            <td style="padding:12px;vertical-align:top">{{ $besoin->date_demande ? \Carbon\Carbon::parse($besoin->date_demande)->format('d/m/Y') : '—' }}</td>
                            <td style="padding:12px;vertical-align:top">{{ $besoin->date_traitement ? \Carbon\Carbon::parse($besoin->date_traitement)->format('d/m/Y') : '—' }}</td>
                            <td style="padding:12px;vertical-align:top">
                                <div style="display:flex;gap:8px">
                                    <a href="{{ route('besoin.edit', $besoin->id) }}" style="background:#2563eb;color:white;padding:6px 10px;border-radius:6px;text-decoration:none;font-size:13px">Éditer</a>
                                    <form action="{{ route('besoin.destroy', $besoin->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression du besoin ?');" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background:#ef4444;color:white;padding:6px 10px;border-radius:6px;border:none;cursor:pointer">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" style="text-align:center;padding:28px">Aucun besoin trouvé.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
