<?php
require('bd.php');

$sql = 'SELECT * FROM users WHERE email = ?';
$stmt = $conn->prepare($sql);

$stmt->bindParam(1, $_POST['email']);

$stmt->execute();

if ($stmt->rowCount() > 0) {

    $password = $stmt->fetchColumn(5);

    if (md5($_POST['password']) === $password) {

        $_SESSION['id'] = $stmt->fetchColumn(0);

        header('Location: dashboard.php');
    } else {
        echo 'email ou mot de passe est incorrect.';
    }
} else {
    echo 'L\'utilisateur n\'existe pas.';
}

// Fermer la connexion à la base de données
$pdo = null;
