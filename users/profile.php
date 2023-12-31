    <?php 
     session_start();
     $msg = '';
     include_once 'includes/validate.php';
     include_once 'includes/data.php';
     if (empty($_GET['message'])) {
        echo '';
     }else{
        $msg = "<script>
        swal.fire(
        'Success',
        'Profile Updated <br /> Successfully',
        'success'
        )   
        </script>";
     }
    ?>

    <?php include_once 'includes/header.php' ?>

    <!-- =============== Navigation ================ -->
    <?php include_once 'includes/sidebar.php' ?>
   <?php echo $msg; ?>
    <!-- ========================= Main ==================== -->
    <?php include_once 'includes/topbar.php' ?>
 
          <!--============== Top Bar =================--> 
          <div class="reques">
            <div class="profile">
                <br>
                <h2>profile</h2>
                <div class="user-details">
                    <p>name: <?php echo$n ?></p>
                </div>
                <div class="user-details">
                    <p>email: <?php echo$e ?></p>
                </div>
                <div class="user-details">
                    <p>mobile: <?php echo$m ?></p>
                </div>

                <div class="user-details">
                    <p>blood group:: <?php echo$b ?></p>
                </div>

                <div class="user-details">
                    <p>address: <?php echo$a ?></p>
                </div>

                <div class="user-details">
                    <p>register on: <?php echo$r ?></p>
                </div>
                <br>
                <div class="operators">
                    <a href="edit-profile.php?user_id=<?php echo $uid ?>" class="operate">edit Profile</a>
                    <a href="change-password.php" class="operate">Change password</a>
                </div>

            </div>
            <?php include_once 'includes/footer.php' ?>
