<?php include ("../connection_sql.php") ?>



<!DOCTYPE html>
<html>
    <head>
        <title>PayDay Payment</title>
        <link rel="stylesheet" href="epay_f.css">
        <style>
            #place
            {
                margin-left: 8px;
            }
        </style>
        
    </head>
    <body>

    <?php 
        session_start();

        // Check if the session variable is set
        if (isset($_SESSION['dataFromPage1']) && isset($_SESSION['data'] )) 
        {
            $total_price = $_SESSION['dataFromPage1'];
            $user = $_SESSION['data'];
    
        } 
            
        $uid = isset($_GET['userID']) ? $_GET['userID'] : null;
        
    ?>

        <header>         
            <div class="navbar" style="background-color:black;padding-bottom:30px;"> 
                <img src="../img/daypay logo.png" alt="No Image" >
                <ul style="margin-left:700px;">
                </ul>
            </div>
            
        </header>
        
        <div class="form_page">
            <div class="btn_anime">
                <div id="btn" ></div>
                <button type="button" class="LG_RE_btn"   style="color: rgb(255, 252, 255);">PayDay Payment</button>
            </div>
            

            <form id="paymentForm" class="input_group" method="POST" action="check_pin.php">
                <br><br><br><br>
                
                
                <input type="text" style="display: none;" class="input_place" name="user_id" id="user_id" value="<?php echo $user ?>" required>
                <input type="text" style="display: none;" class="input_place" name="price" id="price" value="<?php echo $total_price ?>" required>

                <input type="text" class="input_place" name="user_email" id="user_email" placeholder="Example@gmail.com" required oninput="validateEmail(this)">
                <div id="emailContainer" style="margin-top: 5px; margin-left: 38px;">
                    <span id="emailError" style="color: red;"></span>
                </div>

                <input type="password" class="input_place" name="user_password" id="user_password" placeholder="Password" required oninput="validatePassword(this)">
                <div id="passwordContainer" style="margin-top: 5px; margin-left: 38px;">
                    <span id="passwordError" style="color: red;"></span>
                </div>

                <input type="text" class="input_place" name="pin" id="pin" placeholder="6-digits pin" required maxlength="6" oninput="validatePin(this)">
                <div id="pinContainer" style="margin-top: 5px; margin-left: 38px;">
                    <span id="pinError" style="color: red;"></span>
                </div>

                <button type="submit" class="submit_btn" id="paymentButton">Payment</button>
            </form>
                    

        </div>

        <!-- java script for pass var to php -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../lib/wow/wow.min.js"></script>
        <script src="../lib/easing/easing.min.js"></script>
        <script src="../lib/waypoints/waypoints.min.js"></script>
        <script src="../lib/counterup/counterup.min.js"></script>
        <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../lib/tempusdominus/js/moment.min.js"></script>
        <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        
        <script>
            
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
