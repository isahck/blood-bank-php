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
                        <h2>Blood Donation List</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Donor Name</td>
                                <td>Blood Group</td>
                                <td>Unit</td>
                                <td>Disese</td>
                                <td>Donated On</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $s = mysqli_query($conn, "SELECT * FROM `donate`");
                            if ($s) {
                                while ($row = mysqli_fetch_array($s)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['user_donator_name'] ?></td>
                                    <td><?php echo $row['blood_group'] ?></td>
                                    <td><?php echo $row['blood_quantity'] ?></td>
                                    <td><?php echo $row['desease'] ?></td>
                                    <td><?php echo $row['donated_at'] ?></td>
                                    <td>
                                        <a onclick='return confirm("Are You Sure to delete this user")' href="delete-donation.php?id=<?php echo $row['id']?>" style="background: #ff0000; padding: 5px 10px; color: var(--white);">delete</a>
                                    </td>
                                </tr>
                            <?php } }else{
                                echo 'f';
                            }?>
                                
                        </tbody>
                    </table>
                </div>

                <?php include_once 'includes/footer.php' ?>
