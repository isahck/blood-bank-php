        <?php
        session_start();
        include_once 'includes/validate.php';
        include_once 'includes/data.php';


        if (isset($_POST['change'])) {
          $op = $_POST['oldpassword'];
          $np = $_POST['newpassword'];
          if (empty($op) && empty($np)) {
              $msg = "<script>
                    swal.fire(
                  'failed',
                  'old and new password are empty',
                  'warning'
              )
                </script>";
          }else{
          if ($op == $p) {
              $sql = mysqli_query($conn, "UPDATE `users` SET password = '$np' WHERE user_id = '$uid'");
              header('location:profile.php');
          }
          else{
              $msg = "<script>
                    swal.fire(
                  'failed',
                  'password mismatch',
                  'warning'
              )
                </script>";
          }
      }
      }

        
         ?>
          <!--======== header  ========-->
          <?php include_once 'includes/header.php' ?>
          <!-- =============== Navigation ================ -->
          <?php include_once 'includes/sidebar.php' ?>

          <!-- ========================= Main ==================== -->
          <?php include_once 'includes/topbar.php' ?>
      
          <!--============== Top Bar =================--> 
          <div class="reques">
            <div class="form">
              <form method="post">
                <br><br><br>
              <h2>Change Password<h2>

              <div class="label-box">Old Password</div>
              <div class="form-field">
                <input type="text" name="oldpassword">
              </div>

              <div class="label-box">New Password</div>
              <div class="form-field">
                <input type="text" name="newpassword">
              </div>

              <div class="send">
                <input type="submit" name="change" value="Save">
              </div>
              </form>
            </div>
            <?php include_once 'includes/footer.php' ?>
