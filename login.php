<?php
$uname = $_POST['uname'];
$password = $_POST['password'];

$con = new mysqli("localhost", "root", "", "login");

if ($con-> connect_error) {
    die("La connexion a échoué: ".$con->connect_error);
} else {
    $stmt = $con-> prepare("select * from users where email = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result-> num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            $fname = htmlspecialchars($data['fname']);
            echo  "<h2>Bonjour $fname</h2>";
            echo "<h2>Vous êtes connecté à votre compte DogSitter!</h2>";
        } else {
        echo "<h2>Adresse courriel ou mot de passe invalide</h2>";
        }
    } else {
        echo "<h2>Adresse courriel ou mot de passe invalide</h2>";
    }

}

?>
