    <?php
    session_start();
    include_once 'includes/validate.php';
    include_once 'includes/data.php'; 
    ?>
    <!--======== header  ========-->
    <?php include_once 'includes/header.php' ?>
    <!-- =============== Navigation ================ -->
    <?php include_once 'includes/sidebar.php' ?>

    <!-- ========================= Main ==================== -->
    <?php include_once 'includes/topbar.php' ?>


            <!-- ======================= Cards ================== -->
            <div class="cardBox">

          
            <?php
              $s = mysqli_query($conn, "SELECT * FROM `blood`");
              while ($row = mysqli_fetch_array($s)) {
             ?>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <a href="take_blood.php?id=<?php echo $row['id'];?>">
                                <?php echo$row["blood_group"] ?>
                             </a>
                         </div>
                        <div class="cardName">Total: <?php echo $row['blood_quantity'];?></div>
                    </div>

                </div>
                <?php } ?>

                

            </div>

            <?php include_once 'includes/footer.php' ?>
