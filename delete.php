<?php
include 'connect.php';
if (isset($_REQUEST['id'])){
    $idd=$_REQUEST['id'];
    $query=mysqli_query($con,"delete from coment where coment_id='$idd';");
    if ($query){
        header('location:adminpanel.php');
    }

}
elseif ($_GET['delete']){
    $idd=$_GET['delete'];
    $query=mysqli_query($con,"delete from post where post_id='$idd';");
    if ($query){
        header('location:adminpanel.php');
    }
}
?>