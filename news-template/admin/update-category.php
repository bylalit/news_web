<?php include "header.php"; 

    if(isset($_POST['sumbit'])){
        include "config.php";

        $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
        $cat_name = mysqli_real_escape_string($conn, $_POST['cat_name']);

        // $sql = "UPDATE category SET category_name = {$cat_name} WHERE category_id = {$cat_id}";
        $sql = "UPDATE category SET category_name = '{$cat_name}' WHERE category_id = '{$cat_id}'";
        $result = mysqli_query($conn, $sql) or die("Queery failed.");

        if(mysqli_query($conn, $sql)){
            header("Location: {$hostname}/admin/category.php");
        }

    }

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <?php
                    include "config.php";
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM category WHERE category_id = '$id'";
                    $result = mysqli_query($conn, $sql) or die("Connection Failed");
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                    }
                  ?>
                </div>
              </div>

            </div>
          </div>
<?php include "footer.php"; ?>
