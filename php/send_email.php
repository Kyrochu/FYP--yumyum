<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'localhost/FYP--yumyum/php/PHPMailer/src/Exception.php';
    require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'path/to/PHPMailer/src/SMTP.php';
    

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.example.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "you@example.com";
    $mail->Password = "password";

    $mail->setFrom($email, $name);
    $mail->addAddress("dave@example.com", "Dave");

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    echo "done";

?>