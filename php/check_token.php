<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $email = $_POST["email"];
    $token = $_POST["token"];

    // Implement your email sending logic here
    $sentToken = "123456"; // Replace with your logic to send a random token via email

    if ($token === $sentToken) {
        echo json_encode(["success" => true, "message" => "Token is valid. You can proceed."]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid token. Please try again."]);
    }
} else {
    header("Location: index.html");
}
?>
