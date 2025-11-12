<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard — Gescadmec</title>
    <style>
        body
        {
            font-family: Arial, Helvetica, sans-serif; 
        background:#f5f7fa; color:#1f2937; padding:24px

       }

        .container{max-width:1100px;margin:0 auto}

        .header{
            display:flex;align-items:center;justify-content:space-between;
        margin-bottom:18px}

        .cards{

            display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
        gap:12px;margin-bottom:18px
           }

        .card{
            
            background:#fff;border-radius:8px;padding:16px;
            box-shadow:0 1px 3px rgba(0,0,0,0.06)
        }
        .card h3{

            margin:0;font-size:18px;color:#0f172a
        }
        .card p
        {
            margin:8px 0 0;font-size:28px;font-weight:700
        }

        .actions
        {
            display:flex;gap:8px*
        }
        .btn
        {
            background:#6d28d9;color:white;padding:8px 12px;border-radius:6px;text-decoration:none
        }
    
        table
        {
            width:100%;border-collapse:collapse;background:#fff;border-radius:8px;overflow:hidden;
        }
        th,td{
            padding:10px;border-bottom:1px solid #fefefeff;text-align:left
        }
        th
        {
            background:#f8fafc
        }
        h1{
            color: #7e1e99ff;
            font-size:40px
            }
         
    </style>
</head>
<body>
    <form method="post" action="{{ route('dashboard') }}">
    <div class="container">
        <div class="header">
            <div>
                <h1>GESCADMEC</h1>
            </div>
            <div class="actions">
                <a href="/inscription" class="btn">Nouvelle inscription</a>
                
            </div>
        </div>

        
        <div class="cards">
            <div class="card">
                <h3>Étudiants</h3>
                <p>{{ $etudiants }}</p>
            </div>
    
            <div class="card">
                <h3>Besoins</h3>
                <p>{{$besoins}}</p>
            </div>
            <div class="card">
                <h3>Paiements</h3>
                <p> {{$paiements}}</p>
            </div>

            <div class="card">
                <h3>impayé</h3>
                <p> {{$impayes}} </p>
            </div>
        </div><br><br>


        <h2>LISTE DES CANDIDATURES</h2>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Étudiants</td>
                    <td> </td>
                    <td><a href="/etudiants">Voir</a></td>
                </tr>
    
                <tr>
                    <td>Paiements</td>
                    <td> </td>
                    <td><a href="">Voir</a></td>
                </tr>

                <tr>
                    <td>Besoin</td>
                    <td> </td>
                    <td><a href="/besoin">Voir</a></td>
                </tr>

                
            </tbody>
        </table>
    </div>
    </form>
</body>
</html>