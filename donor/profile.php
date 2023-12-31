    <?php 
        session_start();
     include_once 'includes/validate.php';
     include_once 'includes/data.php';

    ?>

    <?php include_once 'includes/header.php' ?>

    <!-- =============== Navigation ================ -->
    <?php include_once 'includes/sidebar.php' ?>

    <!-- ========================= Main ==================== -->
    <?php include_once 'includes/topbar.php' ?>
 
          <!--============== Top Bar =================--> 
          <div class="reques">
            <div class="profile">
                <br>
                <h2>profile</h2>
                <div class="user-details">
                    <p>name: <?php echo$dn ?></p>
                </div>
                <div class="user-details">
                    <p>email: <?php echo$de ?></p>
                </div>
                <div class="user-details">
                    <p>mobile: <?php echo$mobile ?></p>
                </div>

                <div class="user-details">
                    <p>blood group:: <?php echo$db ?></p>
                </div>


                <div class="user-details">
                    <p>register on: <?php echo$dr ?></p>
                </div>
                <br>
                <div class="operators">
                    <a href="edit-profile.php?donor_id=<?php echo $uid ?>" class="operate">edit Profile</a>
                    <a href="change-password.php" class="operate">Change password</a>
                </div>

            </div>
            <?php include_once 'includes/footer.php' ?>
