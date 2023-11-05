<?php
           include("data_connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">   
    <link rel="stylesheet" href="login.css">
    <style>

        .right-panel-active .overlay-left {
            transform: translateX(-50%);
        }
    
        .right-panel-active .overlay-right {
            transform: translateX(0); 
        }
        
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
        <form action="register.php" method="post">
                <h1>Sign Up</h1>       
                <input type="text" name="name" placeholder="Name" />
                <input type="text" name="contact_number" placeholder="Contact Number" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Create Password " />
                <input type="password" name="confirm_password" placeholder="Comfirm Password " />
                <button id="signUpbutton" name="signUpbutton">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="signup.php" method="post">
                <h1>Sign in</h1>

                    <div class="password-container">
                        <input type="email" placeholder="Email" />
                        <input type="password" placeholder="Password" id="passwordInput" />
                        <i class="fas fa-eye" id="togglePassword" ></i></i>
                    </div>

                <div class="forgot-line">
                    <a href="forgot-password.php">Forgot your password?</a>
                </div>
                
                <button> Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay" ></div>
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>

<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    const passwordInput = document.getElementById('passwordInput');
    const togglePasswordButton = document.getElementById('togglePassword');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

        togglePasswordButton.addEventListener('click', () => {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);


            togglePasswordButton.classList.toggle("fa-eye");
            togglePasswordButton.classList.toggle("fa-eye-slash");
        });

    });


</script>