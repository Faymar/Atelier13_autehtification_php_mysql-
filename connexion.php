<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>connexion</title>
</head>

<body>
    <div class="box_login">
        <div class="box_form">
            <h1>Se Connecter</h1>
            <p>Votre Chauffeur en un clic ! </p>
            <div class="input_box">
                <button class="button">Continuer avec Facebook</button>
            </div>
            <hr>
            <form action="validation_conx.php" method="post">
                <div class="simple">
                    <label for=""><b>EMAIL</b></label>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="simple">
                    <label for=""><b>MOT DE PASSE</b></label>
                    <input type="password" name="password" placeholder="Mot de passe">
                </div>
                <div class="input_box">
                    <a href="inscription.php">Creer un Compte</a>
                    <button class="button2"><b>Se connectre</b></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>