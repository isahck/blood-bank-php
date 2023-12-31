    <?php 
     session_start();
     include_once 'includes/validate.php';
     include_once 'includes/data.php';
     
     $editid = $_GET['user_id'];
    if (isset($_POST['edit'])) {
      $n = $_POST['name'];
      $e = $_POST['email'];
      $m = $_POST['mobile'];
      $b = $_POST['blood'];

      $ins = mysqli_query($conn, "UPDATE `users` SET name = '$n', email = '$e',mobile = '$m',blood ='$b' WHERE user_id = '$uid'");
      if ($ins) {
        $_SESSION['user_id'] = $_POST['email'];
        header('location:profile.php');
      }
    }

    ?>
    
  <!-- =============== Navigation ================ -->
    <?php include_once 'includes/header.php' ?>

    <?php include_once 'includes/sidebar.php' ?>


    <!-- ========================= Main ==================== -->
    <?php include_once 'includes/topbar.php' ?>
 
          <!--============== Top Bar =================--> 
          <div class="reques">
            <div class="form edit-form">
              <h2>Edit Profile</h2>
              <form method="post">
              <div class="label-box">name</div>
              <div class="form-field">
                <input type="text" value=<?php echo $n ?> name="name">
              </div>

              <div class="label-box">email</div>
              <div class="form-field">
                <input type="text" value=<?php echo $e ?> name="email">
              </div>

              <div class="label-box">mobile</div>
              <div class="form-field">
                <input type="text" value=<?php echo $m ?> name="mobile">
              </div>

              <div class="label-box">blood group</div>
              <div class="form-field">
                <input type="text" value=<?php echo $b ?> name="blood">
              </div>

              <div class="send">
                <input type="submit" value="Save" name="edit">
              </div>
              </form>
    <?php include_once 'includes/footer.php' ?>
           