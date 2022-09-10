<?php
include 'connect.php';
$query=mysqli_query($con,'select coment.coment_id,coment.name,coment.coment,post.title,post.author from coment inner join post on coment.post_id=post.post_id;')or die('xatolik'.mysqli_connect_error());

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    <title>Mediumish - A Medium style template by WowThemes.net</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/mediumish.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
include 'navbar.php';
?>
<div class="conteiner p-5 mt-md-5">
    <div class="container-fluid p-3 ">
        <div class="container mt-2 mb-2 p-2">
            <h2 class="text text-warning ">Table</h2>
        </div>
        <table class="table table-hover table-active  ">
            <tr>
            <th>coment_id</th>
            <th>coment-author</th>
                <th>coment</th>

            <th> post title</th>
            <th> post author</th>
                <th>delete coment</th>

            </tr>
            <?php
            while($row=mysqli_fetch_assoc($query)){
                ?>
            <tr>
              <td><?php echo $row['coment_id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['coment']?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['author'];?></td>
                <td><a href="delete.php?id=<?php echo $row['coment_id'];?>" class="btn   btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg></a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

</div>
<div class="conteiner  mt-md-5">
    <div class="container-fluid p-3 ">
        <div class="container mt-2 mb-2 p-2">
            <h2 class="text text-warning ">Post</h2>
        </div>
        <table class="table table-hover table-active  ">
            <tr>
                <th>post_id</th>
                <th>author</th>
                <th>title</th>

                <th> img</th>
                <th> delete </th>
                <th>edit</th>

            </tr>
            <?php
            $query=mysqli_query($con,'select * from post;');
            while($row=mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?php echo $row['post_id'];?></td>
                    <td><?php echo $row['author'];?></td>
                    <td><?php echo $row['title']?></td>
                    <td><?php echo $row['img'];?></td>
                    <td><a href="delete.php?delete=<?php echo $row['post_id'];?>" class="btn   btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg></a></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['post_id'];?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

</div>
</body>
</html>
