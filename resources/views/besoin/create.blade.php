@extends('layouts.app')

@section('content')
    <style>
        .card { max-width:840px; margin:36px auto; background:#fff; border-radius:10px; box-shadow:0 8px 28px rgba(15,23,42,0.06); overflow:hidden }
        .card-header { background:linear-gradient(90deg,#7e1e99,#6d28d9); color:white; padding:18px 22px }
        .card-body { padding:22px }
        .form-row { display:grid; grid-template-columns:1fr 1fr; gap:12px; align-items:start }
        label { display:block; font-weight:600; margin-bottom:6px; color:#374151 }
        input[type="text"], input[type="number"], input[type="date"], select, textarea { width:100%; padding:10px 12px; border:1px solid #e6e6ef; border-radius:8px; background:#fbfbff }
        textarea { min-height:120px }
        .full { grid-column:1 / -1 }
        .actions { display:flex; justify-content:flex-end; gap:10px; margin-top:14px }
        .btn { padding:10px 14px; border-radius:8px; color:white; border:none; cursor:pointer }
        .btn-primary { background:#10b981 }
        .btn-muted { background:#6b7280 }
        .error-box { background:#fff7f7; border:1px solid #fecaca; color:#b91c1c; padding:12px; border-radius:8px; margin-bottom:14px }
        @media (max-width:720px) { .form-row { grid-template-columns:1fr } }
    </style>

    <div class="card">
        <div class="card-header">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <h3 style="margin:0;font-size:18px">Nouveau Besoin</h3>
                <a href="{{ route('besoin.index') }}" style="color:white;text-decoration:none;opacity:0.95">← Retour à la liste</a>
            </div>
        </div>

        <div class="card-body">

            @if($errors->any())
                <div class="error-box">
                    <strong>Veuillez corriger les erreurs :</strong>
                    <ul style="margin-top:8px">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('besoin.store') }}" method="post">
                @csrf

                <div class="form-row">
                    <div class="full">
                        <label for="etudiant_id">Étudiant</label>
                        <select name="etudiant_id" id="etudiant_id" required>
                            <option value="">--Choisir un étudiant--</option>
                            @foreach($etudiants as $et)
                                <option value="{{ $et->id }}" {{ old('etudiant_id') == $et->id ? 'selected' : '' }}>{{ $et->nom }} {{ $et->prenom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" value="{{ old('type') }}" required>
                    </div>

                    <div>
                        <label for="montant">Montant (optionnel)</label>
                        <input type="number" name="montant" id="montant" value="{{ old('montant') }}">
                    </div>

                    <div class="full">
                        <label for="date_demande">Date de demande</label>
                        <input type="date" name="date_demande" id="date_demande" value="{{ old('date_demande') }}">
                    </div>

                    <div class="full">
                        <label for="description">Description</label>
                        <textarea name="description" id="description">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="actions">
                    <a href="{{ route('besoin.index') }}" class="btn btn-muted">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer le besoin</button>
                </div>
            </form>

        </div>
    </div>
@endsection
