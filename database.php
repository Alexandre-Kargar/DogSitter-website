<?php


$mysqli = new mysqli("localhost", "root", "", "login");

if ($mysqli -> connect_errno) {
    die("Connection error ". $mysqli -> connect_error);
}
return $mysqli;

?>