<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $token = $_POST["token"];

    $sentToken = "123456"; // Replace with your logic to send a random token via email


    $subject = 'Email Verification Token';
    $message = "Your confirmation token is: $sentToken";
    $headers = 'From: your_email@gmail.com'; // Replace with your email address

    if (mail($email, $subject, $message, $headers)) {
        echo json_encode(["success" => true, "message" => "Email sent successfully. Check your inbox."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to send email. Check the server's mail configuration."]);
    }
} else {
    header("Location: test3.php");
}
?>
