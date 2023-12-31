<?php
include_once 'php/config.php';
$msg = null;
if (isset($_POST['register'])) {
    $ui = uniqid('user/');
    $n = $_POST['name'];
    $e = $_POST['email'];
    $m = $_POST['mobile'];
    $b = $_POST['blood'];
    $a = $_POST['address'];
    $p = $_POST['password'];
    $photo = $_FILES['photo']['name'];
    $tmp_photo = $_FILES['photo']['tmp_name'];
    $local = "users/images/";
    move_uploaded_file($tmp_photo, $local.$photo);
    

    if (!empty($n) && !empty($e) &&!empty($m) &&!empty($b) &&!empty($p)) {
        $e_check = mysqli_query($conn,"SELECT * FROM `users` WHERE email = '$e' OR mobile = ' $m'");
        if (mysqli_num_rows($e_check) > 0) {
            $msg ="<script>
            swal.fire(
            'Sorry',
            'Email Or Number Already Exist',
            'warning'
            )
            return;
        </script>";
        }else{
            $i = mysqli_query($conn,"INSERT INTO `users`(user_id,name,email,mobile,blood,address,photo,password)
             VALUES ('$ui','$n','$e','$m','$b','$a','$photo','$p')");
            if ($i) {
            header("location:login.php");
                }else{
                    $msg = "<script>
                swal.fire(
                'Sorry',
                'Something Wrong',
                'warning'
                )
            </script>";
                }
        }
    }else{
        $msg = "<script>
            swal.fire(
            'Sorry',
            'All Fields Are Required',
            'warning'
            )
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sanrose hospital</title>
    
     <!-- ======= Favicon ====== -->
     <link rel="icon" href="imgs/logo.png">
     
    <!--=========== custome styles ===========-->
     
    <link rel="stylesheet" id="savedTheme" href="css/theme/default-theme.css">
    <link rel="stylesheet" href="css/style.css">

    <!--=============== fontawesome offline icons ===============-->
    <script src="icons/js/all.min.js"></script>

    <!--============= sweet alert =============-->
    <script type="text/javascript" src="js/sweet-alert/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="js/sweet-alert/sweetalert2.all.js"></script>
</head>
<body>
    <?php echo $msg ?>
    <select hidden id="theme-selector">
        <option value="select theme">select theme</option>
        <option value="default-theme">default</option>
        <option value="ngit-theme">ngit-theme</option>
        <option value="dark-theme">dark-theme</option>
    </select>
    <div class="box-login">
        <form action="" method="post" class="box-form" enctype="multipart/form-data">
            <h2>register here</h2>
            <div class="input-form">
                <input type="text" name="name" placeholder="Enter Your Name">
            </div>

            <div class="input-form">
                <input type="text" name="email" placeholder="Enter Your Email">
            </div>

            <div class="input-form">
                <input type="text" name="mobile" placeholder="Enter Your Mobile">
            </div>

            <div class="input-form">
                <select name="blood" class="blood_po" require style="width: 250px">
                <option value="Select Blood Group">Select Blood Group</option>
                <?php
                  $s = mysqli_query($conn, "SELECT * FROM `blood`");
                  while ($row = mysqli_fetch_array($s)) {
                  ?>
                  <option value="<?php echo $row['blood_group'];?>"><?php echo $row['blood_group'];?></option>
                  <?php } ?>
                </select>
              </div>

            <div class="input-form password-box">
                <input type="text" name="address" placeholder="Enter Your Address">
            </div>

            <div class="input-form password-box">
                <input type="file" name="photo" style="width: 250px">
            </div>

            <div class="input-form password-box">
                <input type="password" name="password" id="password-box" placeholder="Enter Your Password">
                <span class="password-toggler-btn" id="password-toggle">show</span>
            </div>

        

            <div class="send-form">
                <input type="submit" name="register" value="create">
            </div>

            <div class="links">
                <p>already have account <a class="create login-page-link" href="login.php">login</a></p>
            </div>
        </form>
    </div>

    <!--========== password toggle js link ==========-->
    <script src="js/password.js"></script>

    <!--========== theme selector js link ==========-->
	<script src="js/home-them.js"></script>
   
</body>
</html>
