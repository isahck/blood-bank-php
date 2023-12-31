        <?php
        session_start();
        include_once 'includes/validate.php' 
        
         ?>
        <!-- header -->
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

            <br>
            <br>
            <hr>
            <!--======================== card two ========================-->
            <div class="cardBox"> 
                            
                <div class="card">
                    <div>
                        <div class="numbers">
                            <a href="donor.php">
                                Donors
                                <i class="fas fa-users"></i>
                                <?php 
                                $s = mysqli_query($conn, "SELECT * FROM `donator`");
                                $coin = mysqli_num_rows($s);
                                ?>
                            </a>
                        </div>
                        <div class="cardName">Total: <?php echo $coin;?></div>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <a href="blood-request.php">
                                Request
                                <i class="fas fa-spinner"></i>
                                <?php 
                                $s = mysqli_query($conn, "SELECT * FROM `request`");
                                $coin = mysqli_num_rows($s);
                                ?>
                            </a>
                        </div>
                        <div class="cardName">Total: <?php echo $coin;?></div>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <a href="">
                                approve request
                                <i class="far fa-check-circle"></i>
                                <?php 
                                $s = mysqli_query($conn, "SELECT * FROM `request` WHERE status='Approved'");
                                $coin = mysqli_num_rows($s);
                                ?>
                            </a>
                        </div>
                        <div class="cardName">Total: <?php echo $coin;?></div>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <a href="blood-stock.php">
                                bloods stocks
                                <i class="fas fa-tint"></i>
                            </a>
                        </div>
                        <div class="cardName">Total: <?php echo $coin;?></div>
                    </div>
                </div>

            </div>
        
        <?php include_once 'includes/footer.php' ?>