<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    if ($user) {

            if (password_verify($_POST["password"], $user["password_hash"])){

                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];
                
                header("Location: index.php");
                exit;
            }
        }
        $is_invalid = true;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="Stylesheet" type="text/css">
  <script src="dogSitter.js" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="Stylesheet"  href="Connexion.css">
  <title>Connexion DogSitter</title>

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
<div>
<form action="login.php" method="post" class="Connexion_form">
  <p class="Connexion_form_Title">Déjà membre de DogSitter?</p>
  <p class="Connexion_form_subtitle">Connectez-vous ci-dessous!</p>
  <?php if ($is_invalid): ?>
        <p style="color:red"; >Connexion échouée</p>
    <?php endif; ?>
  
      <input type="email" name="email" class="email" placeholder="Courriel" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
      <input type="password" name="password" class="password" placeholder="Password" required>
      <input type="submit"  class="connexion-button" value="Se connecter">

  <a class="Forgot-password" href="#">Vous avez oublié votre mot de passe ?</a>
    <hr class="entier-line">
  <p class="Title-bas-de-page">Pas encore inscrit?</p>
  <a class="link-connexion" href="inscription.html">S'inscrire</a>
</form>
  </div>
  
<div class="footer">
  <p>Copyright © 2023 DogSitter All Rights Reserved. Terms and Conditions and Privacy & Cookie Policy.</p>
</div>
</body>


</html>










