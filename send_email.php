<?php
    session_start();

    $name = isset($_POST["f_name"]) ? $_POST["f_name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    do {
        $token = bin2hex(random_bytes(3));
    } while (ctype_alpha($token[0]));

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

        $mail->Subject = ("Verify Token");
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

