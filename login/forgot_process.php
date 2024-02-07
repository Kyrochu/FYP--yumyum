<?php
           include("data_connection.php");

$dbc = mysqli_connect("localhost", "root", "", "yumyum");
$email = isset($_POST["email"]) ? $_POST["email"] : "";
do {
    $token = bin2hex(random_bytes(3));
} while (ctype_alpha($token[0]));


require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php'; 
    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yumyumdeliveryfood@gmail.com'; // Replace with your Gmail email
        $mail->Password = 'jlkvsykvhhjejzcd'; // Replace with your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('yumyumdeliveryfood@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = 'You have received a password reset email';
        $mail->Body = "Your verify code is $token
                        Your password reset link: <a href='localhost/FYP--yumyum/login/password_reset.php?email=$email'>Reset Link</a>";

        $mail->send();

        $mail->smtpClose();

        $update_code = "UPDATE users SET code = '$token'WHERE email = '$email'";
        mysqli_query($conn,$update_code);


        header("Location: forgot_password.php?success=1");
        exit();
    } catch (Exception $e) {
        header("Location: forgot_password.php?servererr=1");
        exit();
    }

?>
