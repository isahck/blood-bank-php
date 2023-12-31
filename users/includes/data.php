<?php
$sql = mysqli_query($conn, "SELECT * FROM `users` WHERE email='".$_SESSION['user_id']."'");
$row = mysqli_fetch_array($sql);
$uid = $row['user_id'];
$n = $row['name'];
$e = $row['email'];
$m = $row['mobile'];
$b = $row['blood'];
$a = $row['address'];
$photo = $row['photo'];
$p = $row['password'];
$r = $row['created_at'];


?>