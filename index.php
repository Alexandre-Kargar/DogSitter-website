<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users 
        where id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);
    
        $user = $result->fetch_assoc();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="Stylesheet" type="text/css">
  <script src="dogSitter.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="Stylesheet"  href="index.css">
  <title>Home</title>

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
          </div></nav>
  </header>
</head>

<body>
  <style>


    

    </style>

<?php if (isset($user)): ?>

<div class="Connexion_form">
  <p class="Title">Bonjour <?= htmlspecialchars($user["fname"]) ?></p>
  <p class="subtitle">Vous êtes connecté à votre compte DogSitter!</br></br>
  <span style="font-size:18px">Choisissez le service que vous souhaitez utiliser parmi les options ci-dessous.</span>
  </p>
  
  <button id="b1" class="link-button" onclick="window.location.href='annonces.php';">Chercher un gardien</button>
  <button class="link-button" onclick="window.location.href='devenirGardien.php';">Devenir gardien</button>
  <button class="link-button" onclick="window.location.href='logout.php';">Se deconnecter</button>


</div>

<?php else: ?>
  <div class="Connexion_form">
    <p class="Title">Votre êtes déconnecté de votre compte</p>
  <p class="subtitle" style="font-size:20px"><a href="login.php" style="color:blue">Connectez-vous à votre compte</a> ou <a href="inscription.html" style="color:blue">Créer un compte</p>
</div>
  <?php endif; ?>


<div class="footer1">
  <p>Copyright © 2023 DogSitter All Rights Reserved. Terms and Conditions and Privacy & Cookie Policy.</p>
</div>
</body>


</html>