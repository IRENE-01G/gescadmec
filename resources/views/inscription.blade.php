 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
 </head>
    <style>
        form{
            width: 700px;
            margin: auto;
            height: auto;
            border: 2px solid violet;
            padding: 20px;
            box-shadow: 5px 5px 10px grey;
            border-radius: 10px;
            margin-top: 40px;
            
        }
        input{
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #9b1299ff;
            border-radius: 4px;
            box-sizing: border-box;
            
        }
        input[type=submit]{
            background-color: black;
            color: white;
            border: none;
        }   
        h1{
            text-align: center;
            color: violet;
            background-color:black;
            padding: 10px;
            border-radius: 10px;
        }
        label{
            font-weight: bold;
            

        }
        select{
            
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            cursor: pointer;
        }
        option{
            padding: 10px;
            cursor: pointer;

        }
        a{
        
           background-color: #7e1e99ff;
           color: white;
            padding: 8px 12px;
            text-decoration: none;
            margin-left: 20px;
            border-radius: 6px;
            
        }

    </style>

 <body><br><br><br>
     <a href="{{ route('dashboard') }}" class="back">⬅ Retour au Dashboard</a>
    <form action="{{ route('inscription.submit') }}" method="post">
        @csrf
        <h1>Page d'inscription</h1>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="tel">Telephone:</label>
        <input type="tel" id="phone" name="telephone" required><br><br>

        <label for="address">Adresse:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br><br>

        <label for="lieu_naissance">Lieu de naissance:</label>
        <input type="text" id="lieu_naissance" name="lieu_naissance" required><br><br>

        <label for="sexe">Genre:</label>
        <select name="sexe" id="gender">
            <option value="" disabled selected>--choisir votre genre--</option> 
            <option value="male">Masculin</option>
            <option value="female">Féminin</option>
            <option value="other">Autre</option>
        </select><br><br>

        <label for="niveau_id">niveau:</label>
        <select name="niveau_id" id="niveau_id">
            <option value="" disabled selected>--choisir votre niveau--</option>
            @foreach($niveaux as $niveau)
                <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
            @endforeach
        </select><br><br>

        <label for="date">date de debut</label>
        <input type="date" id="date" name="date_debut" required><br><br>

        <label for="date">date de fin</label>
        <input type="date" id="date" name="date_fin" required><br><br>

        <label for="montant">montant payer</label>
        <input type="number" id="number" name="montant" required><br><br>

        <label for="montant_impayer">montant impayer</label>
        <input type="number" id="number" name="montant_impayer"><br><br>

        <label for="description">Description:</label><br><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>


        <input type="submit" value="S'inscrire">
    </form>
 </body>
 </html>