<?php
include_once '../php/config.php';
$msg = null;
if (isset($_POST['login'])) {
    $e = $_POST['email'];
    $l = mysqli_query($conn,"SELECT * FROM `users` WHERE email = '$e'");
    $c = mysqli_fetch_array($l);
    if (mysqli_num_rows($l) > 0) {
       header("location:reset-password.php?email='$e'");
    }else{
       $msg = "<script>
              swal.fire(
            'failed',
            'incorect email',
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
    <title>Dashboard</title>

    <!-- theme css -->
    <link rel="stylesheet" id="savedTheme" href="../css/theme/default-theme.css">

    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- ======= Favicon ====== -->
    <link rel="icon" href="../imgs/logo.png">

    <!-- font awesome offline icons -->
    <script src="../icons/js/all.js"></script>

    <!-- sweet alert  -->
    <script type="text/javascript" src="../js/sweet-alert/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="../js/sweet-alert/sweetalert2.all.js"></script>
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
        <form action="" method="post" class="box-form">
            <h2>Forget Password</h2>
            <div class="input-form">
                <input type="text" name="email" placeholder="Enter Your Email">
            </div>


            <div class="send-form">
                <input type="submit" name="login" value="login">
            </div>

        </form>
    </div>
    
   <!-- =========== Scripts =========  -->
   <script src="../js/main.js"></script>
    <!-- theme js files -->
    <script src="../js/theme.js"></script>
</body>
</html>