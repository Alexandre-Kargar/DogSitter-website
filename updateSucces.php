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


    #button1{
      border-radius: 6px;
      border-width: 1px;
      font-size: 18px;
      background-color: orange;
      color: white;
      margin-top: 10px;
      border-color: orange;
      height: 40px;
      width: 20%;
      margin-bottom: 100px;
    }

    #button1:hover {
background-color: #2596be;
border-color: #2596be;
cursor: pointer;
}

#image {
  width: 100px;
}

.footer{
  position: relative;
}

@media (min-width: 300px) and (max-width: 1000px) {

  #button1{
      width: 50%;
    }

 
}

    

    </style>

<?php if (isset($user)): ?>

<div class="Connexion_form">
  <p style="color:orange" class="Title">Félicitations <?= htmlspecialchars($user["fname"]) ?>!</p>
  <p class="subtitle">Vous êtes maintenant gardien membre DogSitter</br></br>
  <span style="font-size:18px">Voici les informations affichées dans votre annonce</span>
  </p>
  
  <Div class="container" action="updateInformations.php" method="POST">
                <div class="form-group">
                <h3 class="text">Photo profil</h3>
                    <image type="file" name="image" class="form-control" id ="image" src="vector edit profile icon_4102538.png">
                </div>
                <div class="form-group">
                    <h3 class="text">Prénom</h3>
                    <p type="text" name="fname" class="form-control" ><?php echo $user["fname"]; ?></p>
                </div>
                <div class="form-group">
                <h3 class="text">Nom</h3>
                    <p type="text" name="lname" class="form-control"><?php echo $user["lname"]; ?></p>
                </div>
                <div class="form-group">
                <h3 class="text">Ville</h3>
                    <p type="text" name="city" class="form-control" ><?php echo $user["city"]; ?></p>
                </div>
                <div class="form-group">
                <h3 class="text">Adresse courriel</h3>
                    <p type="email" name="email" class="form-control"><?php echo $user["email"]; ?></p>
                </div>
                <div class="form-group">
                <h3 class="textarea">Déscription</h3>
                    <p name="description" class="form-control" id="descripton"><?php echo $user["description"]; ?></p>
                </div>
                <div class="form-group">
                <h3 class="text">Tarif par nuit</h3>
                    <p name="description" class="form-control"><?php echo $user["price"]; ?>$</p>
                </div>
  
                <button id="button1" onclick="window.location.href='devenirGardien.php';">Modifier votre profil</button>
                <div class="espace">
                
                </div>

</div>
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