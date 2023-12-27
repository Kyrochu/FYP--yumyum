<?php
session_start();

$name = isset($_POST["name"]) ? $_POST["name"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
$message = isset($_POST["message"]) ? $_POST["message"] : "";
$token = bin2hex(random_bytes(3));

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/PHPMailer.php'; 
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

// Uncomment the next line for debugging information
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
try {
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "yumyum0cbj@gmail.com";
    $mail->Password = "hsrsqgxvvbkfttup";

    $mail->setFrom('yumyum0cbj@gmail.com');
    $mail->addAddress($email);
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body = $token;

    // Send the email
    $mail->send();

    // Store verification code and time in the session
    $_SESSION['verification_code'] = $token;
    $_SESSION['verification_time'] = time();


} catch (Exception $e) {
    error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    echo "Message could not be sent. Please try again later.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Contact</h1>
    
    <form method="post" action="user_verify.php">
        <label for="entered_code">Verification Code</label>
        <input type="text" name="entered_code" id="entered_code" required>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
