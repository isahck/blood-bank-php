<?php
include '../php/config.php';
if (empty($_SESSION['donor_id'])) {
    header("location: ../donor-login.php");
}
?>