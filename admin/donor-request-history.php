<?php
        session_start();
        include_once 'includes/validate.php' 
        
    ?>
    <!--======== header  ========-->
    <?php include_once 'includes/header.php' ?>
    <!-- =============== Navigation ================ -->
    <?php include_once 'includes/sidebar.php' ?>

    <!-- ========================= Main ==================== -->
    <?php include_once 'includes/topbar.php' ?>


            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Blood Requsted List</h2>
                        <a href="request-history.php" class="btn">View Donator Request</a>
                    </div>

                    
                    <table>
                        <thead>
                            <tr>
                                <td>Donators Name</td>
                                <td>Blood Group</td>
                                <td>Reason</td>
                                <td>Unit</td>
                                <td>Date</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $s = mysqli_query($conn, "SELECT * FROM `request` WHERE user_id='' ORDER BY requested_at DESC");
                            if ($s) {
                                while ($row = mysqli_fetch_array($s)) {
                                    $find_user = mysqli_query($conn, "SELECT * FROM `donator` WHERE donor_id = '".$row['donor_id']."'");
                                    $rows = (mysqli_fetch_array($find_user));

                            ?>
                                <tr>
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
                    </table>
                </div>

                <?php include_once 'includes/footer.php' ?>
