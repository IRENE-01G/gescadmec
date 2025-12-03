<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'GESCADMEC')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fa;
            color: #1f2937;
        }

        header {
            background: #6d28d9;
            color: white;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 24px;
            margin: 0;
        }

        nav {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        nav a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
        }

        main {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
        }

        footer {
            background: #1f2937;
            color: white;
            padding: 20px 24px;
            text-align: center;
            margin-top: 40px;
        }

        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 16px;
        }

        .alert-success {
            background: #e6ffed;
            border: 1px solid #b7f0c9;
            color: #065f46;
        }

        .alert-error {
            background: #fff1f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }
    </style>
</head>
<body>
    <header>
        <h1>GESCADMEC</h1>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('etudiant.index') }}">Étudiants</a>
            <a href="{{ route('niveau.index') }}">Niveaux</a>
            <a href="{{ route('inscription.form') }}">Inscription</a>
        </nav>
    </header>

    <div class="container">
        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        <p>&copy; 2025 GESCADMEC - Tous droits réservés</p>
    </footer>
</body>
</html>
