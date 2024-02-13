<?php
include("data_connection.php");

$email = isset($_GET['email']) ? $_GET['email'] : null;

if (isset($_POST['sub_set'])) {
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    
    // Validate the new password and confirm password
    if ($newPassword != $confirmPassword) {
        $error[] = "";
    } else {
        // Update the password in the database using prepared statement
        $updateQuery = "UPDATE users SET password=? WHERE email=?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ss", $confirmPassword, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        // Set a success flag to be submitted with the form
        $successFlag = true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Password Reset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>

        input {
            background-color: #eee;
            border: none;
            padding: 12px 8px;
            margin: 8px 0;
            width: 100%;
        }
        .error-message{

            color: red;

        }
    </style>
</head>

<body>
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="login_form ">
                    <form action="" method="POST">
                        <div class="form-group">
                            <?php
                            if (isset($error)) {
                                foreach ($error as $err) {
                                    echo '<div class="errmsg">' . $err . '</div><br>';
                                }
                            }
                            if (isset($errorMsg)) {
                                echo '<div class="errmsg">' . $errorMsg . '</div><br>';
                            }
                            if (isset($success)) {
                                echo $success;
                            }
                            ?>
                            <!-- Form fields for password reset -->
                            <?php if (!isset($hide)) { ?>
                                <label class="label_txt">New Password</label>
                                <div class="password-container1">
                                    <input type="password" name="password" required placeholder="Create Password" id="signupPassword" />
                                    <i class="fas fa-eye" id="togglePasswordSignUp" onclick="togglePasswordVisibility('signupPassword')"></i>
                                </div>

                                <span id="passwordError" class="error-message"></span>

                                <br>
                                <br>

                                <label class="label_txt">Confirm Password</label>
                                <input type="password" name="confirm_password" required placeholder="Confirm Password" />
                                <br>
                                <button type="submit" name="sub_set" class="btn btn-primary btn-group-lg form_btn">Reset Password</button>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>

</body>
<script>
    function displayAlert(message) {
        alert(message);
    }

    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="confirm_password"]');
    const passwordError = document.getElementById('passwordError');
    const passwordRegex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*[0-9]).{0,8}$/; // Password regex for validation
    const maxLength = 8; // Maximum length of password

    // Function to handle input event for password field
    passwordInput.addEventListener('input', function () {
        const password = this.value;

        // Limit the password length to maxLength characters
        if (password.length > maxLength) {
            this.value = this.value.slice(0, maxLength);
        }

        // Validate password using regex
        if (password === '') {
            passwordError.textContent = ''; // Clear error message if password is empty
        } else if ((password.length <= maxLength) && passwordRegex.test(password)) {
            passwordError.textContent = ''; // Clear error message if password matches regex
        } else {
            passwordError.textContent = 'Password should include at most 8 characters and contain at least 1 symbol and 1 number.';
        }
    });

    // Function to handle blur event for confirm password field
    confirmPasswordInput.addEventListener('blur', function () {
        const confirmPassword = this.value;

        // Limit the confirm password length to maxLength characters
        if (confirmPassword.length > maxLength) {
            this.value = this.value.slice(0, maxLength);
        }

        // Check if passwords match and display alert if they don't
        if (passwordInput.value !== confirmPassword) {
            displayAlert("Passwords do not match.");
        }
    });
    
</script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
