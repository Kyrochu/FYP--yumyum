<?php

include('DataConnect.php');

$id = isset($_GET['id'])?$_GET['id']:NULL;

if (isset($_GET["edit-submit-btn"])) {
    $a_name = $_GET["name"];
    $c_pass = $_GET["newPassword"];

    // Assuming you have an email field in your form
    // $a_email = $_GET["email"];

    // Make sure to validate, hash the password, and prevent SQL injection
    // For simplicity, let's assume you are using a function like password_hash
    // to hash the password before updating it in the database

    // Example:
    // $hashed_password = password_hash($c_pass, PASSWORD_DEFAULT);

    // Ensure to check and sanitize all input data before using it in SQL queries

    $update = "UPDATE admin_acc SET name ='$a_name', password ='$c_pass' WHERE id ='$id'";
    mysqli_query($connect, $update);

    // You may want to add a redirect after the update
    header("Location: EditAdminProfileSuper.php?id=$id");
    exit();
}

?>