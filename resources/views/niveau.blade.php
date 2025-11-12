 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nos formation</title>
 </head>
 <style>
        h1{
            text-align: center;
            color: violet;
            background-color:black;
            padding: 10px;
            border-radius: 10px;
           }
         .formation{
         display: flex;
         gap: 70px;
                    }
       .formation1, .formation2{
        border: 2px solid violet;
        padding: 50px;
        box-shadow: 5px 5px 10px grey;
        border-radius: 10px;
        margin-top: 40px;
        width: 450px;
        font-weight: bold;
        font-size: 18px;
        }
        a{
            text-decoration: none;
            color: black;
        }     
        i{
            color: grey;
            font-size: 14px;
            background-color: #f0f0f0;
            padding: 5px;
            border-radius: 5px;
        }        
       
    </style>
 <body>
<form action="{{Route ('/niveau')}}" method="post">
    @crsf
     <h1>cours de langue 'allemand'</h1>
<div class="formation">

     <div class="formation1">
        <a href="paiement">formation de 6 mois=100.000FCFA</a><br><br>
        <i>date de debut= 15/11/2025</i><br><br>
        <i>date de fin= 15/04/2026</i><br>
       </div>
       <div class="formation2" >
        <a href="paiement">formation de 12 mois =120.000FCFA</a><br><br>
        <i>date de debut= 15/11/2025</i><br><br>
        <i>date de fin= 15/11/2026</i><br><br>
       </div>

</div>
    </form>
     
                

</body>
 </html>