<!DOCTYPE html>
<?php
include "Connection.php";
if (isset($_POST["signup_btn"])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $c_password = mysqli_real_escape_string($con, $_POST["c_password"]);

    if (empty($username)) {
        $error = "user field is required";
    } elseif (empty($email)) {
        $error = "email field is required";
    } elseif (empty($password)) {
        $error = "password field is required";
    } elseif ($password != $c_password) {
        $error = "password does not match";
    } elseif (strlen($username) < 3 || strlen($username) > 20) {
        $error = "username must be between 3 to 20 characters";
    } elseif (strlen($password) < 6) {
        $error = "password must be atleast 6 chacater";
    } else {
        $check_email = "SELECT * FROM register WHERE email='$email'";
        $data = mysqli_query($con, $check_email);
        $result = mysqli_fetch_array($data);
        if ($result > 0) {
            $error = "Email already exist";
        } else {
            // simple password hash algorithum md5
            // $pass = md5($password);
            $insert = "INSERT INTO register (username,email,password) Value('$username','$email','$password')";
            $q = mysqli_query($con, $insert);
            header('location:login.php');
            if ($q) {
                $success = "You account has been created sucessfully";
            }
        }
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP login</title>
</head>

<body>
    <div class="signup">
        <p style="color: red;">
            <?php
            if (isset($error)) {
                echo $error;
            }
            ?>
        </p>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="username" value="<?php if (isset($error)) {
                                                                                    echo $username;
                                                                                } ?>">
            <br><br>
            <input type="email" name="email" placeholder="email" value="<?php if (isset($error)) {
                                                                            echo $email;
                                                                        } ?>">
            <br><br>
            <input type="password" name="password" placeholder="password">
            <br><br>
            <input type="password" name="c_password" placeholder="Con._password">
            <br><br>
            <input type="submit" name="signup_btn" value="signup">
            <input type="button" onclick="location.href='login.php';" value="login" />
        </form>
        <!-- <a href="login.php"><button>Login</button></a> -->
    </div>
</body>

</html>