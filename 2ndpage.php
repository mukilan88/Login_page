<?php
session_start();
include "Connection.php";
$email = $_SESSION['email'];
if ($email == true) {
} else {
    header('location:login.php');
}
?>

<img src="superheroes.jpg" alt="wall">