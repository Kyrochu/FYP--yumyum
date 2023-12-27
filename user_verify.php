<?php
    session_start();

    // Check if the verification code is set in the session
    if (isset($_SESSION['verification_code'])) {
        $storedCode = $_SESSION['verification_code'];
        $storedTime = $_SESSION['verification_time'];

        // Check if the time limit (e.g., 10 minutes) has not expired
        if (time() - $storedTime <= 600) {
            // Verification code is still valid
            if (isset($_POST['entered_code'])) {
                $enteredCode = $_POST['entered_code'];

                // Check if the entered code matches the stored code
                if ($enteredCode === $storedCode) {
                    echo "Verification successful!";
                    
                    // Clear session data after successful verification
                    unset($_SESSION['verification_code']);
                    unset($_SESSION['verification_time']);
                } else {
                    echo "Invalid verification code.";
                }
            } else {
                echo "Please enter the verification code.";
            }
        } else {
            echo "Time limit for verification has expired.";
        }
    } else {
        echo "Verification code not found.";
    }
?>
