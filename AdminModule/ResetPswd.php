<?php

include('DataConnect.php');

?>

<!DOCTYPE html>
<html>

    <head>

        <title> Reset Password </title>
        <link rel="stylesheet" href="SignUp&Login_Style.css">

    </head>


    <body>

        <div class="form-container">

            <form action="" method="post">
               
                <h3> Reset Password </h3>
              
               <input type="email" name="email" required placeholder="Email">
               <input type="submit" name="submit" value="Send Password Reset Link" class="form-btn">
               <input type="button" class="form-btn" value="Cancel" onclick="location.href='AdminLogin.php';">

            
            </form>
         
         </div>

         
    </body>
    
</html>
