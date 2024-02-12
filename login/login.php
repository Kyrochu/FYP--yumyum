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
                <span id="nameError" ></span>     
                <input type="text" name="name" required placeholder="Name" />
                <span id="contactNumberFormat"></span>
                <span id="contactNumberError"></span>
                <input type="text" name="contact_number" required placeholder="Contact Number" />
                <input type="email" name="email" required placeholder="Example@gmail.com" />
                <div class="password-container1">
                    <input type="password" name="password" required placeholder="Create Password" id="signupPassword" />
                    <i class="fas fa-eye" id="togglePasswordSignUp"></i>
                </div>
                <span id="passwordError" class="error-message"></span>
                <input type="password" name="confirm_password" required placeholder="Comfirm Password " />
        

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
                    <h1>Hi Customer </h1>
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


    const contactNumberInput = document.querySelector('input[name="contact_number"]');
    const contactNumberError = document.getElementById('contactNumberError');
    const contactNumberFormat = document.getElementById('contactNumberFormat');
    const contactNumberRegex = /^[0-9\-]+$/; 

        contactNumberInput.addEventListener('input', function () {
        let contactNumber = this.value;

        
        contactNumberInput.addEventListener('input', function () {
        let contactNumber = this.value;

        
        contactNumber = contactNumber.replace(/[^\d\-]/g, '');
        contactNumber = contactNumber.replace(/[^\d\-]|-(?=[^-]*-)/g, '');

        if (contactNumber === '' || contactNumber === '-') {
            contactNumberError.textContent = 'Please enter a valid contact number.';
            contactNumberError.style.color = 'red';
            contactNumberError.style.fontSize = '14px'; 
            contactNumberError.style.marginLeft = '-70px'; // Adjust the value as needed
        } else {
            const formattedContactNumber = contactNumber.replace(/(\d{3})-?(\d+)/, '$1-$2');

            if (formattedContactNumber !== this.value) {
                // 如果格式不匹配，显示提示信息
                contactNumberError.textContent = 'Contact number should be in the format: xxx-xxxxxxx';
                contactNumberError.style.color = 'red';
                contactNumberError.style.fontSize = '12px'; 
            } else {
                // 格式匹配时清空错误信息
                contactNumberError.textContent = '';
                contactNumberError.style.color = '';
                contactNumberFormat.textContent = '';

            }
        }

        // 更新输入框的值
        this.value = contactNumber;
        });

});
        const nameInput = document.querySelector('input[name="name"]');
        const nameError = document.getElementById('nameError');

        nameInput.addEventListener('input', function () {
            let name = this.value.trim(); // Trim leading and trailing whitespaces

            // Check if the input contains only letters
            if (/^[a-zA-Z]+$/.test(name)) {
                if (name === '') {
                    nameError.textContent = 'Please enter a valid name.';
                    nameError.style.color = 'red';
                    nameError.style.fontSize = '14px'; 

                } else {
                    // Check if the first letter is uppercase
                    const firstLetter = name.charAt(0);
                    if (firstLetter !== firstLetter.toUpperCase()) {
                        nameError.textContent = 'First letter must be uppercase.';
                        nameError.style.fontSize = '14px'; 
                        nameError.style.color = 'red';
                        nameError.style.marginLeft = '-105px'; // Adjust the value as needed

                    } else {
                        // Clear the error message if the input is valid
                        nameError.textContent = '';
                        nameError.style.color = '';
                        nameError.style.marginLeft = ''; // Reset margin-left if needed
                    }
                }
            } else {
                nameError.textContent = 'Only character are allowed.';
                nameError.style.color = 'red';
                nameError.style.marginLeft = '-135px'; // Adjust the value as needed

            }
        });
    

    const passwordInput = document.querySelector('input[name="password"]');
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
        passwordError.style.marginLeft = '-15px';
        passwordError.style.color = 'red';

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

        const togglePasswordButtonSignUp = document.getElementById('togglePasswordSignUp');
        const signUpPassword = document.querySelector('input[name="password"]');

        togglePasswordButtonSignUp.addEventListener('click', () => {
            const type = signUpPassword.getAttribute("type") === "password" ? "text" : "password";
            signUpPassword.setAttribute("type", type);

            togglePasswordButtonSignUp.classList.toggle("fa-eye");
            togglePasswordButtonSignUp.classList.toggle("fa-eye-slash");
        });
        
        const signUpForm = document.querySelector('.sign-up-container form');
        signUpForm.addEventListener('submit', function (event) {
            
            const name = document.querySelector('input[name="name"]').value;
            const contactNumber = document.querySelector('input[name="contact_number"]').value;
            const email = document.querySelector('input[name="email"]').value;
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;
           

            const fields = [name, contactNumber, email, password, confirmPassword];

            // Check if any field is empty
            const isEmpty = fields.some(field => field.trim() === '');

            if (password !== confirmPassword) {
                event.preventDefault(); // Prevent form submission
                alert('Passwords do not match.');
            }
        });

        

    });


</script>