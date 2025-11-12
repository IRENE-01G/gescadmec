<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page connexion</title>
</head>
<body>
    <style>

        form{
            width: 650px;
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
            color: white;
            background-color:black;
            padding: 7px;
            border-radius: 10px;
        }
        label{
            font-weight: bold;
        }
        h2{

            text-align: center;
            color: grey;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 10px;
            color: #000000ff;
        }

    </style>
    <h2>Bienvenue sur Gescadmec! Veuillez vous connecter.</h2>
    <form method="post" action="{{ route('login.submit') }}">
        @csrf
        <h1>page de connexion</h1>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Se connecter">
       
    </form>
    
    
</body>
</html>
