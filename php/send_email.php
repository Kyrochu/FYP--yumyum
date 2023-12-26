<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer(true);

    // Uncomment the next line for debugging information
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    // Replace "smtp.example.com" with the actual hostname of your SMTP server
    $mail->Host = "smtp.gmail.com";

    // Use ENCRYPTION_STARTTLS for port 587 or ENCRYPTION_SMTPS for port 465
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Replace with your SMTP username and password
    $mail->Username = "kroyk32@gmail.com";
    $mail->Password = "kyro0308";

    $mail->setFrom($email, $name);
    $mail->addAddress("dave@example.com", "Dave");

    $mail->Subject = $subject;
    $mail->Body = $message;

    try {
        $mail->send();
        echo "Email sent successfully";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
