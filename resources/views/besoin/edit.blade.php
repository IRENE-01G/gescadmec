@extends('layouts.app')

@section('content')
    <style>
        .card { max-width:840px; margin:36px auto; background:#fff; border-radius:10px; box-shadow:0 8px 28px rgba(15,23,42,0.06); overflow:hidden }
        .card-header { background:linear-gradient(90deg,#7e1e99,#6d28d9); color:white; padding:16px 20px }
        .card-body { padding:20px }
        .grid { display:grid; grid-template-columns:1fr 1fr; gap:12px }
        .full { grid-column:1 / -1 }
        label { display:block; font-weight:600; margin-bottom:6px; color:#374151 }
        input[type="text"], input[type="number"], input[type="date"], select, textarea { width:100%; padding:10px 12px; border:1px solid #e6e6ef; border-radius:8px; background:#fbfbff }
        textarea { min-height:120px }
        .actions { display:flex; justify-content:flex-end; gap:10px; margin-top:14px }
        .btn { padding:10px 14px; border-radius:8px; color:white; border:none; cursor:pointer }
        .btn-save { background:#2563eb }
        .btn-cancel { background:#6b7280 }
        .error-box { background:#fff7f7; border:1px solid #fecaca; color:#b91c1c; padding:12px; border-radius:8px; margin-bottom:14px }
        @media (max-width:720px) { .grid { grid-template-columns:1fr } }
    </style>

    <div class="card">
        <div class="card-header" style="display:flex;justify-content:space-between;align-items:center">
            <div>
                <h3 style="margin:0;font-size:18px">Modifier Besoin — #{{ $besoin->id }}</h3>
                <div style="font-size:13px;opacity:0.9;margin-top:6px">Modifiez les informations du besoin et enregistrez.</div>
            </div>
            <a href="{{ route('besoin.index') }}" style="color:white;text-decoration:none;opacity:0.95">← Retour</a>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div style="padding:12px;background:#e6ffed;border:1px solid #b7f0c9;margin-bottom:12px;border-radius:8px">{{ session('success') }}</div>
            @endif

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

            <form action="{{ route('besoin.update', $besoin->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="grid">
                    <div class="full">
                        <label for="etudiant_id">Étudiant</label>
                        <select name="etudiant_id" id="etudiant_id" required>
                            @foreach($etudiants as $et)
                                <option value="{{ $et->id }}" {{ $besoin->etudiant_id == $et->id ? 'selected' : '' }}>{{ $et->nom }} {{ $et->prenom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="type">Type</label>
                        <input type="text" name="type" id="type" value="{{ old('type', $besoin->type) }}" required>
                    </div>

                    <div>
                        <label for="montant">Montant (optionnel)</label>
                        <input type="number" name="montant" id="montant" value="{{ old('montant', $besoin->montant) }}">
                    </div>

                    <div class="full">
                        <label for="description">Description</label>
                        <textarea name="description" id="description">{{ old('description', $besoin->description) }}</textarea>
                    </div>

                    <div>
                        <label for="date_demande">Date de demande</label>
                        <input type="date" name="date_demande" id="date_demande" value="{{ old('date_demande', $besoin->date_demande ? \Carbon\Carbon::parse($besoin->date_demande)->format('Y-m-d') : '') }}">
                    </div>

                    <div>
                        <label for="date_traitement">Date de traitement</label>
                        <input type="date" name="date_traitement" id="date_traitement" value="{{ old('date_traitement', $besoin->date_traitement ? \Carbon\Carbon::parse($besoin->date_traitement)->format('Y-m-d') : '') }}">
                    </div>

                    <div>
                        <label for="statut">Statut</label>
                        <select name="statut" id="statut">
                            <option value="open" {{ (old('statut', $besoin->statut) == 'open') ? 'selected' : '' }}>Open</option>
                            <option value="in_progress" {{ (old('statut', $besoin->statut) == 'in_progress') ? 'selected' : '' }}>En cours</option>
                            <option value="resolved" {{ (old('statut', $besoin->statut) == 'resolved') ? 'selected' : '' }}>Résolu</option>
                            <option value="closed" {{ (old('statut', $besoin->statut) == 'closed') ? 'selected' : '' }}>Fermé</option>
                        </select>
                    </div>
                </div>

                <div class="actions">
                    <a href="{{ route('besoin.index') }}" class="btn btn-cancel">Annuler</a>
                    <button type="submit" class="btn btn-save">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
