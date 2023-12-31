<?php
$sql = mysqli_query($conn, "SELECT * FROM `admin` WHERE username='".$_SESSION['username']."'");
$row = mysqli_fetch_array($sql);
$u = $row['username'];
$p = $row['password'];


?>