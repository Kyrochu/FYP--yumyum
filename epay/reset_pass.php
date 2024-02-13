<?php include ("../connection_sql.php") ?>

<!DOCTYPE html>
<html>
    
    <head>
        <title> YumYum Menu List </title>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Link for Icon Style  -->
        
        <!-- JQuery CDN Link -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Libraries Stylesheet -->
        <link href="../lib/animate/animate.min.css" rel="stylesheet">
        <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- java script for pass var to php -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- Customized Bootstrap Stylesheet -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">   
        <link rel="stylesheet" href="../css/epay.css">  <!-- CSS for Admin Page -->                                                                                         

        <script>

            $(document).ready(function()
            {
                //JQuery for expanding and collapsing the sidebar

                $('.menu-btn').click(function()
                {
                    $('.side-bar').addClass('active');
                    $('.menu-btn').css("visibility","hidden");

                });

                //Closing button

                $('.close-btn').click(function()
                {
                    $('.side-bar').removeClass('active');
                    $('.menu-btn').css("visibility","visible");
                });

                //Toggle Sub-Menu

                $('.sub-btn').click(function()
                {
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });
            })
        </script>

        <!-- Javascript  -->

        <script src="../AdminModule/Date&Time Widget.js" defer> </script>  <!-- defer means script only going to be execute once document is opened --> 
        <script src="../AdminModule/AddCategory.js"> </script>

        <script>
            function validateDecimalInput(input) 
            {
                // Remove any non-digit and non-dot characters
                input.value = input.value.replace(/[^0-9.]/g, '');

                // Ensure only one dot is allowed
                input.value = input.value.replace(/(\..*)\./g, '$1');

                // Ensure up to two decimal places without leading zeros
                var parts = input.value.split('.');
                if (parts.length > 1) {
                    parts[1] = parts[1].slice(0, 2); // Take only up to two decimal places
                    input.value = parts.join('.');
                }
            }
        </script>

        <style>
            .btn-pass
            {
                color: white;
                background-color: #00a2ff;
                margin-top: 30px;
                margin-left: 300px;
                width: 20%;
            }
            .input
            {
                background-color: transparent;
                color: white;
            }
        </style>


    </head>

    <body>
        <?php
            if (isset($_GET['uid'])) {
                $uid = $_GET['uid'];

                $query = "SELECT * FROM users WHERE id = '$uid'";
                $result = mysqli_query($connect, $query);
                $row_user = mysqli_fetch_assoc($result);
                $u_name = $row_user["name"];
            }
        ?>

            <div class="side-bar">
                <!-- Header Section -->
                <div class="menu">
                    <div class="item"><a href=""><i class="fab fa-jenkins"></i> <span class="menu-text"> DayPay </span> </a></div>
                    <div class="item"><a href="e_index.php?uid=<?php echo $uid; ?>"><i class="fas fa-desktop"></i> <span class="menu-text"> Dashboard </span> </a></div>
                    <div class="item"><a class="sub-btn"><i class="fas fa-user"></i> <span class="menu-text"> Accounts </span>                    
                        <!-- Dropdown List (Accounts)-->
                        <i class="fas fa-angle-right dropdown" id="menu-icon"> </i>
                        </a>
                            <div class="sub-menu">
                                <a href="e_user_profile.php?uid=<?php echo $uid; ?>" class="sub-item"> <span class="menu-text"> Profile </span> </a>
                                <a href="reset_pass.php?uid=<?php echo $uid; ?>" class="sub-item"> <span class="menu-text"> Reset Password </span> </a>
                                <a href="reset_pin.php?uid=<?php echo $uid; ?>" class="sub-item"> <span class="menu-text"> Reset Pin </span> </a>
                            </div>      
                    </div>
                    <div class="item">
                        <div class="logout" style="margin-top: 600px;">
                            <a href="e_login.php"><i class="fas fa-sign-out-alt" > </i> <span class="menu-text"> Logout </span> </a>
                        </div>
                    </div>
                </div>
            </div>  
        
        <!-- Date & Time Widget -->
        
        <div class="datetime border " style="box-shadow: 10px 10px 10px white; ">
            <div class="internal">
                <div class="main-content">
                    <div class="header-title">
                        <span style="color: white; text-shadow: 2px 2px 10px white;"> Welcome </span>
                        <h2 style="color: white; text-shadow: 2px 2px 10px white;"> <?php echo $u_name ?> </h2>
                    </div>
                </div>

                <div class="date" style="color: white; text-shadow: 2px 2px 10px white;">
                    <span id="day"> Day </span>
                    <span id="month"> Month </span>
                    <span id="daynum"> 00 </span>
                    <span id="year"> Year </span>
                </div>
                <div class="time" style="color: white; text-shadow: 2px 2px 10px white;">
                    <span id="hour"> 00 </span>:
                    <span id="minutes"> 00 </span>:
                    <span id="seconds"> 00 </span>
                    <span id="period"> AM </span>
                </div>
                <br><br><br><br><br>    
                <hr>
            </div>

        </div>    
        <br><br>

        <?php
            $user_query = "SELECT * FROM users WHERE id = '$uid'";
            $user_result = mysqli_query($connect, $user_query);
            $user_row = mysqli_fetch_assoc($user_result);

            $name = $user_row["name"];
            $email = $user_row["email"];
            $contact = $user_row["contact_number"];
            $pass = $user_row["password"];
            $pin = $user_row["pin"];

            $wallet_query = "SELECT * FROM e_wallet WHERE user_id = '$uid'";
            $wallet_result = mysqli_query($connect, $wallet_query);
            $e_debit = 0;

            if (mysqli_num_rows($wallet_result) > 0) {
                // If wallet data exists for the user
                while ($wallet_row = mysqli_fetch_assoc($wallet_result)) {

                    $e_debit = $wallet_row['w_debit'];
        
                }
            }
        ?>

        <div class="container" style="opacity: 0.8; height:10em;">
            <div class="row justify-content-center">
                <div class="col-md-8" > <!-- Adjust the column width as needed -->
                    <div class="cardtab card text-bg-dark mb-3" style="box-shadow: 10px 10px 10px white; width: 100%; height:100%;">
                        <form action="" method="POST">
                        <div class="card-header"><h5 style="color: white; text-shadow: 2px 2px 10px white;">Reset Password</h5></div>
                            <div class="card-body">
                                <h2 class="card-title" style="color: white; text-shadow: 2px 2px 10px white; font-size:x-large;">Old Password : <input type="password" name="o_pass" class="input" id="" placeholder="Create Password"  required oninput="ovalidatePassword(this)"></h2>
                                
                                <div id="container" style="margin-top: 5px;">
                                    <span id="opasswordError" style="color: white;"></span>
                                </div>
                                <br>
                                <h2 class="card-title" style="color: white; text-shadow: 2px 2px 10px white; font-size:x-large;">New Password : <input type="password" name="n_pass" class="input" id="" placeholder="Create Password"  required oninput="validatePassword(this)"> </h2>
                                
                                <div id="container" style="margin-top: 5px;">
                                    <span id="passwordError" style="color: white;"></span>
                                </div>
                                <br>
                                <h2 class="card-title" style="color: white; text-shadow: 2px 2px 10px white; font-size:x-large;">Confirm Password : <input type="password" name="c_pass" class="input" id="" placeholder="Confirm Password"  required oninput="validatePasswordMatch(this)"> </h2>
                                
                                <div id="container" style="margin-top: 5px;">
                                    <span id="passwordMatchError" style="color: white; "></span>
                                </div>
                                <br>

                            </div>
                            <button type="submit" name="submit" class="btn-pass btn " style="text-shadow: 2px 2px 10px white; background-color:orange;" id="topUpButton">Submit</button>
                            <br><br>
                        </form>
                    </div>
                </div>  
            </div>
        </div>


        <?php
            $oPassError = $nPassError = $cPassError = '';

            if (isset($_POST['submit'])) {
                // Form submitted, process the data
                $o_pass = $_POST['o_pass'];
                $n_pass = $_POST['n_pass'];
                $c_pass = $_POST['c_pass'];

                // Retrieve old password from the database
                $query = "SELECT `password` FROM users WHERE id = '$uid'";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_assoc($result);
                $stored_password = $row['password'];

                // Verify if the old password matches the stored password
                if ($o_pass != $stored_password) {
                    echo "<script>alert('Old password is incorrect.');</script>";
                } else {
                    if ($n_pass != $c_pass) {
                    } else {
                        // Update the password in the database
                        $update_query = "UPDATE users SET `password` = '$n_pass' WHERE id = '$uid'";
                        $update_result = mysqli_query($connect, $update_query);

                        if ($update_result) {
                            echo "<script>alert('Password updated successfully.');</script>";
                        } else {
                            echo "<script>alert('Error updating password.');</script>";
                        }
                    }
                }
            }
        ?>




        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        
        
        <script>
            function ovalidatePassword(input) {
                var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;
                var errorElement = document.getElementById('opasswordError');
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (!regex.test(input.value)) {
                    errorElement.textContent = 'Password must contain at least 8 characters, one number, one uppercase letter, and one symbol.';
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
                var password = document.querySelector('input[name="n_pass"]').value;
                var errorElement = document.getElementById('passwordMatchError');
                if (input.value.trim() === '') {
                    errorElement.textContent = '';
                } else if (input.value !== password) {
                    errorElement.textContent = 'Passwords do not match.';
                } else {
                    errorElement.textContent = '';
                }
            }

        </script>

    </body>

</html>