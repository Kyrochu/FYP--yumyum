<?php

include("DataConnect.php");

$_SESSION = [];
session_unset();    // Remove all session variables(session data) without deleting
session_destroy();   // Delete session data 
header("location:AdminLogin.php"); // Redirect to this page

?>