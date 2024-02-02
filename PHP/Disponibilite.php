<?php

// Informations de connexion à la base de données
$host = '127.0.0.1:3307';
$dbname = 'tpmariadb';
$user = 'root';
$pass = '';

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width" initial-scale="1.0" charset="UTF-8"/>
        <title>Maker-fest</title>
        <link rel="stylesheet" href="../StyleSheet/Style.css">
        <script type="text/javascript" src="../Scripts/script.js"></script>
    </head>
    <body id="Page" onload="Onstart()" >

        <div id="Header">

            <img id="logo" src="../media/LogoSeul.png"><br>

            <h2>10.11.12 mai 2024   .   Alpe d'huez-france</h2>

            <h1>MAKER-FEST</h1>

            <div id="Perso">
                <p id="nbrvisiteur">Il y a actuellement 12 personnes, qui vistent le site</p>
            </div>

            <nav id="recherche">
                <a class="HomeNavbar" href="../index.html">Accueil</a>
                <a class="HomeNavbar" href="../Actualité.html">Actualité</a>
                <a class="HomeNavbar" href="../Billet.html">Achetez votre billet</a><!-- contient le nombre de place restant -->
                <a class="HomeNavbar" href="https://maps.app.goo.gl/731N5p4cfDKDViVT9">localisation</a>
                <a class="HomeNavbar" href="../PHP/Disponibilite.php">Disponibilté</a>
                <a class="HomeNavbar" href="#contact">contact</a>
                <a class="HomeNavbar" href="https://unimakers.fr">Qui sommes nous ?</a>
            </nav>
        </div>
        <br>
        <br>
        <br>
        <br>

        <?php
try {
    // Construction du DSN (Data Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname";

    // Connexion à MySQL/MariaDB
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Sélectionner toutes les colonnes de la table 'jours'
    $stmt = $pdo->query("SELECT * FROM jours");

    // Récupérer les résultats
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats dans un tableau HTML
    echo '<table border="1">';
    echo '<tr><th>Jours</th><th>Places restantes</th></tr>';

    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['jour'] . '</td>';
        echo '<td>' . $row['capacite'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} catch (PDOException $e) {
    // Gérer les erreurs de connexion ou d'exécution de la requête
    die('ERREUR PDO : ' . $e->getMessage());
}
?>
        <br>
        <br>
        <br>
        <br>
        <div id="contact_container">
            <nav id="contact">
                <!-- ouvre un éditeur de mail -->
                <a class="ContactNavbar" href="mailto:unimakers.amiens@gmail.com?subject=WebMail%20test&body=Dear%20Unimakers">Mail</a> 
                <!-- ouvre le composeur d'appel -->
                <a class="ContactNavbar" href="tel:00330782303292">Télephone</a>
                <a class="ContactNavbar" href="https://instagram.com/unimakers_amiens?igshid=NzZlODBkYWE4Ng=="><img class="icons" src="../media/Instagram_Glyph_Black.png" alt="Instagram"></a>
                <a class="ContactNavbar" href=""><img class="icons" src="../media/twitter_logo-black.png" alt="Twitter"></a>
                <a class="ContactNavbar" href="https://www.youtube.com/@UniMakersAmiens"><img class="icons" src="../media/yt_logo.png" alt="Youtube"></a>
                <a class="ContactNavbar" href="https://github.com/Unimakers"><img class="icons" src="../media/github-mark.png" alt="Github"></a>
                <a class="ContactNavbar" href="https://www.linkedin.com/company/unimakers-amiens"><img class="icons" src="../media/LinkedIn_logo.png" alt="linkedIn"></a>
                <a class="ContactNavbar" href=""><img class="icons" src="../media/Facebook_Logo_Primary.png" alt="Facebook"></a>
                <a class="HomeNavbar" href="./PHP/login.php">login</a>
            </nav>

        </div>
    </body>
</html>
