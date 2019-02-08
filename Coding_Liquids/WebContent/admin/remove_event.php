<?php include "includes/db_conn.php" ?>
<?php include "includes/head_body_static.php" ?>


<body>

<div class="wrapper">

    <?php include "includes/sidebar_topbar.php";?>

    <?php
        /*
         * Script for removing the selected post from the DB
         */
        $show_posts_query = "SELECT * FROM posts";
        $show_posts_result = mysqli_query($conn,$show_posts_query);

        if(isset($_POST['removeBtn'])){
            $selectedItem = $_POST['all_posts_select'];
            $remove_query ="DELETE FROM posts WHERE program_name = '{$selectedItem}'";
            $remove_result = mysqli_query($conn, $remove_query);
            if(!$remove_result){
                die("Error. Contact webmaster. Error Description: ".mysqli_error($conn));
            }
            header('Location: remove_event.php?remove_post=success');
        }

        if(isset($_GET['remove_post']) && $_GET['remove_post']==='success'){
            echo '<div class="alert alert-danger invalid-username-password"><h4 class="text-center" style="font-weight: bold;line-height: 2rem;padding-top: 1rem;">Post Deleted!</h4></div>';
        }

    ?>


    <div class="container ">
      <form method="post">
          <div class="form-group margin-top">

              <label for="removeItem">Select a post to remove: </label>
              <select class="form-control" name="all_posts_select" id="removeItem">
                  <?php
                      if(mysqli_num_rows($show_posts_result)===0){
                          echo "<option>No items to remove</option>";
                      }else{
                          while($row = mysqli_fetch_assoc($show_posts_result)){
                              echo "<option>{$row['program_name']}</option>";
                          }
                      }
                  ?>
              </select>

          </div>
          <div class="form-group">
              <button type="submit" name="removeBtn" class="btn btn-danger h4">Delete event</button>
          </div>
      </form>
    </div>



  </div>

</body>


<?php include "includes/footer_static.php"?>
