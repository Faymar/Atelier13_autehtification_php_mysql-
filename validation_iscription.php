<?php
require('bd.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_nom = "/^[a-zA-Z ']{2,}$/";
    $regex_prenom = "/^[a-zA-Z ']{3,}$/";
    $regex_tel = "/^7+[0-9]{1,9}$/";

    $erros = [];


    if (empty($_POST["prenom"])) {
        $erros[] =  "Le prénom est obligatoire.";
    }

    if (empty($_POST["nom"])) {
        $erros[] =  "Le nom est obligatoire.";
    }
    if (!preg_match($regex_nom, $_POST["nom"])) {
        $erros[] = "Le nom est invalide.";
    }
    if (!preg_match($regex_prenom, $_POST["prenom"])) {
        $erros[] = "Le prénom est invalide.";
    }

    if (!preg_match($regex_tel, $_POST["tel"])) {
        $erros[] =  "Le numéro de téléphone doit contenir 9 chiffres.";
    }

    if (!empty($erros)) {
        echo "<table>";
        foreach ($erros as $er) {
            echo  "<tr><td>" . $er . "</td></tr>";
        }
        echo  "</table>";
    } else {
        $email = $_SESSION["email"];
        $password = md5($_SESSION["password"]);
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $telephone = $_POST["tel"];
        $datejour = Date('Y-m-d H:i:s');

        $sql = 'INSERT INTO `users` (nom,	prenom,	telephone, email, `password`, date_inscrit) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $prenom);
        $stmt->bindParam(3, $telephone);
        $stmt->bindParam(4, $email);
        $stmt->bindParam(5, $password);
        $stmt->bindParam(6, $datejour);
        try {

            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {

                $id = $conn->lastInsertId();

                $_SESSION['id'] = $id;
                // $_SESSION['password'] = $password;
                header("Location:dashboard.php");
            }
        } catch (Exception $e) {
            echo '<h1>Email ou numero de telephone deja iscrit</h1> <br>';
            echo '<h1><a href="inscription.php">retourner a la page d\'inscription</a> </h1><br>';
        }

        $db = null;
    }
}
