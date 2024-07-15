<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement des données</title>
    <style>
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
color: color: #006400; ;


        }

        .user-info {
            margin-bottom: 20px;
        }

        .user-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>votre information</h1>
        <div class="user-info">
            <?php
            // kifah nrbt bl base de donner 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sportives";

            $conn = new mysqli($servername, $username, $password, $dbname);
// confermer l'acce a la base ask l9it la base de donner li khdamt
            if ($conn->connect_error) {
                die("erreur" . $conn->connect_error);
            }

            
            $email = $_POST['email']; 

            $sql = "SELECT nom, prenom, age, sexe, ville, sports_pratiques, niveau_pratique, date_inscription FROM personne WHERE email='$email'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<p><strong>nome:</strong> " . $row["nom"] . " " . $row["prenom"] . "</p>";
                    echo "<p><strong>age:</strong> " . $row["age"] . "</p>";
                    echo "<p><strong>sexe:</strong> " . $row["sexe"] . "</p>";
                    echo "<p><strong>ville:</strong> " . $row["ville"] . "</p>";
                    echo "<p><strong>sport:</strong> " . $row["sports_pratiques"] . "</p>";
                    echo "<p><strong>niveau:</strong> " . $row["niveau_pratique"] . "</p>";
                    echo "<p><strong>date d'inscription:</strong> " . $row["date_inscription"] . "</p>";
                }
            } else {
                echo "<p>no information.</p>";
            }

            $conn->close();
            ?>
        </div>
        <a href="index.php">Retour</a>
    </div>
</body>
</html>
