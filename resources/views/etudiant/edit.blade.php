@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Éditer l'étudiant</h1>

        @if ($errors->any())
            <div style="padding:10px;background:#fff1f2;border:1px solid #fecaca;margin-bottom:12px">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('etudiant.update', $etudiant->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label>Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $etudiant->nom) }}" required>
            </div>

            <div>
                <label>Prénom</label>
                <input type="text" name="prenom" value="{{ old('prenom', $etudiant->prenom) }}" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $etudiant->email) }}">
            </div>

            <div>
                <label>Niveau</label>
                <select name="niveau_id">
                    <option value="">-- Aucun --</option>
                    @foreach($niveaux as $niveau)
                        <option value="{{ $niveau->id }}" {{ $etudiant->niveau_id == $niveau->id ? 'selected' : '' }}>{{ $niveau->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-top:12px">
                <button type="submit" style="background:#10b981;color:white;padding:8px 12px;border-radius:6px;border:none;">Enregistrer</button>
                <a href="{{ route('etudiant.index') }}" style="margin-left:8px">Annuler</a>
            </div>
        </form>
    </div>
@endsection
