<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Liste des inscriptions — GESCADMEC</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            color: #1f2937;
            padding: 24px;
        }
        .container { max-width: 1100px; margin: 0 auto; }
        h1 {
            color: #6d28d9;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #f0f0f0;
            text-align: left;
        }
        th {
            background: #f9fafb;
            font-weight: bold;
        }
        tr:hover {
            background: #f3e8ff;
        }
        .btn {
            display: inline-block;
            background: #6d28d9;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
        }
        .back {
            margin-bottom: 20px;
            display: inline-block;
            color: #6d28d9;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('dashboard') }}" class="back">← Retour au Dashboard</a>
        <h1>Liste des inscriptions</h1>

        <table>
            <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th>Niveau</th>
                    <th>Téléphone</th>
                    <th>Date d'inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->email ?? 'N/A' }}</td>
                        <td>{{ $etudiant->niveau?->nom ?? 'Non assigné' }}</td>
                        <td>{{ $etudiant->telephone ?? 'N/A' }}</td>
                        <td>{{ $etudiant->created_at?->format('d/m/Y') ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn" style="background:#10b981">Éditer</a>
                            <form action="{{ route('etudiant.destroy', $etudiant->id) }}" method="POST" style="display:inline;margin-left:4px" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background:#ef4444">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:20px">Aucun étudiant trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
