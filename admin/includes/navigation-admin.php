<?php 
 $session = session_id();
 $time = time();
 $time_out_in_seconds = 05;
 $time_out = $time - $time_out_in_seconds;

 $query = "SELECT * FROM users_online WHERE session = '$session'";
 $send_query = mysqli_query($connection, $query);
 $count = mysqli_num_rows($send_query);

     if($count == NULL) {

     mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");


     } else {

     mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


     }

 $users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
 echo $count_user = mysqli_num_rows($users_online_query);





?>



<nav class="navbar is-fixed-top is-dark" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <!-- <img src="https://bulma.io/images/bulma-logo.png"
        alt="Bulma: Free, open source, and modern CSS framework based on Flexbox" width="112" height="28"> -->
        Mini CRM
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>

  </div>
  <div class="navbar-end">
      
      <div class="navbar-item">
            Users Online:
            <?php echo $count_user;?>
      </div>
     
    </div>
   
</nav>