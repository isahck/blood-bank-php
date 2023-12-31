<?php
    require_once '../php/config.php';
    $i = $_GET['id'];
    $sql = mysqli_query($conn, "DELETE FROM `donate` WHERE id = '$i'");
    header('location:donation.php');      
?>