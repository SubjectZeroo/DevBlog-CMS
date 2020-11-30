<?php include "includes/db.php" ?>
<?php include  "includes/header.php"?>

<!-- Navigation -->


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">


        <?php

if(isset($_GET['category'])) {
 $post_category =  $_GET['category'];
}


        $query = "SELECT * from posts WHERE post_category_id =  $post_category";
        $select_all_posts_query = mysqli_query($connection, $query);
                    
        while($row = mysqli_fetch_assoc( $select_all_posts_query)) {
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];
                    

                ?>
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>
            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?= $post_id ;?>"><?= $post_title ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?= $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span><?= $post_date ?></p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p><?= $post_content ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            <?php        }
 ?>
      

            <!-- Pager -->
            <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include  "includes/sidebar.php"?>
    </div>
    <!-- /.row -->

    <hr>
    <?php include  "includes/footer.php"?>

    