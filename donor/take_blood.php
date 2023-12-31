<?php
    session_start();
    include_once 'includes/validate.php'; 
    include_once 'includes/data.php'; 
    $get_id = $_GET['id'];
    $fs = mysqli_query($conn, "SELECT * FROM `blood` WHERE id = '$get_id'");
    $ro = mysqli_fetch_array($fs);
    $msg = null;

    if (isset($_POST['request_blood'])) {
        $bid = uniqid("request/");
        $uid = $_POST['user_id'];
        $b = $_POST['blood_group'];
        $q = $_POST['blood_quantity'];
        $d = $_POST['blood_id'];
        $r = $_POST['reson'];
        $s = "pending";


        $find = mysqli_query($conn, "SELECT * FROM `blood` WHERE id ='$get_id'");
        $h = mysqli_fetch_array($find);
        $get_quant = $h['blood_quantity'];
        if ($q > $get_quant) {
          $msg = "<script>
              swal.fire(
              'Failed',
              'Sorry Our Blood Quantity Is Low <br /> Try Again',
              'warning'
              )   
              </script>";
        }else{
          $a = mysqli_query($conn, "INSERT INTO `request` (request_id,donor_id,blood_group,blood_quantity,blood_id,reson,status)
                VALUES ('$bid','$uid','$b','$q','$d','$r','$s')");
                 header('location:home.php?message=""');
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
              <h2>Request Blood</h2>

              <div class="label-box">Blood Selected</div>
              <div class="form-field">
                <input type="text" name="user_id" hidden value="<?php echo $uid; ?>" required>
                <input type="text" name="blood_id" hidden  value="<?php echo $ro['id']; ?>">
                <input type="text" name="blood_group" readonly  value='<?php echo $ro['blood_group']; ?>'>
              </div>

              <div class="label-box">your name</div>
              <div class="form-field">
                <input type="text" readonly name="user_name" value="<?php echo $dn; ?>" required>
              </div>

              <div class="label-box">quantity (bags)</div>
              <div class="form-field">
                <input type="number" name="blood_quantity" placeholder="Enter Quentity" required>
              </div>

              <div class="label-box">Reson (supecify)</div>
              <div class="form-field">
                <input type="text" name="reson" placeholder="Reson" required>
              </div>

              <div class="send">
                <input type="submit" name="request_blood" value="Send Request">
              </div>
              </form>

            </div>
            <?php include_once 'includes/footer.php' ?>
