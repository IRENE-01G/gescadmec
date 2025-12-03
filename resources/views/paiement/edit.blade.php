@extends('layouts.app')

@section('content')
    <style>
        .card { max-width:900px; margin:36px auto; background:#fff; border-radius:10px; box-shadow:0 6px 18px rgba(22,27,47,0.08); overflow:hidden }
        .card-header { background:linear-gradient(90deg,#6d28d9,#8b5cf6); color:white; padding:18px 24px }
        .card-body { padding:22px }
        .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:14px }
        label { display:block; font-weight:600; margin-bottom:6px; color:#374151 }
        input[type="text"], input[type="number"], input[type="date"], select { width:100%; padding:10px 12px; border:1px solid #e5e7eb; border-radius:8px; background:#fbfbfc }
        .full { grid-column:1/ -1 }
        .btn { display:inline-block; padding:10px 16px; border-radius:8px; color:white; text-decoration:none; border:none; cursor:pointer }
        .btn-primary { background:#2563eb }
        .btn-muted { background:#6b7280 }
        .error-box { background:#fff1f2; border:1px solid #fecaca; color:#b91c1c; padding:12px; border-radius:8px; margin-bottom:14px }
        .help { font-size:13px; color:#6b7280; margin-top:6px }
        @media (max-width:700px) { .form-grid { grid-template-columns:1fr } }
    </style>

    <div class="card">
        <div class="card-header">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <h2 style="margin:0;font-size:18px">Modifier le paiement</h2>
                <a href="{{ route('paiement.index') }}" style="background:rgba(255,255,255,0.12);padding:8px 12px;border-radius:6px;color:white;text-decoration:none">← Retour</a>
            </div>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="error-box">
                    <strong>Veuillez corriger les erreurs suivantes :</strong>
                    <ul style="margin-top:8px">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('paiement.update', $paiement->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="full">
                        <label for="inscription_id">Inscription</label>
                        <select name="inscription_id" id="inscription_id" required>
                            @foreach($inscriptions as $ins)
                                <option value="{{ $ins->id }}" {{ $paiement->inscription_id == $ins->id ? 'selected' : '' }}>
                                    {{ $ins->etudiant->nom ?? 'Inconnu' }} {{ $ins->etudiant->prenom ?? '' }} — {{ $ins->niveau->nom ?? '' }}
                                </option>
                            @endforeach
                        </select>
                        <div class="help">Choisissez l'inscription associée au paiement.</div>
                    </div>

                    <div>
                        <label for="montant">Montant (FCFA)</label>
                        <input type="number" name="montant" id="montant" value="{{ old('montant', $paiement->montant) }}" required>
                    </div>

                    <div>
                        <label for="methode">Méthode</label>
                        <select name="methode" id="methode" required>
                            @php $methods = ['espece' => 'Espèce', 'virement' => 'Virement', 'cheque' => 'Chèque', 'carte' => 'Carte', 'mobile_money' => 'Mobile Money']; @endphp
                            @foreach($methods as $key => $label)
                                <option value="{{ $key }}" {{ (old('methode', $paiement->methode) == $key) ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="date_paiement">Date de paiement</label>
                        <input type="date" name="date_paiement" id="date_paiement" value="{{ old('date_paiement', $paiement->date_paiement ? \Carbon\Carbon::parse($paiement->date_paiement)->format('Y-m-d') : '') }}" required>
                    </div>

                    <div>
                        <label for="statut">Statut</label>
                        <select name="statut" id="statut">
                            <option value="pending" {{ (old('statut', $paiement->statut) == 'pending') ? 'selected' : '' }}>En attente</option>
                            <option value="completed" {{ (old('statut', $paiement->statut) == 'completed') ? 'selected' : '' }}>Complété</option>
                            <option value="failed" {{ (old('statut', $paiement->statut) == 'failed') ? 'selected' : '' }}>Échoué</option>
                        </select>
                    </div>

                    <div class="full">
                        <label for="reference">Référence (optionnel)</label>
                        <input type="text" name="reference" id="reference" value="{{ old('reference', $paiement->reference) }}">
                    </div>
                </div>

                <div style="margin-top:18px;display:flex;gap:10px;justify-content:flex-end">
                    <a href="{{ route('paiement.index') }}" class="btn btn-muted">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>

            </form>
        </div>
    </div>
@endsection
