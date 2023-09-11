<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
    <style>
             .container {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 75vh; /* 设置整个容器高度为视口高度，垂直居中 */
        }

        .errmsg {
            color: red;
            margin-top: 10px;
        }

        .successmsg {
            color: green;
            margin-top: 10px;
        }

        .label_txt {
            font-weight: bold;
        }

        .form_btn {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            margin-top: 20px;
        }

        .form_btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="forgot_process.php" method="POST">
            <div class="login_form">
                <?php 
                if(isset($_GET['err'])){
                    $err=$_GET['err'];
                    echo '<p class="errmsg">No user found. </p>';
                } 

                if(isset($_GET['servererr'])){ 
                    echo "<p class='errmsg'>The server failed to send the message. Please try again later.</p>";
                }

                if(isset($_GET['somethingwrong'])){ 
                    echo '<p class="errmsg">Something went wrong.  </p>';
                }

                // If Success | Link sent 
                if(isset($_GET['sent'])){
                    echo "<div class='successmsg'>Reset link has been sent to your registered email id. Kindly check your email. It can take 2 to 3 minutes to deliver to your email id.</div>"; 
                }
                ?>

                <?php if(!isset($_GET['sent'])){ ?>
                <label class="label_txt">Enter your Email</label>
                <input type="text" name="login_var" value="<?php if(!empty($err)){ echo  $err; } ?>" class="form-control" required="">
                <button type="submit" name="subforgot" class="btn btn-primary btn-group-lg form_btn">Send Link</button>
                <?php } ?>
            </div>
        </form>
        <br> 
        <p>Have an account? <a href="login.php">Login</a></p>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p> 
    </div> 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
