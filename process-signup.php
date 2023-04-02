<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password_hash = password_hash($_POST['passeword'], PASSWORD_DEFAULT);


$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO users (fname, lname, email, password_hash)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}


$stmt->bind_param("ssss",
            $fname,
            $lname,
            $email,
            $password_hash);


if ($stmt->execute()) {       

    header("Location: signup-succes.html");
    exit;
    
} else {

    if ($mysqli->errno === 1062){
        die("Ce courriel est déjà utilisé dans un compte existant");

    } else {
        die($mysqli->error ." " . $mysqli->errno);
    }
}
?>