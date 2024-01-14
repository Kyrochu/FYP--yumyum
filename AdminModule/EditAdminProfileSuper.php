<?php

include('DataConnect.php');

$id = isset($_GET['id']) ? $_GET['id'] : NULL;

if (isset($_GET["edit-submit-btn"])) {
    // Assuming you have an email field in your form
    $a_email = $_GET["email"];
    $a_name = $_GET["name"];
    $c_pass = $_GET["newPassword"];

    // Validate and sanitize input data
    // Example: $a_name = mysqli_real_escape_string($connect, $a_name);

    // Hash the password
    $hashed_password = password_hash($c_pass, PASSWORD_DEFAULT);

    // Ensure to check and sanitize all input data before using it in SQL queries
    $update = "UPDATE admin_acc SET name ='$a_name', password ='$hashed_password' WHERE id ='$id'";
    mysqli_query($connect, $update);

    // Redirect after the update
    header("Location: AdminProfileSuper.php?id=$id");
    exit();
}

?>
