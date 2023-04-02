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
    <meta charset="UTF-8">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="Stylesheet"  href="Connexion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
              <li class="nav-item"><a href="index.php">Profil</a></li>          </lu>
          </div></nav>
          <?php
          //  include('navigation.php');
        ?>
  </header>
</head>
<body>


<style>
.text {
    text-align: left;
}

.col-md-6 {
    width: 100%;
}


#button1 {
background-color: orange;
color: white;

}

#button1:hover {
background-color: #2596be;
border-color: #2596be;
cursor: pointer;
}

.Connexion_form_subtitle{
    margin-top: 40px;
}

.text {
    color : #666666;
      width: 40%;


}

.form-control{
  border-radius: 6px;
  border-width: 1px;
  font-size: 18px;
  border-color: orange;
  height: 40px;
  width: 40%;
  margin-bottom: 20px;
}

#image {
  width: 100px;
}




</style>
<?php if (isset($user)): ?>
    <div class="wrapper" align="center">
        
        <div class="col-md-6 ">
  <p class="Connexion_form_subtitle">Remplissez le formulaire ci-dessous pour devenir gardien</p>
    

            <form action="updateInformations.php" method="POST">
            <div class="form-group">
                <image type="file" name="image"  id ="image" src="vector edit profile icon_4102538.png"></br>
                <label class="text">Photo profil</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label class="text">Prénom</label>
                    <input type="text" name="fname" class="form-control" value="<?php echo $user["fname"]; ?>">
                </div>
                <div class="form-group">
                <label class="text">Nom</label>
                    <input type="text" name="lname" class="form-control" value="<?php echo $user["lname"]; ?>">
                </div>
                <div class="form-group">
                <label class="text">Ville</label>
                    <input type="text" name="city" class="form-control" value="<?php echo $user["city"]; ?>">
                </div>
                <div class="form-group">
                <label class="text">Adresse courriel</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $user["email"]; ?>">
                </div>
                <div class="form-group">
                <label class="text">Déscription</label>
                    <textarea name="description" class="form-control"><?php echo $user["description"]; ?></textarea>
                </div>
                </div>
                <div class="form-group">
                <label class="text">Quelle est votre tarif par nuit</label>
                <input type="number" name="price" class="form-control" value="<?php echo $user["price"]; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="update" class="form-control" id="button1" value="Enregistrer">
                    </div>
           
                
                </form>
</div>
        </div>

    <?php endif; ?>

    <div class="footer">
  <p>Copyright © 2023 DogSitter All Rights Reserved. Terms and Conditions and Privacy & Cookie Policy.</p>
</div>
</body>

</html>