<?php include ("../connection_sql.php") ?>



<!DOCTYPE html>
<html>
    <head>
        <title>LogIn</title>
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
                <button type="button" class="LG_RE_btn"  onclick="login()" style="color: rgb(255, 252, 255);">Log In</button>
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
                
                <button type="submit" class="submit_btn" name="regbtn" style="color: rgb(255, 252, 255);">Register</button>
                
            </form>
        </div>

        
        <script>
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
