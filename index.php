<?php include "includes/db.php" ?>
<?php include  "includes/header.php"?>

<div class="modal" id="modalLogin">
  <div class="modal-background"></div>
  <div class="modal-content">
        <div class="section-login box">
            <h4 class="title">Login</h4>
            <form action="includes/login.php" method="POST">
                <div class="field">
                    <label class="label">Username</label>
                    <p class="control has-icons-left has-icons-right">
                        <input name="username" type="text" class="input" placeholder="Enter Username">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>       
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <p class="control has-icons-left has-icons-right">
                        <input name="password" type="password" class="input" placeholder="Enter password">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                            </span>
                            <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </p>
                    
                </div>
                <div class="field">
                    <p class="control">
                        <button class="button is-success" name="login" type="submit">
                        Login
                        </button>
                    </p>
                </div>
            </form>
        </div>
  </div>
 
  <button class="modal-close is-large" aria-label="close" onclick="refs.modalLogin.close()"></button>
</div>

<!-- Page Content -->
<div class="column is-9">
    <?php
                    $query = "SELECT * from posts WHERE post_status = 'published' ";
                    $select_all_posts_query = mysqli_query($connection, $query);
                                
                    while($row = mysqli_fetch_assoc( $select_all_posts_query)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 200) ;
                        $post_status = $row['post_status'];
                                
                        if($post_status == 'published') {

                        

                ?>
    
        <div class="card">
            <div class="card-image">
                <!-- <figure class="image is-4by3"> -->
                    <img src="http://placehold.it/1000x420" alt="Placeholder image">
                <!-- </figure> -->
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                            <img class="is-rounded" src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="media-content">
                        <p class="title is-4"> <a href="index.php"><?=$post_author?></a></p>
                        <time datetime="2016-1-1"><?= $post_date ?></time>
                        <!-- <p class="subtitle is-6">@johnsmith</p> -->
                    </div>
                </div>
                <div class="content">
                    <h1 class="title">
                        <a href="post.php?p_id=<?= $post_id ;?>"><?= $post_title ?></a>
                    </h1>
                    <?= $post_content ?>
                    
                    <a class="btn btn-primary" href="post.php?p_id=<?= $post_id ;?>">Leer Mas... </a>
            </div>
        </div>
        <?php }   }?>
    </div>

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
<hr>
<?php include  "includes/sidebar.php"?>
<?php include  "includes/footer.php"?>