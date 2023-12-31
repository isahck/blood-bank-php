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
                        <h2 styke="text-aling: center;">Blood Requsted List By Donators</h2>
                        <a href="blood-request.php" class="btn">Patient Request</a>
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
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $s = mysqli_query($conn, "SELECT * FROM `request` WHERE status ='pending' AND user_id='' ORDER BY requested_at DESC");
                            if ($s) {
                                while ($row = mysqli_fetch_array($s)) {
                                    $find_donor = mysqli_query($conn, "SELECT * FROM `donator` WHERE donor_id = '".$row['donor_id']."'");
                                    $rowd = (mysqli_fetch_array($find_donor));
                                    $count = 1;
                            ?>
                                <tr>
                                    <td><?php echo $rowd['donor_name'] ?></td>
                                    <td><?php echo $row['blood_group'] ?></td>
                                    <td><?php echo $row['reson'] ?></td>
                                    <td><?php echo $row['blood_quantity'] ?></td>
                                    <td><?php echo $row['requested_at'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td>
                                        <a href="accept-request.php?request_id=<?php echo $row['request_id']?>&&blood_id=<?php echo $row['blood_id']?>&blood_quantity=<?php echo $row['blood_quantity']?>" style="background: #0000ff; padding: 5px 10px; color: var(--white);">accept</a>
                                        <a onclick='return confirm("Are You Sure")' href="reject-request.php?request_id=<?php echo $row['request_id']?>" style="background: #ff0000; padding: 5px 10px; color: var(--white);">reject</a>
                                    </td>
                                </tr>
                            <?php } }else{
                                echo 'f';
                            }?>
                            
                        </tbody>
                    </table>
                </div>

                <?php include_once 'includes/footer.php' ?>
