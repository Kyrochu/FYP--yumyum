<!DOCTYPE html>
<?php
     include("data_connection.php");
if (isset($_SESSION["login_sess"])) {
    header("location:account.php");
}
?>
<?php

if (isset($_POST['sub_set'])) {
    extract($_POST);

    $token = isset($_GET['token']) ? $_GET['token'] : '';

    if ($password !== $passwordConfirm) {
        $error[] = "Passwords don't match. Please re-enter.";
    } else {
        $query = "SELECT email FROM password_reset_tokens WHERE token = '$token'";
        $result = mysqli_query($dbc, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userEmail = $row['email'];
        }
    }
}
?>

<html>

<head>
    <title>Password Reset - Techno Smarter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

</style>

<body>
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <?php
                $token = '';

                if (isset($_GET['token'])) {
                    $token = $_GET['token'];
                }

                if (isset($_POST['sub_set'])) {
                    extract($_POST);


                    if (!isset($error) && !isset($hide)) {

                        $success = "<div class='successmsg'><span style='font-size:100px;'>&#9989;</span> <br> Your password has been updated successfully.. <br> <a href='login.php' style='color:#fff;'>Login here... </a> </div>";

                        $deleteQuery = "DELETE FROM password_reset_tokens WHERE token = '$token'";
                        $resultdel = mysqli_query($dbc, $deleteQuery);
                        $hide = 1;
                    }
                }
                ?>
                <div class="login_form ">
                    <form action="" method="POST">
                        <div class="form-group">
                            <img src="Image/KXL_Store-black.png" class="logo img-fluid">
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
                                <input type="password" name="password" class="form-control" required>
                                <!-- Add Confirm Password field -->
                                <label class="label_txt">Confirm Password</label>
                                <input type="password" name="passwordConfirm" class="form-control" required>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>