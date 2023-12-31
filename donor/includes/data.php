<?php
$sql = mysqli_query($conn, "SELECT * FROM `donator` WHERE donor_email='".$_SESSION['donor_id']."'");
$row = mysqli_fetch_array($sql);
$uid = $row['donor_id'];
$dn = $row['donor_name'];
$de = $row['donor_email'];
$mobile = $row['donor_mobile'];
$db = $row['blood_group'];
$dp = $row['password'];
$dphoto = $row['photo'];
$dr = $row['created_at'];


?>