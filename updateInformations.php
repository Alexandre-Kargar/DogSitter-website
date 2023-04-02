<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);

if(isset($_POST['update'])){

        include('database.php');

         $fname =    $_POST['fname'];
         $lname =    $_POST['lname'];
         $city =    $_POST['city'];
         $email =    $_POST['email'];
         $description =    $_POST['description'];
         $price = $_POST['price'];
         
       

       
                        $id = $_SESSION['user_id'];
                        
                        $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email ='$email', city ='$city', description ='$description', price = '$price' WHERE id = '$id'";

                        $result = $mysqli->query($sql);

                        header('Location:updateSucces.php');
                    exit;
                    
                    }

        

?>