<?php
session_start();
//Destroy session when logout button is clicked
session_destroy();
header("location:../login.php"); // redirects to viewbooking page
        exit;
?>