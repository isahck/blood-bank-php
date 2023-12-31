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
        $a = $_POST['address'];

        $ins = mysqli_query($conn, "UPDATE `users` SET name = '$n', email = '$e',mobile = '$m',blood ='$b',address ='$a' WHERE user_id = '$uid'");
        if ($ins) {
          $_SESSION['user_id'] = $_POST['email'];
          header('location:profile.php?message="profile updated successfully"');
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
            <div class="form edit-form" style="height: 600px;">
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
                <select name="blood" class="blood_po" require style="width: 250px:background: transparent; ">
                <option value="Select Blood Group">Select Blood Group</option>
                <?php
                  $s = mysqli_query($conn, "SELECT * FROM `blood`");
                  while ($row = mysqli_fetch_array($s)) {
                  ?>
                  <option value="<?php echo $row['blood_group'];?>"><?php echo $row['blood_group'];?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="label-box">address</div>
              <div class="form-field">
                <input type="text" value=<?php echo $a ?> name="address">
              </div>

              <div class="send">
                <input type="submit" value="Save" name="edit">
              </div>
              </form>
    <?php include_once 'includes/footer.php' ?>
           