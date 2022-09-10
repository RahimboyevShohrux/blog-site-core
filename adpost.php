<?php
include_once 'connect.php';
if(isset($_POST['go'])){
    $author=$_GET['id'];
    $title=$_POST['title'];
    $text=$_POST['text'];
    $filename = $_FILES['file']['name'];

// Select file type
    $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

// valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

// Check extension
    if( in_array($imageFileType,$extensions_arr) ){

        // Upload files and store in database
        if(move_uploaded_file($_FILES["file"]["tmp_name"],'upload/'.$filename)){
            // Image db insert sql
            $insert = "INSERT into post(author,title,img,text) values('$author','$title','upload/$filename','$text');";
            if(mysqli_query($con, $insert)){

                header('location:index.php?a=1');

            }
            else{
                echo 'Error: '.mysqli_error($con);
            }
        }
        else{
            echo 'Error in uploading file - '.$_FILES['file']['name'];
        }
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="adpost.css" rel="stylesheet">
    <title>Addpost</title>
</head>
<body>
<form method="post" action="#" enctype="multipart/form-data">
    <h1 class="text text-success">ADD POST</h1>
    <div class="inset">
        <p>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </p>

        <p>
            <label for="password">IMg</label>
            <input type="file" name="file" id="password">
        </p>
        <p>
            <label class="form-label" for="text">Text</label>
            <textarea class="form-control conteiner-fluid" id="text" name="text" rows="5"></textarea>
        </p>
        <p>
            <input type="checkbox" required name="remember" id="remember">
            <label for="remember">Remember me for 14 days</label>
        </p>

    </div>
    <p class="p-container">
        <span>Forgot password ?</span>
        <input type="submit" name="go" id="go" value="Log in">
    </p>
</form>

</body>
</html>
