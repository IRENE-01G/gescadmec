@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des étudiants</h1>

        @if(session('success'))
            <div style="padding:10px;background:#e6ffed;border:1px solid #b7f0c9;margin-bottom:12px">{{ session('success') }}</div>
        @endif

        <table style="width:100%;border-collapse:collapse">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Niveau</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td>{{ optional($etudiant->niveau)->nom }}</td>
                        <td>
                            <a href="{{ route('etudiant.edit', $etudiant->id) }}" style="margin-right:8px">Éditer</a>

                            <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Supprimer cet étudiant ?');">
                                @csrf
                                @method('delete')
                                <button type="submit" style="background:#ef4444;color:white;border:none;padding:6px 10px;border-radius:4px;cursor:pointer">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Aucun étudiant trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
 