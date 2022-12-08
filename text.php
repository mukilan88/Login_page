<?php
session_start();
include "Connection.php";
$email = $_SESSION['email'];
if ($email == true) {
} else {
    header('location:login.php');
}
echo $_SESSION['email'];
?>
<h1>welcome</h1>