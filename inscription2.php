<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regex_email = "/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/";
    $erros = [];

    if (!preg_match($regex_email, $_POST["email"])) {
        $erros[] = "Le email est invalide.";
    }

    if (strlen($_POST["password"]) < 8) {
        $erros[] = "Le mot de passe doit avoir au moins 8 caractères.";
    }

    if (
        !preg_match("/[A-Z]/", $_POST["password"]) ||
        !preg_match("/[a-z]/", $_POST["password"]) ||
        !preg_match("/[0-9]/", $_POST["password"])
    ) {
        $erros[] = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minusculeet au moins un chiffre.";
    }

    if (!empty($erros)) {
        echo "<table>";
        foreach ($erros as $er) {
            echo "<tr><td>" . $er . "</td></tr>";
        }
        echo "</table>";
        die;
    } else {
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];

?>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>connexion</title>
        </head>

        <body>
            <div class="box_login">
                <div class="box_form">
                    <h1>Bienvenue</h1>
                    <p>Finaliser votre inscription en renseignant les informations manquantes</p><br>

                    <form action="validation_iscription.php" method="post">
                        <div class="groupe">
                            <label for=""><b>PRENOM</b></label>
                            <label for=""><b>NOM</b></label>
                            <input type="text" placeholder="votre Prenom" name="prenom" required />
                            <input type="text" placeholder="votre nom" name="nom" required />
                        </div>
                        <div class="simple">
                            <label for=""><b>TELEPHONE</b></label>
                            <div class="groupeTel">
                                <div class="indicatif">+221</div>
                                <input type="number" class="numero" name="tel" ="Votre numéro de téléphone" required>
                            </div>
                        </div>
                        <div class="input_box">
                            <button class="button2">S"inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </body>

        </html>
        <!-- <div class="senegal flag"></div> -->

<?php
    }
} ?>