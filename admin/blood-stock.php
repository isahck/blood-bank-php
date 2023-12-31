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
                    <a href="#">
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
            <div class="stock" style="margin: 20px;"> 
                <div class="update-stock">
                    <h1 style="text-align: center;">Update Blood Stock</h1>
                    <style>
                        form select,input{
                            padding: 5px 8px;
                            outline: none;
                            border: 2px solid #333;
                            color: #333;
                        }
                        form input[type='submit']
                        {
                            background: #0000ff;
                            color: #fff;
                            border: 2px solid #0000ff;
                            padding: 5px 10px;
                        }
                    </style>
                    <form style="margin: 30px 300px;" method="post">
                        <select name="blood_group">
                            <option value="">SELECT</option>
                            <?php
                                $s = mysqli_query($conn, "SELECT * FROM `blood`");
                                while ($row = mysqli_fetch_array($s)) {
                                ?>
                                <option value="<?php echo $row['blood_group'];?>"><?php echo $row['blood_group'];?></option>
                            <?php } ?>
                        </select>
                        <input type="text" name="blood_quantity" placeholder="set amount">
                        <input type="submit" name="update" value="update">
                    </form>

                    <?php 
                      if (isset($_POST['update'])) {
                        $b = $_POST['blood_group'];
                        $q = $_POST['blood_quantity'];
                        $find = mysqli_query($conn, "SELECT * FROM `blood` WHERE blood_group = '$b'");
                        if (mysqli_num_rows($find) > 0) {
                        $h = mysqli_fetch_array($find);
                        $r = $h['blood_quantity'];
                        $nr = $r+$q;
                        $ins = mysqli_query($conn, "UPDATE `blood` SET blood_quantity = '$nr' WHERE blood_group = '$b'");
                        if ($ins) {
                            "<script>location.href='sender.php'</script>";
                        }else {
                            echo '';
                        }
                        }else{
                        echo ''; 
                        }
                        }
                    ?>


                    <?php 
                      if (isset($_POST['add'])) {
                        $b = $_POST['blood_group'];   
                        $isert = mysqli_query($conn,"INSERT INTO `blood` (blood_group,blood_quantity)
                        VALUES ('$b','')"); 
                        }
                    ?>
                    <div class="update-stock">
                    <h1 style="text-align: center;">Add Blood Stock</h1>
                    <form style="margin: 30px 300px;" method="post">
                        <input type="text" name="blood_group" placeholder="blood group">
                        <input type="submit" name="add" value="add stock">                 
                     </form>

                    
                </div>
                        
            </div>
            </div><br><br><br><br>
        
        <?php include_once 'includes/footer.php' ?>