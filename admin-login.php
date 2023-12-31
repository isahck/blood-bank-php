<?php
session_start();
include_once 'php/config.php';
$msg = null;
if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $l = mysqli_query($conn,"SELECT * FROM `admin` WHERE username = '$u' AND password = '$p'");
    $c = mysqli_fetch_array($l);
    if (mysqli_num_rows($l) > 0) {
        $_SESSION['username'] = $u;
        header('location:admin/home.php');
    }else{
       $msg = "<script>
              swal.fire(
            'failed',
            'incorect username or passwod',
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
    <script type="text/javascript" src="javascript/sweet-alert/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="javascript/sweet-alert/sweetalert2.all.js"></script>
</head>
<body>
    <?php echo $msg ?>
    <select hidden id="theme-selector">
        <option value="select theme">select theme</option>
        <option value="default-theme">Default Theme</option>
        <option value="ngit-theme">Ngit Theme</option>
        <option value="isahck-theme">Isahck theme</option>
        <option value="dark-theme">Dark Theme</option>
    </select>
    <div class="box-login">
        <form method="post" class="box-form">
            <h2>admin login</h2>
            <div class="input-form">
                <input type="text" name="username" placeholder="Enter Your Username">
            </div>

            <div class="input-form">
                <input type="password" name="password" id="password-box" placeholder="Enter Your Password">
                <span class="password-toggler-btn" id="password-toggle">show</span>
            </div>

            <div class="send-form">
                <input type="submit" name="login" value="login">
            </div>

        </form>
    </div>
    

    <!--========== password toggle js link ==========-->
    <script src="js/password.js"></script>

    <!--========== theme selector js link ==========-->
	<script src="js/home-them.js"></script>
</body>
</html>