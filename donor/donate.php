<?php
      session_start();
      include_once 'includes/validate.php'; 
      include_once 'includes/data.php'; 
      $msg = null;
      if (isset($_POST['add_blood'])) {
        $u = $_POST['donor_id'];
        $b = $_POST['blood_group'];
        $q = $_POST['blood_quantity'];
        $d = $_POST['desease'];
        
        $a = mysqli_query($conn, "INSERT INTO `donate` (user_donator_name,blood_group,blood_quantity,desease)
                VALUES ('$u','$b','$q','$d')");
        if ($a) {
          $msg = "<script>
          swal.fire(
          'Added',
          'Blood Donated successfully',
          'success'
          )
          </script>";

          $find = mysqli_query($conn, "SELECT * FROM `blood` WHERE blood_group = '$b'");
          if (mysqli_num_rows($find) > 0) {
            $h = mysqli_fetch_array($find);
            $r = $h['blood_quantity'];
            $nr = $r+$q;
            $ins = mysqli_query($conn, "UPDATE `blood` SET blood_quantity = '$nr' WHERE blood_group = '$b'");
            // header("location:home.php");
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

              <div class="label-box">user name</div>
              <div class="form-field">
                  <input type="text" name="donor_id" value="<?php echo $dn ?>">
              </div>

              <div class="label-box">select blood group</div>
              <div class="form-field">
                <select name="blood_group" class="blood_po" require style="width: 100%">
                <option value="Select Blood Group">Select Group</option>
                <?php
                  $s = mysqli_query($conn, "SELECT * FROM `blood`");
                  while ($row = mysqli_fetch_array($s)) {
                  ?>
                  <option value="<?php echo $row['blood_group'];?>"><?php echo $row['blood_group'];?></option>
                  <?php } ?>
                </select>
              </div>


              <div class="label-box">quantity (bags)</div>
              <div class="form-field">
                <input type="number" name="blood_quantity" max-lenght="3" min-lenght="1" placeholder="Enter Quantity">
              </div>

              <div class="label-box">desease (if any)</div>
              <div class="form-field">
                <textarea name="desease" placeholder="Enter Your Desease (If Any)"></textarea>
              </div>

              <div class="send">
                <input type="submit" name="add_blood" value="Donate Blood">
              </div>
              </form>
              
            </div>
            <?php include_once 'includes/footer.php' ?>
