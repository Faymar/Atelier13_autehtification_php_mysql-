<?php
require('bd.php');

$sql = 'SELECT * FROM users ';

$users = $conn->query($sql);

?>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>E-Taxibokko</title>
</head>

<body>
  <header class="w3-container w3-theme w3-padding" id="myHeader">
    <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i>
    <div class="w3-center">
      <h1 class="w3-xxxlarge w3-animate-bottom w3-blue">E-TAXIBOKKO</h1>
      <h4>BIENVENUE</h4>

      <div class="w3-padding-32">
        <button class="w3-btn w3-xlarge w3-blue" style="font-weight:900;"><a href="connexion.php">SE CONNECTER</a></button>
      </div>
    </div>
  </header>

  <div class="w3-container">
    <hr>
    <div class="w3-center">
      <h2>Liste des utilisateurs de E-TAXIBOKKO</h2>
    </div>
    <div class="w3-responsive w3-card-4">
      <table class="w3-table w3-striped w3-bordered">
        <thead>
          <tr class="w3-theme w3-blue">
            <th>nom </th>
            <th>prenom</th>
            <th>telephone</th>
            <th>email</th>
            <th>date_inscrit</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <tr>
              <td><?= $user['nom'] ?></td>
              <td><?= $user['prenom'] ?></td>
              <td><?= $user['telephone'] ?></td>
              <td><?= $user['email'] ?></td>
              <td><?= $user['date_inscrit'] ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>


</body>

</html>