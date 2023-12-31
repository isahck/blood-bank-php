        <?php
        session_start();
        include_once 'includes/validate.php'; 
        include_once 'includes/data.php'; 
        $msg = null;

        if (isset($_POST['add_blood'])) {
          $bid = uniqid("blood/");
          $uid = $_POST['user_id'];
          $b = $_POST['blood_group'];
          $q = $_POST['blood_quantity'];
          $d = $_POST['desease'];
         
         $a = mysqli_query($conn, "INSERT INTO `donate` (blood_id,user_id,blood_group,blood_quantity,desease)
                  VALUES ('$bid','$uid','$b','$q','$d')");
         if ($a) {
            $msg = "<script>
            swal.fire(
            'Added',
            'Blood Added successfully',
            'success'
            )
            </script>";

            $find = mysqli_query($conn, "SELECT * FROM `blood` WHERE blood_group = '$b'");
            if (mysqli_num_rows($find) > 0) {
              $h = mysqli_fetch_array($find);
              $r = $h['blood_quantity'];
              $nr = $r+$q;
              $ins = mysqli_query($conn, "UPDATE `blood` SET blood_quantity = '$nr' WHERE blood_group = '$b'");
            }else{
             echo ''; 
            }
          }
         }
         ?>
    <?php include_once 'includes/header.php' ?>

    <!-- ========================= Main ==================== -->
    <?php include_once 'includes/sidebar.php' ?>
 
    <?php include_once 'includes/topbar.php' ?>

          <!--============== Top Bar =================--> 
          <?php echo $msg; ?>
          <div class="reques">
            <div class="form">
              <form method="post">
              <h2>Donate Blood</h2>

              <div class="label-box">donator name</div>
              <div class="form-field">
                <input type="text" name="user_id" value="<?php echo $uid ?>" hidden>
                <input type="text" name="user_name" placeholder="Enter Donator Name" require>
              </div>

              <div class="label-box">quantity (bags)</div>
              <div class="form-field">
                <input type="number" name="blood_quantity" placeholder="Enter Quentity" require>
              </div>
              
              
              <div class="label-box">Enter Blood Group</div>
              <div class="form-field">
                <select name="blood_group" class="blood_po" require>
                <?php
                  $s = mysqli_query($conn, "SELECT * FROM `blood`");
                  while ($row = mysqli_fetch_array($s)) {
                  ?>
                  <option value="<?php echo $row['blood_group'];?>"><?php echo $row['blood_group'];?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="label-box">desease (if any)</div>
              <div class="form-field">
                <textarea name="desease" placeholder="Enter Your Desease (If Any)"></textarea>
              </div>

              <div class="send">
                <input type="submit" name="add_blood" value="Send">
              </div>
              </form>

            </div>
            <?php include_once 'includes/footer.php' ?>