
@extends('layouts.app')

@section('content')
    <div class="container" style="max-width:600px;margin:40px auto;padding:20px">
        <h1 style="color:#6d28d9;margin-bottom:20px">Éditer l'étudiant</h1>

        @if ($errors->any())
            <div style="padding:10px;background:#fff1f2;border:1px solid #fecaca;margin-bottom:12px;border-radius:6px">
                <ul style="margin:0;padding-left:20px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div style="padding:10px;background:#e6ffed;border:1px solid #b7f0c9;margin-bottom:12px;border-radius:6px">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('etudiant.update', $etudiant->id) }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $etudiant->nom) }}" required style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Prénom</label>
                <input type="text" name="prenom" value="{{ old('prenom', $etudiant->prenom) }}" required style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Email</label>
                <input type="email" name="email" value="{{ old('email', $etudiant->email) }}" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Téléphone</label>
                <input type="text" name="telephone" value="{{ old('telephone', $etudiant->telephone) }}" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Date de naissance</label>
                <input type="date" name="date_naissance" value="{{ old('date_naissance', $etudiant->date_naissance) }}" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Lieu de naissance</label>
                <input type="text" name="lieu_naissance" value="{{ old('lieu_naissance', $etudiant->lieu_naissance) }}" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px">
            </div>

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Sexe</label>
                <select name="sexe" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px">
                    <option value="">-- Non spécifié --</option>
                    <option value="M" {{ old('sexe', $etudiant->sexe) == 'M' ? 'selected' : '' }}>Masculin</option>
                    <option value="F" {{ old('sexe', $etudiant->sexe) == 'F' ? 'selected' : '' }}>Féminin</option>
                </select>
            </div>

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Adresse</label>
                <textarea name="adresse" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;font-family:Arial">{{ old('adresse', $etudiant->adresse) }}</textarea>
            </div>

            <div style="margin-bottom:12px">
                <label style="display:block;margin-bottom:4px;font-weight:bold">Niveau</label>
                <select name="niveau_id" style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px">
                    <option value="">-- Aucun --</option>
                    @foreach($niveaux as $niveau)
                        <option value="{{ $niveau->id }}" {{ old('niveau_id', $etudiant->niveau_id) == $niveau->id ? 'selected' : '' }}>{{ $niveau->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-top:20px;display:flex;gap:8px">
                <button type="submit" style="background:#10b981;color:white;padding:10px 16px;border-radius:6px;border:none;cursor:pointer;font-weight:bold">Enregistrer</button>
                <a href="{{ route('etudiant.index') }}" style="background:#6b7280;color:white;padding:10px 16px;border-radius:6px;text-decoration:none;display:flex;align-items:center">Annuler</a>
            </div>
        </form>
    </div>
@endsection
