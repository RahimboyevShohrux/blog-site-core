<?php
include 'connect.php';

if (isset($_REQUEST['submit'])) {


    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $error = false;
    echo $password." ".$email;

    $query = mysqli_query($con, "select * from registr where email='$email' and password='$password';");
    while ($row=mysqli_fetch_assoc($query)){
        $author=$row['username'];
    }
    if (mysqli_num_rows($query) == 1) {

        header("location:adpost.php?id=$author");
        $message = "successful";
    } else
        header('location:login.php');
    $error = true;
    $message = "Email or Password is incorrect";




}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form action="#" method="get" class="login">
                <div class="login__field">
                    <i class=" login__icon fas fa-user"></i>
                    <input name="email" type="text" class="login__input" placeholder=" Email">
                </div>
                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input name="password" type="password" class="login__input" placeholder="Password">
                </div>
                <button name="submit" type="submit" class=" button login__submit">
                    <span class="button__text">Log In Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
            <div class="social-login">
                <h3>log in via</h3>
                <div class="social-icons">
                    <a href="#" class="social-login__icon fab fa-instagram"></a>
                    <a href="#" class="social-login__icon fab fa-facebook"></a>
                    <a href="#" class="social-login__icon fab fa-twitter"></a>
                </div>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>



</body>
</html>
