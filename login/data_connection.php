<?php
$host = "localhost";
$user = "root";
$pass = "";
$file = "yumyum";

// Create connection
$conn = mysqli_connect($host , $user , $pass , $file);

// Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }
?>