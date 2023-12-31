<?php
  include '../php/config.php';
  $accept_id = $_GET['request_id'];
  $bi = $_GET['blood_id'];
  $b = $_GET['blood_quantity'];

  $find = mysqli_query($conn, "SELECT * FROM request WHERE request_id = '$accept_id'");
  $ins = mysqli_query($conn, "UPDATE `request` SET status = 'Approved' WHERE request_id = '$accept_id'");

  $find_blood = mysqli_query($conn,"SELECT * FROM `blood` WHERE id = '$bi'"); 
  if (mysqli_num_rows($find_blood) > 0) {
    $row1 = mysqli_fetch_array($find_blood);
    $find_bg = $row1['blood_group'];
  }

  $edit = mysqli_query($conn, "SELECT * FROM `blood` WHERE blood_group = '$find_bg'");
  $row = mysqli_fetch_array($edit);
  $r = $row['blood_quantity'];

  $set = $r-$b;
  $ins = mysqli_query($conn, "UPDATE `blood` SET blood_quantity = '$set' WHERE blood_group = '$find_bg'");
  header("location:blood-request.php");

?>