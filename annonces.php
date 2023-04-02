<?php

session_start();



  $mysqli = require __DIR__ . "/database.php";

  $sql = "SELECT * FROM users";

      $result = $mysqli->query($sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="Stylesheet" type="text/css">
    <script src="dogSitter.js" defer></script>
    <link rel="stylesheet" href="VoirGardiens.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pupup Form</title>

    <header>
        <nav class="navbar">
            <!--Logo -->
            
               <div class="brand-title"> 
                <a href="dogSitter.html" id="logo"><img src="Logo-Dog-Sitter.png" alt="Logo DogSitter" width="40px"></a>
            </div>
            
            <a href="#" class="toggle-button" onclick="navResponsive()">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <!--Les liens dans la barre de navigation -->
            <div class="navbar-links" id="navbar-links">
                <lu class="nav-links">
                    <a href="annonces.php" class="button-nav-chercher">Chercher un gardien</a>
                    <a href="inscription.html" class="button-nav">Devenir gardien d'animaux</a>
                    <li class="nav-item"><a href="inscription.html">S'inscrire</a></li>
                    <li class="nav-item"><a href="login.php">Connectez-vous</a></li>
                    <li class="nav-item"><a href="help.html">Aide</a></li>
                    <li class="nav-item"><a href="index.php">Profil</a></li> 
                </lu>
                </div>
            </nav>
    </header>
</head>


<body>


<p id="title">Trouvez un dog sitter près de chez vous</p>
    
<div id="containerAnnonce">
                    <?php 
/* Inclure le fichier config */
require_once "database.php";
                    
                    /* select query execution */

                    
                    
                        if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<div class='annonce'>";
                                    echo "<img class='imageAnnonce' src='vector edit profile icon_4102538.png' alt='#annonce'>";

                                        echo "<h4 class='titreAnnonce'>" . $row['fname'] . "</h4>";
                                        echo "<p>" . $row['city'] . "</p>";
                                        echo "<p class='dsecriptionAnnonce'>" . $row['description'] . "</p>";
                                        echo '<a href="voirAnnonce.php?id='. $row['id'] .' "class="enSavoirPlus">En savoir plus</a>';
                                        echo "<p>" . $row['price'] . "$ / nuit</p>";

                                echo "</div>";
                                }}
                    ?>
                </div>
                



<footer class="footer">
    <p id="footerText">Copyright © 2023 DogSitter All Rights Reserved. Terms and Conditions and Privacy & Cookie Policy.</p>
</footer>

</body>
</html>