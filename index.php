
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .header {
            background-image: url('img/439259501_1439150516976441_4513490629823157216_n.jpg');
            background-size: 1520px 630px;
            filter: contrast(200%)  ;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
        }
        .top-nav {
    background-color: #333;
    padding: 10px;
}



        .main-content {
            background-color:
            opacity: 0.8;
            rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        .main-content form {
            margin-bottom: 20px;
        }

        .main-content form input[type="email"] {
            width: 250px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .main-content form input[type="submit"] {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .main-content select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
       
        ul li a:hover{
            color: rgb(2, 139, 36);
            text-decoration: underline;

        }
        .h {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: rgb(25, 126, 219);
    padding: 10px;
   
}
.acc:hover{
    transform: rotate(30deg); /*bach tdor bacj tkbar scale(1.4)... */

}
.we{

    text-shadow: 0px 0px 8px orangered,
                  0px 0px 12px orangered,
                  0px 0px 16px orangered;
    font-size: 50px ;
    color: #FF914D;

}

    </style>
</head>
<body>
    <div class="header">
        <nav class="h">
            <ul class="menu">
                <li><a href="ajout.php">Inscription</a></li>
                <li><a href="recherche.php">Recherche</a></li>
            </ul>
        </nav>
        
        <div class="main-content">
             <h1 class="we">welcom to my site </h1>
             <br><br><br>
            <!-- saiser l'email -->
            <form action="traitement.php" method="post">
                <input type="email" name="email" placeholder="Saisir votre e-mail" required>
                <input class="acc" type="submit" value="Accéder">
            </form>

            <h2>Liste des sports existants</h2>
        
            <select class="select" name="sport">
                <option>Badminton</option>
                <option>Basket-ball</option>
                <option>Boxe</option>
                <option>Football</option>
                <option>Golf</option>
                <option>Gymnastique</option>
                <option>Handball</option>
                <option>Hockey sur glace</option>
                <option>Judo</option>
                <option>Natation</option>
                <option>Patinage artistique</option>
                <option >Rugby</option>
                <option >Ski alpin</option>
                <option >Tennis</option>
                <option >Tennis de table</option>
                <option >Voile</option>
                <option >Volley-bal</option>
            </select>
        </div>
    </div>
</body>
</html>
