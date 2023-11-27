<?php
session_start();
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    else {
        exit();
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'mail/Exception.php';
    require 'mail/PHPMailer.php';
    require 'mail/SMTP.php';
    
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'typicalpcstore@gmail.com'; // change this to your email                    // SMTP username
        $mail->Password   = 'mlcamvpreugupypo';  //change the password                             // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('typicalpcstore@gmail.com', 'Admin');

        $mail->addAddress($email);     // Add a recipient

        $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->Body    = 'To reset your password click <a href="http://localhost/typicalpcstore/newpassword.php?code='.$code.'">here </a>. </br>Reset your password in a day.';

        $conn = mysqli_connect('localhost', 'root', '', 'final');

        if($conn->connect_error) {
            die('Could not connect to the database.');
        }

        $verifyQuery = $conn->query("SELECT * FROM users WHERE email = '$email'");

        if($verifyQuery->num_rows) {
            $codeQuery = $conn->query("UPDATE users SET code = '$code' WHERE email = '$email'");
            
            if ($mail->send()){
                $_SESSION['CODE']=$code;
            echo 'Message has been sent, kindly check your email. The website will auto redirect to main page after 5 sec. ';

            ?>
            <script>
                setTimeout(function() {
                    window.location.href="index.php";
                }, 5000)
           
             </script>

            <?php
            }
            else{
                echo 'Message has been sent.';
            }
        }
        $conn->close();
    
    } catch (Exception $e) {
        echo "Message could not be sent.Can check or turn off your antivirus software. Mailer Error: {$mail->ErrorInfo}";
    }    
?>
