<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width" initial-scale="1.0" charset="UTF-8"/>
        <title>Maker-fest</title>
        <link rel="stylesheet" href="../StyleSheet/Style.css">
        <link rel="stylesheet" href="../StyleSheet/BilletStyle.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="../Scripts/BilletScript.js"></script>
        
    </head>
    <body onload="Onstart()">

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
                <a class="HomeNavbar" href="https://maps.app.goo.gl/731N5p4cfDKDViVT9">localisation</a>
                <a class="HomeNavbar" href="../PHP/Disponibilite.php">Disponibilté</a>
                <a class="HomeNavbar" href="#contact">contact</a>
                <a class="HomeNavbar" href="https://unimakers.fr">Qui sommes nous ?</a>
                <a class="HomeNavbar" href="../PHP/login.php">login</a>
            </nav>
        </div>
        <div id="formulaire">
            <form method="post" onsubmit="return false;">
                <ul>
                    <li>
                        <label for="name">Sous quel nom ?&nbsp;:</label>
                        <input type="text" id="name" name="user_name" />
                    </li>
                    <li>
                        <label for="nbplace">Combien de place voulais vous ?&nbsp;:</label>
                        <input type="value" id="nbplace" name="nombre de place" />
                    </li>
                    <li>
                        <label for="typepass">Quel type de pass ?&nbsp;:</label>
                        <input name="type-normale" type="radio" value="1" id="type-pass1">normal</input>
                        <input name="type-normale" type="radio" value="2" id="type-pass2">VIP</input>
                    </li>
                    <li>
                        <label for="jour">Quel jour ?&nbsp;:</label>
                        <input name="Vendredi" type="checkbox" value="1" id="jour1">Vendredi</input>
                        <input name="Samedi" type="checkbox" value="1" id="jour2">Samedi</input>
                        <input name="Dimanche" type="checkbox" value="1" id="jour3">Dimanche</input>
                    </li>
                    <li>
                        <label for="msg">Un commentaire ? &nbsp;:</label>
                        <input id="msg" name="user_message"></input>
                    </li>
                </ul> 
                    <button  id="SubmitButton" onclick="showSummary()">Envoyer le formulaire</button>
               
            </form>
        </div>
        <div id="Resume_Container">
            
            <p id="ResumeCommande">test</p>

        </div>

        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
        <p>
            your user_id is :
            <?php echo htmlspecialchars($_SESSION["id"]); ?>
        
        </p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>


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
            </nav>

        </div>


    </body>

</html>
