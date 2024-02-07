<?php include ("../connection_sql.php") ?>



<!DOCTYPE html>
<html>
    <head>
        <title>LogIn</title>
        <link rel="stylesheet" href="../css/elog.css">
        <style>
            #place
            {
                margin-left: 8px;
            }
          
        </style>
        
    </head>
    <body>
        <header> 
    
        
            <!-- <h1 class="Welcome" style="background-color:dimgrey;"> <span class="W">W</span>elcome to <span class="F">F</span>antastos <span class="H">H</span>otel </h1> -->
        
                <div class="navbar" style="background-color:black;padding-bottom:30px;"> 
                    
                    <img src="../img/daypay logo.png" alt="No Image" >
                    
                </div>
        
        </header>

        
        <div class="form_page">
            <div class="btn_anime">
                <div id="btn" ></div>
                <button type="button" class="LG_RE_btn"  onclick="login()" style="color: rgb(255, 252, 255);">Log In</button>
                <button type="button" class="LG_RE_btn" id="place" onclick="register()" style="color: rgb(255, 252, 255);">Register</button>
            </div>
            
            <!-- log side -->
            <form id="log" class="input_group" action="loginphp.php" method="POST" >
                <br><br><br><br><br>    
                <input type="text" class="input_place" name="user_email" placeholder="Example@gmail.com" required oninput="lvalidateEmail(this)">
                <div id="container" style="margin-top: 5px;">
                    <span id="lemailError" style="color: red; margin-left:38px;"></span>
                </div>
                <br><br>
                <input type="password" class="input_place" name="user_password" placeholder="Password" required oninput="lvalidatePassword(this)">
                <div id="container" style="margin-top: 5px;">
                    <span id="lpasswordError" style="color: red; margin-left:38px;"></span>
                </div>
                <br>
                <a href="" class="forget">Forget Password</a>
                <br><br>
                <button type="submit" class="submit_btn" name="logbtn" style="color: rgb(255, 252, 255);">Log in</button>
            </form>

            

            <!-- register side -->
            <form id="reg" class="input_group" action="e_register.php" method="POST"> 
                <input type="text" class="input_place" name="name" placeholder="Name" required oninput="validateName(this)" >
                <div id="container" style="margin-top: 5px;">
                    <span id="nameError" style="color: red;"></span>
                </div>

                <input type="text" class="input_place" name="contact" placeholder="Contact Number " required oninput="validateContact(this)">
                <div id="container" style="margin-top: 5px;">
                    <span id="contactError" style="color: red;"></span>
                </div>

                <input type="email" class="input_place" name="email" placeholder="Example@gmail.com" required oninput="validateEmail(this)">
                <div id="container" style="margin-top: 5px;">
                    <span id="emailError" style="color: red;"></span>
                </div>

                <input type="password" class="input_place" name="new_password" placeholder="Create Password" required oninput="validatePassword(this)">
                <div id="container" style="margin-top: 5px;">
                    <span id="passwordError" style="color: red;"></span>
                </div>

                <input type="password" class="input_place" name="com_password" placeholder="Confirm Password" required oninput="validatePasswordMatch(this)">
                <div id="container" style="margin-top: 5px;">
                    <span id="passwordMatchError" style="color: red;"></span>
                </div>

                <input type="text" class="input_place" name="pin" placeholder="6-digit pin" required maxlength="6" oninput="validatePin(this)">
                <div id="container" style="margin-top: 5px;">
                    <span id="pinError" style="color: red;"></span>
                </div>

                <button type="submit" class="submit_btn" name="regbtn" style="color: rgb(255, 252, 255);">Register</button>
                
            </form>
        </div>

        
        <script>

            function validateName(input) {
                var regex = /^[a-zA-Z ]*$/;
                var errorElement = document.getElementById('nameError');
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (!regex.test(input.value)) {
                    errorElement.textContent = 'Only alphabets and spaces.';
                } else {
                    errorElement.textContent = '';
                }
            }

            function validateContact(input) {
                // Regular expression to match the desired format
                var regex = /^(01\d)\s?\d{4}\s?\d{3,4}$/;

                // Format the input value to match the desired format
                var formattedValue = input.value.replace(/\D/g, ''); // Remove non-digit characters
                if (formattedValue.length > 3) {
                    formattedValue = formattedValue.substring(0, 3) + ' ' + formattedValue.substring(3);
                }
                if (formattedValue.length > 8) {
                    formattedValue = formattedValue.substring(0, 8) + ' ' + formattedValue.substring(8);
                }
                if (formattedValue.length > 13) {
                    formattedValue = formattedValue.substring(0, 13); // Limit to 11 digits
                }
                
                // Update the input value to the formatted version
                input.value = formattedValue.trim();
                
                // Get the error element
                var errorElement = document.getElementById('contactError');

                // Check if the input is empty or matches the regular expression
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (!regex.test(input.value)) {
                    errorElement.textContent = 'Please enter a valid contact.';
                } else {
                    errorElement.textContent = '';
                }
            }   

            function validateEmail(input) {
                var regex = /^[a-zA-Z0-9._%+-]+@(gmail|hotmail)\.com$/;
                var errorElement = document.getElementById('emailError');
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (!regex.test(input.value)) {
                    errorElement.textContent = ' Only Gmail or Hotmail valid.';
                } else {
                    errorElement.textContent = '';
                }
            }

            function lvalidateEmail(input) {
                var regex = /^[a-zA-Z0-9._%+-]+@(gmail|hotmail)\.com$/;
                var errorElement = document.getElementById('lemailError');
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (!regex.test(input.value)) {
                    errorElement.textContent = 'Invalid email.';
                } else {
                    errorElement.textContent = '';
                }
            }

            function validatePassword(input) {
                var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
                var errorElement = document.getElementById('passwordError');
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (!regex.test(input.value)) {
                    errorElement.textContent = 'Password must contain at least 8 characters, one number, one uppercase letter, and one symbol.';
                } else {
                    errorElement.textContent = '';
                }
            }

            function validatePasswordMatch(input) {
                var password = document.querySelector('input[name="new_password"]').value;
                var errorElement = document.getElementById('passwordMatchError');
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (input.value !== password) {
                    errorElement.textContent = 'Passwords do not match.';
                } else {
                    errorElement.textContent = '';
                }
            }

            function lvalidatePassword(input) {
                var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
                var errorElement = document.getElementById('lpasswordError');
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (!regex.test(input.value)) {
                    errorElement.textContent = 'Password must contain at least 8 characters, one number, one uppercase letter, and one symbol.';
                } else {
                    errorElement.textContent = '';
                }
            }

            function validatePin(input) {
                var pin = input.value;
                var errorElement = document.getElementById('pinError');

                // Remove non-numeric characters from input
                pin = pin.replace(/\D/g, '');

                if (pin.length > 6) {
                    // Trim the pin to 6 characters
                    pin = pin.slice(0, 6);
                }

                // Update the input value
                input.value = pin;

                if (pin.length < 6) {
                    errorElement.textContent = 'Pin must be exactly 6 digits.';
                } else {
                    errorElement.textContent = '';
                }
            }

            var x = document.getElementById("log");
            var y = document.getElementById("reg");
            var z = document.getElementById("btn");


            function login()
            {
                x.style.left = "50px";
                y.style.left = "650px";
                z.style.left = "0px";
            }

            function register()
            {
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            } 
    
        </script>

    </body>
</html>
