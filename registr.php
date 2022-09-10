<?php

$error = false;
$bool = false;
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['name'];
    $parol = $_POST['password'];
    $repeat = $_POST['repeat'];



    $connect = mysqli_connect('localhost', 'root', '', 'blog');
    if (!$connect) {
        die('xatolik' . mysqli_connect_error());
    }
    $query = mysqli_query($connect, "select * from registr where email='$email';");
    if (mysqli_num_rows($query) == 0) {
        if ($parol == $repeat) {
            $query = mysqli_query($connect, "insert into registr(username,email,password) values ('$username','$email','$parol');");
            header('location:login.php?k=');
        } else {
            $bool = true;
            $m = "password is not suitable";
        }

    } else {
        $error = true;

        $message = 'email already exists';
    }
}


?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Registr</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/mediumish.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="registr.css">
</head>
<body>
<?php include 'navbar.php'?>

<section class="h-100 " style="background-color: #eee;">
    <div class="container vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11 mt-md-5">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form action="#" method="post" class="mx-1 mx-md-4">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input value="<?php if($error){ echo $username;}?>"  type="text" required name="name" id="form3Example1c" class="form-control" />
                                            <label class="form-label" for="form3Example1c">Your Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input <?php if ($error){ ?>style="border: 3px solid red" <?php }?> value="<?php if ($error) {echo $email;}?>"  type="email" id="form3Example3c" required name="email" class="form-control" placeholder="<?php if($error){echo $message;}?>"/>
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input  value="<?php if($error){ echo $parol;}?>" type="password" required name="password" id="form3Example4c" class="form-control" />
                                            <label class="form-label" for="form3Example4c">Password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input <?php if ($bool){ ?>style="border: 3px solid red" <?php }?> type="password" required name="repeat" id="form3Example4cd" class="form-control" placeholder="<?php if($bool){echo $m;}?>" />
                                            <label class="form-label"  for="form3Example4cd">Repeat your password</label>
                                        </div>
                                    </div>

                                    <div class="form-check d-flex justify-content-start pl-3 mb-5">
                                        <input  required name="checkbox" class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href='#'>Kirish</a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                </form>

                            </div>
                            <div  class="  col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="registr.jpg"
                                     class="img-fluid " height="400px" width="400px" style="padding: 0px 0px 100px 0px; margin-left: 100px;" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
