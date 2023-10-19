<?php 
$dsn = 'mysql:host=localhost;dbname=etaxibokko';
$username = 'root';
$pass = 'root';

$conn = new PDO($dsn, $username, $pass);

if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

?>