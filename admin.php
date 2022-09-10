<?php
include_once 'connect.php';
if (isset($_REQUEST['submit'])){
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $query=mysqli_query($con,"select * from admin where username='$username' and password='$password';") or die('error code'.mysqli_connect_error());
    if (mysqli_num_rows($query)==1){
        header("location:adminpanel.php");
    }
    else{
        header('location:admin.php');

    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="admin.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <title>Admin login</title>
</head>
<body>
<?php
//include_once 'navbar.php';
?>
<form method="post" enctype="multipart/form-data">
    <h1>Employer Log in</h1>
    <div class="inset">
        <p>
            <label for="username">Username</label>
            <input type="text" required name="username" id="username">
        </p>
        <p>
            <label for="password">PASSWORD</label>
            <input type="password" required name="password" id="password">
        </p>
        <p>
            <input type="checkbox" required name="remember" id="remember">
            <label for="remember">Remember me for 14 days</label>
        </p>
    </div>
    <p class="p-container">
        <span>Forgot password ?</span>
        <input type="submit" name="submit" id="go" value="Log in">
    </p>
</form>
<?php
//include_once 'footer.php';
?>
</body>
</html>