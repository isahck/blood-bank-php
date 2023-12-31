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


            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Blood Requsted History</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
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
                            $find_user = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$uid'");
                            $rows = (mysqli_fetch_array($find_user));
                            $count = 1;
                            $s = mysqli_query($conn, "SELECT * FROM `request` WHERE user_id = '$uid' ORDER BY requested_at DESC ");
                            if ($s) {
                                while ($row = mysqli_fetch_array($s)) {
                            ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $rows['name'] ?></td>
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
                        </tbody>
                    </table>
                </div>

                <?php include_once 'includes/footer.php' ?>
