<?php

$db = mysqli_connect("localhost","root","Adbr4461","choresup");

// Check connection
   if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
      echo "Unsuccessful connection";
}
   else
//Display results
   echo "Connected successfully". "<br>";
?>