<?php
session_start();
if (isset($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>E-Taxibokko</title>
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <header>
            <h1>E-Taxibokko</h1>
        </header>
        <main>
            <h2>Liste des voitures disponibles</h2>
            <ul class="voitures">
            </ul>
        </main>
        <footer>
            <p>Copyright &copy; 2023 fayemar Simplon</p>
        </footer>
    </body>

    </html>
<?php
} else   header("Location: connexion.php");

?>