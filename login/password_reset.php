<?php
include("data_connection.php");

$email = isset($_GET['email']) ? $_GET['email'] : null;

if (isset($_POST['sub_set'])) {
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    
    // Validate the new password and confirm password
    if ($newPassword != $confirmPassword) {
        $error[] = "Passwords do not match.";
    } else {
        // Update the password in the database using prepared statement
        $updateQuery = "UPDATE users SET password=? WHERE email=?";
        $stmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($stmt, "ss", $confirmPassword, $email);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Password updated successfully
            echo "<script>alert('Reset password successful.'); window.location.href='login.php';</script>";
            exit();
        } else {
            // Error occurred while updating password
            $errorMessage = "Error updating password.";
        }

        mysqli_stmt_close($stmt);
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
        .column {
        position: relative;
    }

        .togglePassword {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #7a7474;
        }

        /* Style for the eye icon */
        .togglePassword1 {
            position: absolute;
            top: 65px; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
            transform: translateY(-50%);
            cursor: pointer;
            color: #7a7474; /* Adjust the color as needed */
        }


    </style>
</head>

<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                                    <div class="column">
                                        <input maxlength="8" type="password" name="password" required placeholder="Create Password" id="signupPassword" />
                                        <i class="fas fa-eye togglePassword" data-target="signupPassword"></i>
                                    </div>
                                </div>


                                <span id="passwordError" class="error-message"></span>

                                <br>
                                <br>

                                <div class="column">
                                    <label class="label_txt">Confirm Password</label>
                                    <input maxlength="8" type="password" name="confirm_password" required placeholder="Confirm Password" />
                                    <i class="fas fa-eye togglePassword1" id="toggleConfirmPassword"></i>
                                </div>

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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePasswordButtons = document.querySelectorAll('.togglePassword');

        togglePasswordButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Get the target input ID from the data-target attribute
                const targetId = button.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);

                // Toggle the password input type between 'password' and 'text'
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle the eye icon class to change the icon
                button.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleConfirmPasswordButton = document.getElementById('toggleConfirmPassword');
        const confirmPasswordInput = document.querySelector('input[name="confirm_password"]');

        toggleConfirmPasswordButton.addEventListener('click', () => {
            // Toggle the password input type between 'password' and 'text'
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);

            // Toggle the eye icon class to change the icon
            toggleConfirmPasswordButton.classList.toggle('fa-eye-slash');
        });
    });
</script>
</body>

</html>
