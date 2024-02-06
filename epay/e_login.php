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
                <input type="text" class="input_place" name="user_email" placeholder="User Email" required>
                
                <input type="password" class="input_place" name="user_password" placeholder="Password" required>

                <button type="submit" class="submit_btn" name="logbtn" style="color: rgb(255, 252, 255);">Log in</button>
            </form>

            

            <!-- register side -->
            <form id="reg" class="input_group" action="e_register.php" method="POST">
                <input type="text" class="input_place" name="name" placeholder="Name" required >
                <input type="text" class="input_place" name="contact" placeholder="Contact Number " required >
                <input type="email" class="input_place" name="email" placeholder="Email" required >
                <input type="password" class="input_place" name="new_password" placeholder="Create Password" required>
                <input type="password" class="input_place" name="com_password" placeholder="Comfirm Password" required>
                <input type="text" class="input_place" name="pin" placeholder="6-digit pin" required maxlength="6" oninput="validatePin(this)">
                <div id="pinError" style="color: red;"></div>

                <button type="submit" class="submit_btn" name="regbtn" style="color: rgb(255, 252, 255);">Register</button>
                
            </form>
        </div>

        
        <script>

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
                y.style.left = "450px";
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
