<?php
        session_start();
        include_once 'includes/validate.php'; 
        include_once 'includes/data.php';
        $msg = '';
        if (empty($_GET['message'])) {
           echo '';
        }else{
            $msg = "<script>
            swal.fire(
              'successfully',
              'Blood Request Is Submitted <br /> Wait For Admin Approval',
              'success'
              )   
          </script>";
        } 
         ?>
        <!-- header -->
        <?php include_once 'includes/header.php' ?>
        <!-- =============== Navigation ================ -->
        <?php include_once 'includes/sidebar.php' ?>
        <!-- ========================= Main ==================== -->
        <?php include_once 'includes/topbar.php' ?>
            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <?php echo $msg ?>
                <div class="card">
                    <div>
                        <div class="numbers"><a href="">My Request</a></div>
                        <?php 
                        $s = mysqli_query($conn, "SELECT * FROM `request` WHERE donor_id = '$uid' ");
                        $coin = mysqli_num_rows($s);
                        ?>
                        <div class="cardName">Total: <?php echo $coin;?></div>
                    </div>

                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><a href="">Accepted Request</a></div>
                        <?php 
                        $s = mysqli_query($conn, "SELECT * FROM `request` WHERE donor_id = '$uid' AND status='Approved'");
                        $coin = mysqli_num_rows($s);
                        ?>
                        <div class="cardName">Total: <?php echo $coin;?></div>
                    </div>

                </div>


                <div class="card">
                    <div>
                        <div class="numbers"><a href="">Pending Request</a></div>
                        <?php 
                        $s = mysqli_query($conn, "SELECT * FROM `request` WHERE donor_id = '$uid' AND status='pending'");
                        $coin = mysqli_num_rows($s);
                        ?>
                        <div class="cardName">Total: <?php echo $coin;?></div>
                    </div>

                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><a href="">Rejected Request</a></div>
                        <?php 
                        $s = mysqli_query($conn, "SELECT * FROM `request` WHERE donor_id = '$uid' AND status='Rejected'");
                        $coin = mysqli_num_rows($s);
                        ?>
                        <div class="cardName">Total: <?php echo $coin;?></div>
                    </div>

                    </div>
            </div>

            <!-- ================ Hisrory List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Activities</h2>
                        <a href="myrequest.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Blood Group</td>
                                <td>Reason</td>
                                <td>Unit</td>
                                <td>Date</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $find_user = mysqli_query($conn, "SELECT * FROM `donator` WHERE donor_id = '$uid'");
                            $rows = (mysqli_fetch_array($find_user));
                            $count = 1;
                            $s = mysqli_query($conn, "SELECT * FROM `request` WHERE donor_id = '$uid' ORDER BY requested_at DESC LIMIT 5");
                            if ($s) {
                                while ($row = mysqli_fetch_array($s)) {
                            ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $rows['donor_name'] ?></td>
                                    <td><?php echo $row['blood_group'] ?></td>
                                    <td><?php echo $row['reson'] ?></td>
                                    <td><?php echo $row['blood_quantity'] ?></td>
                                    <td><?php echo $row['requested_at'] ?></td>
                                    <td>
                                        <button id="button" class="<?php echo $row['status'] ?>" class="pending"><?php echo $row['status'] ?></button>
                                   </td>
                                </tr>
                            <?php } }else{
                                echo 'f';
                            }?>
                            
                        </tbody>
                    </table>
                </div>
                <style>
                            .pending
                            {
                                background: orange;
                                border: none;
                                padding: 5px 15px;
                                color: #fff;
                            }
                            .Approved
                            {
                                background: blue;
                                border: none;
                                padding: 5px 15px;
                                color: #fff;
                            }
                            .Rejected
                            {
                                background: red;
                                border: none;
                                padding: 5px 15px;
                                color: #fff;
                            }
                         </style>

                <?php include_once 'includes/footer.php' ?>