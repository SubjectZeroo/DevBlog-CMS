<form action="" method="post">
  <div class="form-group">
    <div class="column">
      <div class="field">
        <label class="label" for="cat-title"> Edit Categories</label>
        <?php
                    if(isset($_GET['edit'])) {                        
                    $cat_id = $_GET['edit'];
                    $query = "SELECT * FROM categories WHERE category_id =  $cat_id";
                    $select_categories_id = mysqli_query($connection, $query);

                      while($row = mysqli_fetch_assoc( $select_categories_id)) {
                            $cat_id = $row['category_id'];
                              $cat_title = $row['category_title'];
                                
            ?>
        <div class="control">
          <input value="<?php if(isset($cat_title)) {echo $cat_title;}  ?>" class="input" type="text" name="cat_title">
        </div>

        <?php  }} ?>
      </div>
      <?php 
              if(isset($_POST['update_category'])){
                $the_cat_title = $_POST['cat_title'];

              $query = "UPDATE  categories SET  category_title = '$the_cat_title'  WHERE category_id = {$cat_id}";
              $update_query = mysqli_query($connection, $query);
            

                if(!$update_query) {
                  die("QUERY FAILED" . mysqli_error($connection));
                }
              }
            ?>
    </div>
    <div class="field">
     
        <input class="button is-success" type="submit" name="update_category" value="Update Category">
      
    </div>
  </div>
</form>