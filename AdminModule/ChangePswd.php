<?php

include('DataConnect.php');

?>

<!DOCTYPE html>
<html>

    <head>

        <title> Change Your Password </title>
        <link rel="stylesheet" href="SignUp&Login_Style.css">

    </head>


    <body>

        <div class="form-container">

            <form action="" method="post">
               
               <h3> Change Your Password </h3>
              
               
               <span class="txt"> Email </span> <input type="email" name="email" required placeholder="Enter your email">
               <span class="txt"> New Password </span> <input type="password" name="password" required placeholder="Enter new password">
               <span class="txt"> Confirm Password </span> <input type="password" name="cpassword" required placeholder="Confirm your password">
               <input type="submit" name="submit" value="Update Password" class="form-btn">


            
            </form>
         
         </div>

         
    </body>
    
</html>