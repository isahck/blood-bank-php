<?php
    require_once '../php/config.php';
    $i = $_GET['request_id'];
    $sql = mysqli_query($conn, "DELETE FROM `request` WHERE request_id = '$i'");
    header('location:myrequest.php');      
?>