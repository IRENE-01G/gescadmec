<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body{
            width: 400px;
            margin: auto;
            height: auto;
            border: 2px solid violet;
            padding: 20px;
            box-shadow: 5px 5px 10px grey;
            border-radius: 10px;
            
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
    </style>        
<body>
    <h1>page de paiement</h1>
    <form >
        <label for="carte">nom:</label>
        <input type="name" id="name" name="name" required><br><br>

        <label for="prenom">prenom:</label>
        <input type="prenom" id="prenom" name="prenom" required><br><br>

        <label for="carte">frais de fromation:</label>
        <input type="number" id="number" name="number" required><br>

        <label for="numder">montant payer:</label>
        <input type="number" id="number" name="number" required><br><br>

        <label for="number">montant restant:</label>
        <input type="number" id="number" name="number"><br><br>

        <input type="submit" value="PAYER">
    </form>
</body>
</html>