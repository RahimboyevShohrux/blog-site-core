<?php
include 'connect.php';
if (isset($_POST['submit'])){
    $title=$_POST['title'];
    $message=$_POST['text'];
    if (isset($_GET['id'])){
        $idd=$_GET['id'];

       $query=mysqli_query($con,"update post set title='$title', text='$message' where post_id='$idd'; ") ;
       if ($query){
           header('location:adminpanel.php');
       }
       else{
           header('location:edit.php');
       }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Edit post</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/mediumish.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        html, body {
            min-height: 100vh;
            padding: 0;
            margin: 0;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }
        input, textarea {
            outline: none;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: #ffffff;
        }
        h1 {
            margin-top: 0;
            font-weight: 500;
        }
        form {
            position: relative;
            width: 80%;
            border-radius: 30px;
            background: #fff;
        }
        .form-left-decoration,
        .form-right-decoration {
            content: "";
            position: absolute;
            width: 50px;
            height: 20px;
            border-radius: 20px;
            background: #5a7233;
        }
        .form-left-decoration {
            bottom: 60px;
            left: -30px;
        }
        .form-right-decoration {
            top: 60px;
            right: -30px;
        }
        .form-left-decoration:before,
        .form-left-decoration:after,
        .form-right-decoration:before,
        .form-right-decoration:after {
            content: "";
            position: absolute;
            width: 50px;
            height: 20px;
            border-radius: 30px;
            background: #fff;
        }
        .form-left-decoration:before {
            top: -20px;
        }
        .form-left-decoration:after {
            top: 20px;
            left: 10px;
        }
        .form-right-decoration:before {
            top: -20px;
            right: 0;
        }
        .form-right-decoration:after {
            top: 20px;
            right: 10px;
        }
        .circle {
            position: absolute;
            bottom: 80px;
            left: -55px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #fff;
        }
        .form-inner {
            padding: 40px;
        }
        .form-inner input,
        .form-inner textarea {
            display: block;
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: none;
            border-radius: 20px;
            background: #d0dfe8;
        }
        .form-inner textarea {
            resize: none;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border-radius: 20px;
            border: none;
            border-bottom: 4px solid #3e4f24;
            background: #5a7233;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
        }
        button:hover {
            background: #3e4f24;
        }
        @media (min-width: 568px) {
            form {
                width: 60%;
            }
        }
    </style>
</head>
<body>
<?php include 'navbar.php'?>
<form action="#" method="post" class="decor">
    <div class="form-left-decoration"></div>
    <div class="form-right-decoration"></div>
    <div class="circle"></div>
    <div class="form-inner">
        <h1>Edit post</h1>
        <input  name="title" type="text" placeholder="Post Title">

        <textarea name="text" placeholder="Message..." rows="5"></textarea>
        <button class=" text text-info "  name="submit" type="submit" >Submit</button>
    </div>
</form>
</body>
</html>
