
<?php
    include("include/signin.php")
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LogIn</title>
        <link rel="stylesheet" href="LoginCSS.css">

        
        
    </head>
    <body style="background-image:url(pic/frans-ruiter-UPv0s6izv2Y-unsplash.jpg);" >
        <header> 
    
        
            <!-- <h1 class="Welcome" style="background-color:dimgrey;"> <span class="W">W</span>elcome to <span class="F">F</span>antastos <span class="H">H</span>otel </h1> -->
        
                <div class="navbar" style="background-color:black;padding-bottom:30px;"> 
        
                    <img src="Pic/royal logo.jpg" alt="No Image">
                    
                    <ul style="margin-left:700px;">
                        <li> <a href="Homepage/Homepage.html"> Home </a> </li>
                        <li> <a href="     "> About us </a> </li>
                        <li> <a href="     "> Rooms </a> </li>
                        <li> <a href="     "> Cart </a> </li>
                    </ul>
                    
                </div>
        
        </header>
    

        <div class="form_page" >
            <div class="btn_anime">
                <div id="btn" ></div>
                <button type="button" class="LG_RE_btn" onclick="login()" style="color: rgb(255, 252, 255);">Log in</button>
                <button type="button" class="LG_RE_btn" onclick="register()" style="color: rgb(255, 252, 255);">Register</button>
            </div>
            
            <!-- log side -->
            <form id="log" class="input_group" action="" method="POST">
                <input type="text" class="input_place" name="username" placeholder="User Name" required>
                
                <input type="password" class="input_place" name="pass" placeholder="Password" required>

                <button type="submit" name="submit" class="submit_btn" style="color: rgb(255, 252, 255);">Log in</button>
            </form>

            <!-- register side -->
            <form id="reg" class="input_group" method="POST">
                <input type="text" class="input_place" name="username"  placeholder="User Name" required>
                <input type="email" class="input_place" name="email" placeholder="Example@gmail.com" required>
                <input type="password" class="input_place" name="pass" placeholder="Password" required>
                <input type="password" class="input_place" name="passr" placeholder="Password Repert" required>

                <button type="submit" name="submit" class="submit_btn" style="color: rgb(255, 252, 255);">Register</button>
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
