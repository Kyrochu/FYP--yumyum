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
                <span id="contactNumberError" class="error-message"></span>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Create Password " />
                <span id="passwordError" class="error-message"></span>
                <input type="password" name="confirm_password" placeholder="Comfirm Password " />
                <input type="text" name="address" placeholder="Address" />
                <input type="text" name="city" placeholder="City" />
                <input type="text" name="state" placeholder="State" />
                <input type="text" name="postcode" placeholder="Postcode" />

                <button id="signUpbutton" name="signUpbutton">Sign Up</button>
            </form>
        </div>          

        <div class="form-container sign-in-container">
            <form action="logindata.php" method="post">
                <h1>Sign in</h1>
                    <div class="password-container">
                        <input type="email" name="signinemail" id="signinemail" placeholder="Email"  />
                        <input type="password" name="signinpassword" id="signinpassword" placeholder="Password"  />
                        <i class="fas fa-eye" id="togglePassword" ></i></i>
                    </div>
                    <div class="forgot-line">
                        <a href="forgot_password.php">Forgot your password?</a>
                    </div>
                    
                    <button name="signIn" id="signIn"> Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay" ></div>
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="sign">Sign In</button>
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
    const signInButton = document.getElementById('sign');
    const container = document.getElementById('container');
    const signinpassword = document.getElementById('signinpassword');
    const togglePasswordButton = document.getElementById('togglePassword');


    const passwordRegex = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*[A-Z])(?=.*[0-9]).{8,}$/;
    const contactNumberInput = document.querySelector('input[name="contact_number"]');
    const contactNumberError = document.getElementById('contactNumberError');
    const contactNumberRegex = /^[0-9]+$/;

    contactNumberInput.addEventListener('input', function () {
        const contactNumber = this.value;
        if (contactNumber === '') {
            contactNumberError.textContent = '';
        } else if (!contactNumberRegex.test(contactNumber)) {
            contactNumberError.textContent = 'Contact number should contain numbers only.';
        } else {
            contactNumberError.textContent = '';
        }
    });
    

    const passwordInput = document.querySelector('input[name="password"]');
    const passwordError = document.getElementById('passwordError');
    const passwordRege = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*[0-9]).{0,8}$/;
    const maxLength = 8; 

    passwordInput.addEventListener('input', function () {
    const password = this.value;
    const maxLength = 8;
    const passwordError = document.getElementById('passwordError');
    const symbolRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;
    const numberRegex = /[0-9]/;

    if (password.length > maxLength) {
        this.value = this.value.slice(0, maxLength); 
    }

    if (password === '') {
        passwordError.textContent = '';
    } else if ((password.length <= 8) && symbolRegex.test(password) && numberRegex.test(password)) {
        passwordError.textContent = '';
    } else {
        passwordError.textContent = 'Password should include at most 8 characters and contain at least 1 symbol and 1 number.';
    }
    });

passwordInput.addEventListener('blur', function () {
    const password = this.value;
    const passwordError = document.getElementById('passwordError');

    if ((password === '') || (passwordRegex.test(password) && /(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*[0-9])/.test(password))) {
        passwordError.textContent = '';
    }
    });
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

        togglePasswordButton.addEventListener('click', () => {
            const type = signinpassword.getAttribute("type") === "password" ? "text" : "password";
            signinpassword.setAttribute("type", type);


            togglePasswordButton.classList.toggle("fa-eye");
            togglePasswordButton.classList.toggle("fa-eye-slash");
        });
        
        const signUpForm = document.querySelector('.sign-up-container form');
        signUpForm.addEventListener('submit', function (event) {
            
            const name = document.querySelector('input[name="name"]').value;
            const contactNumber = document.querySelector('input[name="contact_number"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;
            const address = document.querySelector('input[name="address"]').value;
            const city = document.querySelector('input[name="city"]').value;
            const state = document.querySelector('input[name="state"]').value;
            const postcode = document.querySelector('input[name="postcode"]').value;

            const fields = [name, contactNumber, email, password, confirmPassword, address, city, state, postcode];

            // Check if any field is empty
            const isEmpty = fields.some(field => field.trim() === '');

            if (isEmpty) {
                event.preventDefault(); // Prevent form submission
                alert('Please fill in all fields.');
            } else if (password !== confirmPassword) {
                event.preventDefault(); // Prevent form submission
                alert('Passwords do not match.');
            }
        });

        

    });


</script>