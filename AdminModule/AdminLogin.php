<?php

include("DataConnect.php");

if(isset($_POST["submit"]))
{
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $AdminType = $_POST["admin_type"];


    $result = mysqli_query($connect,"SELECT *FROM admin_acc WHERE name= '$Email' OR email='$Email' ");

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        if($row['admin_type'] == 'Admin' )
        {
            $_SESSION['email'] = $row['name'];
            header('location:AdminPanel.php');
        }
        elseif($row['admin_type'] == 'SuperAdmin')
        {
            $_SESSION['email'] = $row['name'];
            header('location:SuperAdminPanel.php');
        }
    }
    else
    {
        echo "<script> alert('Invalid email or password!') </script>";
    }
}

?>

<!DOCTYPE html>
<html>
    
    <head>

        <title> Welcome Admin </title>
        
        <link rel="stylesheet" href="SignUp&Login_Style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="ShowPassword.js"> </script>

    </head>

    <body>
        
        <div class="form-container">

            <form action="" method="post">
               
                <h3> login now </h3>
              
               <input type="email" name="email" required placeholder="Email">
               <input type="password" name="password" required placeholder="Password" id="password"> 
               <i class="fa fa-solid fa-eye" id="show-pswd" onclick="togglePassword() "> </i>
               <a href="" class="forgot_pswd"> Forgot your password? </a>
               <input type="submit" name="submit" value="login now" class="form-btn">
              
               <p>Don't have an account? <a href="AdminSignUp.php">Register now</a></p>
            </form>
         
         </div>

         
    </body>

</html>