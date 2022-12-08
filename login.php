<!DOCTYPE html>
<?php
session_start();
include "Connection.php";
if (isset($_POST['submit'])) {


    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select email,password from register where email='$email' and password='$password'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    if ($row == 1) {
        $num = mysqli_fetch_assoc($query);
        $_SESSION['email'] = $email;
        echo 'sucess';
        header('location:2ndpage.php');
    } else
        echo "<script>alert('not valid!!!');  </script>";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <h2>Login to your account</h2>
    <form method="post" name="contact" action="#">
        <input type="text" name="email" placeholder="email" /><br><br>
        <input type="Password" name="password" placeholder="password" /><br><br>
        <button type="submit" value="Login" id="submit" name="submit">Login</button>
    </form>
</body>

</html>