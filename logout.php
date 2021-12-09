<?php
session_start();
//Destroy session
session_destroy();
header("location:login.php"); // redirects to login page
        exit;
?>