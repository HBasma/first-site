<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgb(3, 136, 14);
        }
        
        .container {
            background-color: #fff;
            padding: 100px;
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
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        
        input[type="text"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        
        input[type="submit"] {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Recherche</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="sport" placeholder="Entrer le nom du sport">
            <input type="submit" value="Rechercher">
        </form>
        
        <?php

         // kifah nrbt bl base de donner 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sportives";


$conn = new mysqli($servername, $username, $password, $dbname);

// confermer l'acce a la base ask l9it la base de donner li khdamt
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// اcode sql
$sport = $_POST['sport'];
$sql = "SELECT nom, prenom, age, niveau_pratique FROM personne WHERE sports_pratiques='$sport'";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // afficher
    echo "<table border='1'>
    <tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Age</th>
    <th>Niveau Pratique</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['prenom'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['niveau_pratique'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun resultat trouve!!!!!!.";
}

//fermer la base de donner
$conn->close();
?>

    </div>
</body>
</html>
