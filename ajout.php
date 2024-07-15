<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style> // HADI LA PAGE BACH T4INSSER
         body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
         .container {
            background-color: rgb(3, 136, 14);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            text-shadow: 0px 0px 8px lime, 0px 0px 12px lime, 0px 0px 16px lime;
             font-size: 50px ;
              color: color: #006400; 
               text-align: center;
        }
    </style>
</head>
<body>
   
    <div class="container">
    <h1 >Inscription</h1>
    <?php
    //  formulaire  soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // njbd f les donner 
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $sexe = $_POST['sexe'];
        $mail = $_POST['mail'];
        $mot_passe = $_POST['mot_passe'];
        $ville = $_POST['ville'];
        $sport = $_POST['sport'];
        $niveau = $_POST['niveau'];
        $date = $_POST['date'];

        // kifah nrbt bl base de donner 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sportives";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // ask l9it la base de donner li khdamt
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        // insert les info dans la base 
        $sql = "INSERT INTO personne (nom, prenom, age, sexe, email, mot_de_passe, ville, sports_pratiques, niveau_pratique, date_inscription) 
                VALUES ('$nom', '$prenom', '$age', '$sexe', '$mail', '$mot_passe', '$ville', '$sport', '$niveau', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo "Enregistrement réussi. Identifiant généré : " . $conn->insert_id;
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }

        // sayy kmlt mn la base 
        $conn->close();
    }
    ?>

    <!-- inscription -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
       <br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
       <br><br>

        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="sexe">Sexe :</label>
        <select id="sexe" name="sexe">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select><br><br>

        <label for="mail">Mail :</label>
        <input type="email" id="mail" name="mail" required>
        <span id="mailError" class="error"></span><br><br>

        <label for="mot_passe">Mot de passe :</label>
        <input type="password" id="mot_passe" name="mot_passe" required>
        <span id="motPasseError" class="error"></span><br><br>

        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville" required><br><br>

        <label for="sport">Sport :</label>
        <select id="sport" name="sport">
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
        <div id="autreSportField" style="display: none;">
            <label for="autre_sport">Nom du sport :</label>
            <input type="text" id="autre_sport" name="autre_sport">
            <br><br>
        </div> 
        <button type="button" id="ajouterSport">Ajouter un autre sport</button> <br><br>
        <label for="niveau">Niveau :</label>
        <select id="niveau" name="niveau">
            <option value="débutant">Debutant</option>
            <option value="confirmé">Confirme</option>
            <option value="pro">Pro</option>
            <option value="supporter">Supporter</option>
        </select><br><br>

        <label for="date">Date d'inscription :</label>
        <input type="date" id="date" name="date" required><br><br>

        <input type="submit" value="S'inscrire">
        <input type="reset" value="Reinitialiser">
    </form>
    <br>
    <a href="index.php">Retour a la page d'accueil</a>
    </div>
    <script>
        // pour ajouter un autre sport 
        document.getElementById("ajouterSport").addEventListener("click", function() {
            document.getElementById("autreSportField").style.display = "block";
        });

        document.getElementById("sport").addEventListener("change", function() {
            if (this.value === "Autre") {
                document.getElementById("autreSportField").style.display = "block";
            } else {
                document.getElementById("autreSportField").style.display = "none";
            }
        });
        // hada ta3 les erreurs
        document.getElementById("inscriptionForm").addEventListener("submit", function(event) {
           
            var mail = document.getElementById("mail").value;
            var motPasse = document.getElementById("mot_passe").value;

           
            var mailError = document.getElementById("mailError");
            var motPasseError = document.getElementById("motPasseError");

            var hasNumber = /\d/;
            var hasUpperCase = /[A-Z]/;
            var hasLowerCase = /[a-z]/;


            if (!mail.includes("@gmail.com")) {
                mailError.textContent = "Veuillez saisir une adresse e-mail valide (exemple@gmail.com)";
                event.preventDefault();
            } else {
                mailError.textContent = "";
            }

            if (motPasse.length < 8 || !hasNumber.test(motPasse) || !hasUpperCase.test(motPasse) || !hasLowerCase.test(motPasse)) {
                motPasseError.textContent = "Le mot de passe doit contenir au moins 8 caracs, au moins un chiffre, une lettre majuscule et une lettre minuscule";
                event.preventDefault();
            } else {
                motPasseError.textContent = "";
            }
        });

       
    </script>
   
</body>
</html>
