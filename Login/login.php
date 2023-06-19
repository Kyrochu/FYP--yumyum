<?php
    include ("connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LogIn</title>
        <link rel="stylesheet" href="LoginCSS.css">
        
        
    </head>
    <body>
        <header> 
    
        
            <!-- <h1 class="Welcome" style="background-color:dimgrey;"> <span class="W">W</span>elcome to <span class="F">F</span>antastos <span class="H">H</span>otel </h1> -->
        
                <div class="navbar" style="background-color:black;padding-bottom:30px;"> 
        
                    <img src="Pic/royal logo.jpg" alt="No Image">
                    
                    <ul style="margin-left:700px;">
                        <li> <a href="Homepage.html"> Home </a> </li>
                        <li> <a href="     "> About us </a> </li>
                        <li> <a href="     "> Rooms </a> </li>
                    </ul>
                    
                </div>
        
        </header>

        
        <div class="form_page">
            <div class="btn_anime">
                <div id="btn" ></div>
                <button type="button" class="LG_RE_btn" onclick="login()" style="color: rgb(255, 252, 255);">Log In</button>
                <button type="button" class="LG_RE_btn" onclick="register()" style="color: rgb(255, 252, 255);">Register</button>
            </div>
            
            <!-- log side -->
            <form id="log" class="input_group" method="POST" >
                <input type="text" class="input_place" name="user_email" placeholder="User Email" required>
                
                <input type="password" class="input_place" name="user_password" placeholder="Password" required>

                <button type="submit" class="submit_btn" name="logbtn" style="color: rgb(255, 252, 255);">Log in</button>
            </form>

            <!-- register side -->
            <form id="reg" class="input_group" method="POST">
                <input type="text" class="input_place" name="user_name" placeholder="User Name" required pattern="[a-zA-Z0-9]+" title="Please enter letters or numbers ">
                <input type="email" class="input_place" name="user_email" placeholder="Email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Please enter a valid email address">
                <input type="password" class="input_place" name="user_password" placeholder="Password" required pattern="^(?=.*[A-Z])[a-zA-Z0-9]+$" title="Please enter a password with at least one capital letter and no any symbol">

                <button type="submit" class="submit_btn" name="regbtn" style="color: rgb(255, 252, 255);">Register</button>
            </form>
        </div>

        <?php 

            if(isset($_POST["regbtn"]))
            {
                $name = $_POST["user_name"];
                $email = $_POST["user_email"];
                $pass = $_POST["user_password"];

                $result = mysqli_query($connect , "INSERT into login ( user_name , user_email , user_password ) 
                                                    VALUES ( '$name' , '$email' ,' $pass' )");

                $cus_result = mysqli_query($connect , "INSERT into customer ( cus_name , user_email , cus_phone ) 
                                                values ( '$name' , '$email' , '0' ) ");
            }


            if(isset($_POST["logbtn"]))
            {
                $name = $_POST["user_name"];
                $email = $_POST["user_email"];
                $pass = $_POST["user_password"];

                $result = mysqli_query($connect , "SELECT * from login where user_email = '$email' and user_password = '$pass' ");
                $row = mysqli_fetch_assoc($result);

                if($row["user_type"] == "admin" )
                {
                    header("location:http://localhost/IWP%20project/Adminpage/admin.php");
                }
                elseif($row["user_type"] == "user" )
                {
                    header("location:http://localhost/IWP%20project/Homepage/Homepage.html");
                }
                else
                {

                    ?>
                        <script>alert("Wrong email or password");</script>
                    <?php

                }
                    
            }
            

        ?>


        
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
