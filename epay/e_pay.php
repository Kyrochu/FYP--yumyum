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
            </div>
        </header>
        
        <div class="form_page">
            <div class="btn_anime">
                <div id="btn" ></div>
                <button type="button" class="LG_RE_btn"   style="color: rgb(255, 252, 255);">Log In</button>
            </div>
            

            <form id="paymentForm" class="input_group" action="e_paydone.php" method="POST">
                <br><br><br><br><br>
                
                
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

                    
                    // Collect form data 
                    var formData = {
                        user_email: userEmail,
                        user_password: userPassword,
                        pin: pin,
                        price: total_price, // Include total_price variable
                        user_id: uid // Include user_id variable
                    };

                    // Send AJAX request
                    $.ajax({
                        type: "POST",
                        url: "e_paydone.php",
                        data: formData,
                        success: function(response) {
                            if (response.trim() === "done") {
                                window.location = "../log_index.php?userID=<?php echo $user; ?>";
                            } else {
                                $("#pinError").text("Invalid email, password, or PIN.");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", status, error);
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
