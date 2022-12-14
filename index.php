<?php
include "connect.php";
?>
<!DOCTYPE html>
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

<!--begin navbar-->

<?php include "navbar.php"?>

<!--end navabr-->
<!-- Begin Site Title
================================================== -->
<div class="container">
    <div class="mainheading">
        <h1 class="sitetitle">Mediumish</h1>
        <p class="lead">
            Bootstrap theme, medium style, simply perfect for bloggers
        </p>
    </div>
    <!-- End Site Title
    ================================================== -->

    <!-- Begin Featured
    ================================================== -->
    <section class="featured-posts">
        <div class="section-title">
            <h2><span>Featured</span></h2>
        </div>
        <div class="card-columns listfeaturedtag">

            <!-- begin post -->
            <?php
            $dbcon = mysqli_connect("localhost", "root", "", "blog");

            if (!$dbcon) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $resultAll = mysqli_query($dbcon, "SELECT * FROM post order by post_id desc limit 4;");
            if (!$resultAll) {
                die(mysqli_error($dbcon));
            }

                while ($row = mysqli_fetch_assoc($resultAll)):
            ?>
            <div class="card">
                <div class="row">
                    <div class="col-md-5 wrapthumbnail">
                        <a href="post.php?id=<?php echo $row['id'];?>">
                            <div class="thumbnail" style="background-image:url(<?= $row['img']?>);">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-7">
                        <div class="card-block">
                            <h2 class="card-title"><a href="post.php?id=<?php echo $row['post_id'];?>"> <?= $row['title']?></a></h2>
                            <h4 class="card-text"><?= substr($row['text'],0,50)?></h4>
                            <div class="metafooter">
                                <div class="wrapfooter">
								<span class="meta-footer-thumb">
								<a href="#"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
								</span>
                                    <span class="author-meta">
								<span class="post-name"><a href="#"> <?php echo $row["author"]?></a></span><br/>
								<span class="post-date">22 July 2022</span><span class="dot"></span><span class="post-read">6 min read</span>
								</span>
                                    <span class="post-read-more"><a href="post.php?id=<?php echo $row['post_id'];?>" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>

            <!-- end post -->

        </div>
    </section>
    <!-- End Featured
    ================================================== -->

    <!-- Begin List Posts
    ================================================== -->
    <section class="recent-posts">
        <div class="section-title">
            <h2><span>All Stories</span></h2>
        </div>
        <div class="card-columns listrecent">
            <?php
            $dbcon = mysqli_connect("localhost", "root", "", "blog");

            if (!$dbcon) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $resultAll = mysqli_query($dbcon, "SELECT * FROM post ;");
            if (!$resultAll) {
                die(mysqli_error($dbcon));
            }

            while ($row = mysqli_fetch_assoc($resultAll)):
            ?>
            <!-- begin post -->
            <div class="card">
                <a href="post.php?id=<?php echo $row['post_id'];?>">
                    <img class="img-fluid" src="<?php echo  $row['img']; ?>" alt="wefe">
                </a>
                <div class="card-block">
                    <h2 class="card-title"><a href="post.php?id=<?php echo $row['post_id'];?>"><?php echo $row['title']?></a></h2>
                    <h4 class="card-text"><?php echo $row['text']?></h4>
                    <div class="metafooter">
                        <div class="wrapfooter">
						<span class="meta-footer-thumb">
						<a href="#"><img class="author-thumb" src="https://www.gravatar.com/avatar/e56154546cf4be74e393c62d1ae9f9d4?s=250&amp;d=mm&amp;r=x" alt="Sal"></a>
						</span>
                            <span class="author-meta">
						<span class="post-name"><a href="#"><?php echo $row['author'];?></a></span><br/>
						<span class="post-date">22 July 2017</span><span class="dot"></span><span class="post-read">6 min read</span>
						</span>
                            <span class="post-read-more"><a href="post.html" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <!-- end post -->

        </div>
    </section>
    <!-- End List Posts
    ================================================== -->

    <!--		begin	footer-->

    <?php include "footer.php"; ?>

    <!--	end footer-->
</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/jquery-3.6.1.min.js"></script>
<?php if(isset($_GET['a'])){
    ?>
    <script>
        Swal.fire({
            title: 'Succesfuly img',
            icon: 'success',
            timer: 1500,
            showCloseButton: false,
            showConfirmButton: false
        })
    </script>
<?php
}?>


</body>
</html>
