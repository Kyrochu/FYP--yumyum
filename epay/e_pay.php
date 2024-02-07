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
                    <li> <a href="e_login.php" target="_blank">Sign Up</a></li>
                </ul>
            </div>
            
        </header>
        
        <div class="form_page">
            <div class="btn_anime">
                <div id="btn" ></div>
                <button type="button" class="LG_RE_btn"   style="color: rgb(255, 252, 255);">PayDay Payment</button>
            </div>
            

            <form id="paymentForm" class="input_group" method="POST">
                <br><br><br><br>
                
                
                <input type="text" style="display: none;" class="input_place" name="user_id" id="user_id" value="<?php echo $user ?>" required>
                <input type="text" style="display: none;" class="input_place" name="price" id="price" value="<?php echo $total_price ?>" required>

                <input type="text" class="input_place" name="user_email" id="user_email" placeholder="User Email" required>
                <input type="password" class="input_place" name="user_password" id="user_password" placeholder="Password" required>
                <input type="text" class="input_place" name="pin" id="pin" placeholder="6-digit pin" required maxlength="6">
                <div id="pinError" style="color: red;"></div>
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
           $(document).ready(function() {
                $("#paymentButton").click(function() {
                    var userEmail = $("#user_email").val();
                    var userPassword = $("#user_password").val();
                    var pin = $("#pin").val();
                    var total_price = $("#price").val(); // Include PHP variable
                    var uid = $("#user_id").val(); // Include PHP variable
                    var url = "../log_index.php?userID=" + uid;

                    // Collect form data for check_pin.php
                    var formDataCheckPin = {
                        user_email: userEmail,
                        user_password: userPassword,
                        pin: pin,
                        price: total_price, 
                        user_id: uid 
                    };

                    // Send AJAX request to check_pin.php
                    $.ajax({
                        type: "POST",
                        url: "check_pin.php",
                        data: formDataCheckPin,
                        success: function(response) {
                            // Handle response from check_pin.php
                            console.log(response);
                            if (response === "Done") {
                                alert("You done.");
                                window.location.href = "../log_index.php?userID=" + uid;
                                console.log(response);
                            } else {
                                if (response === "invalid_credentials") {
                                    alert("Please fill in the right data.");
                                    console.log(response);
                                } else if (response === "insufficient") {
                                    alert("Insufficient funds in your wallet.");
                                    console.log(response);
                                } else if (response === "invalid_pin") {
                                    alert("Your 6-digit PIN are wrong.");
                                    console.log(response);
                                } else {
                                    alert("Please fill in the right data.");
                                    console.log(response);
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });










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
