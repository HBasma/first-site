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
