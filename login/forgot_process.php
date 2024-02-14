<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("data_connection.php");

$dbc = mysqli_connect("localhost", "root", "", "yumyum");

if (isset($_POST["email"])) {
    // Sanitize the email input to prevent SQL injection
    $email = isset($_POST["email"]) ? $_POST["email"] : "";

    // Query to check if the email exists in the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($dbc, $query);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        
        // Email exists in the database
        try {
            $mail = new PHPMailer(true);

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

            $token = bin2hex(random_bytes(3)); // Generating token
            $mail->Subject = 'You have received a password reset email';
            $mail->Body = "Your verify code is $token
                            Your password reset link: <a href='localhost/FYP--yumyum/login/password_reset.php?email=$email'>Reset Link</a>";

            $mail->send();

            $update_code = "UPDATE users SET code = '$token' WHERE email = '$email'";
            mysqli_query($conn, $update_code);

            header("Location: forgot_password.php?success=1");
            exit();
        } catch (Exception $e) {
            header("Location: forgot_password.php?error=1");

            exit();
        }

    } else {
        // Email does not exist in the database
        echo '<script>alert("Email not found");</script>';
        echo '<script>window.location.href = `forgot_password.php`;</script>';
        
    }
} else {
    // Email parameter not set in the POST request
    echo 'error';
}

// Close database connection
mysqli_close($dbc);
?>
