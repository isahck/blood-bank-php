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
                        <h2>Patient List</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Blood Group</td>
                                <td>Mobile</td>
                                <td>Photo</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $s = mysqli_query($conn, "SELECT * FROM `donator`");
                        if ($s) {
                            while ($row = mysqli_fetch_array($s)) {
                        ?>
                            <tr>
                                <?php $sn=1; ?>
                                <td><?php echo $sn++?></td>
                                <td><?php echo $row['donor_name'] ?></td>
                                <td><?php echo $row['donor_email'] ?></td>
                                <td><?php echo $row['blood_group'] ?></td>
                                <td><?php echo $row['donor_mobile'] ?></td>
                                <td>
                                    <img src="../donor/images/<?php echo $row['photo'] ?>" width="70px" height="70px">
                                </td>
                                <td>
                                    <a href="tel:+234<?php echo $row['donor_mobile'] ?>" style="background: #00ff00; border-radius: 50%; padding: 10px; color: var(--white);">
                                        <i class="fas fa-phone"></i>
                                    </a>&nbsp;
                                    <a href="" style="background: blue; border-radius: 50%; padding: 10px; color: var(--white);">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </td>
                            </tr>
                           <?php } }else{
                            echo 'f';
                           }?>
                            
                        </tbody>
                    </table>
                </div>

                <?php include_once 'includes/footer.php' ?>
