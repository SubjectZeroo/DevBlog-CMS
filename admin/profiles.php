<?php include "includes/header.php" ?>
<?php

if(isset($_SESSION['username'])){
  $username =  $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '{$username}'";
  $select_user_profile_query = mysqli_query($connection, $query);


  while($row = mysqli_fetch_array($select_user_profile_query)) {

    $user_id = $row['id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firtsname = $row['user_firtsname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
  }
} 


?>

<?php 


if(isset($_POST['edit_user'])) {

  // $user_id = $_POST['id'];
  $user_firtsname = $_POST['user_firtsname']; 
  $user_lastname = $_POST['user_lastname'];
  $user_role = $_POST['user_role'];
  $username =  $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  
  // $post_date = date('d-m-y');
  // $post_image = $_FILES['image']['name'];
  // $post_image_temp = $_FILES['image']['name'];
  // move_uploaded_file($post_image_temp, "../images/$post_image");

  $query = "UPDATE  users SET "; 
  $query .= "user_firtsname = '{$user_firtsname}',";
  $query .="user_lastname = '{$user_lastname}',"; 
  $query .="user_role = '{$user_role}',";     
  $query .="username = '{$username}',";              
  $query .="user_email = '{$user_email}',";   
  $query .="user_password = '{$user_password}'"; 
  $query .="WHERE username = '{$username}'";    

  $update_user = mysqli_query($connection, $query);


    if(!$update_user) {
      die("QUERY FAILED" . mysqli_error($connection));
    }
}


?>
          <form action="" method="post" enctype="multipart/form-data">

            <div class="field">
              <label class="label" for="">Firtsname</label>
              <div class="control">
                <input class="input" value="<?php  echo $user_firtsname;  ?>" name="user_firtsname" type="text">
              </div>
            </div>


            <div class="field">
              <label class="label" for="">Lastname</label>
              <div class="control">
                <input class="input" value="<?php  echo $user_lastname;  ?>" name="user_lastname" type="text">
              </div>

            </div>


            <div class="field">
              <div class="select">
                <select name="user_role" id="user_role">

                  <option selected value='0'><?php echo $user_role; ?></option>
                  <?php 
                    if($user_role == 'admin') {

                    echo " <option value ='subcriber'>subcriber</option>";
                    } else {
                    echo "<option value ='admin'>admin</option>";
                    }
                    ?>
                </select>
              </div>
             
            </div>
            <div class="field">
              <label class="label" for="username">Username</label>
              <div class="control">
                <input class="input" value="<?php  echo $username;  ?>" name="username" type="text">
              </div>
            </div>


            <div class="field">
              <label class="label" for="user_email">Email</label>
              <div class="control">
                <input class="input" value="<?php  echo $user_email;  ?>" name="user_email" type="text"></input>
              </div>
            </div>



            <div class="field">
              <label class="label" for="user_password">Password</label>
              <div class="control">
                <input class="input" value="<?php  echo $user_password;  ?>" name="user_password"
                type="text"></input>
              </div>            
            </div>

            <div class="field">
              <input class="button is-success" type="submit" name="edit_user" value="Update Profile">
            </div>

          </form>
  <!-- /#page-wrapper -->
  <?php include "includes/footer.php" ?>