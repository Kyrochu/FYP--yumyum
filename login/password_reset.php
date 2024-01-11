<?php
include("data_connection.php");

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
                                <input type="password" name="password" placeholder=" " />
                                <span id="passwordError" class="error-message"></span>
                                <br>
                                <br>

                                <label class="label_txt">Confirm Password</label>
                                <input type="password" name="confirm_password" placeholder="" />
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

     <?php
        if (isset($_POST['sub_set'])) {
            $email = $_GET['email'] ?? null;
            $newPassword = $_POST['password'];
            $confirmPassword = $_POST['passwordConfirm'];
        
            // Validate the new password and confirm password
            if ($newPassword != $confirmPassword) {
                $error[] = "Passwords do not match.";
            } else {
        
                // Update the password in the database
                $updateQuery = "UPDATE users SET password='$confirmPassword ' WHERE email='$email'";
                mysqli_query($conn, $updateQuery);
        
                // Display success message
                $success = "Password reset successful. You can now <a href='login.php'>login</a> with your new password.";
                
            }
        }
     ?>

</body>
<script>
        const passwordInput = document.querySelector('input[name="password"]');
        const passwordError = document.getElementById('passwordError');
        const passwordRegex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*[0-9]).{0,8}$/;
        const maxLength = 8;

        passwordInput.addEventListener('input', function () {
            const password = this.value;

            if (password.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }

            if (password === '') {
                passwordError.textContent = '';
            } else if ((password.length <= maxLength) && passwordRegex.test(password)) {
                passwordError.textContent = '';
            } else {
                passwordError.textContent = 'Password should include at most 8 characters and contain at least 1 symbol and 1 number.';
            }
        });

        passwordInput.addEventListener('blur', function () {
            const password = this.value;
            if ((password === '') || (passwordRegex.test(password))) {
                passwordError.textContent = '';
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
