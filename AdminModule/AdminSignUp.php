<?php

include("DataConnect.php");

if(isset($_POST["submit"]))
{
    $Name = $_POST["name"];
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    $CPassword = $_POST["cpassword"];
    $AdminType = $_POST["admin_type"];

    $duplicate = mysqli_query($connect,"SELECT* FROM admin_acc WHERE name = '$Name' OR email = '$Email' "); // If Name of Email duplicate
    if(mysqli_num_rows($duplicate) > 0)
    {
        echo "<script> alert('Username or Email already exists!') </script>";
    }
    else
    {
        if($Password == $CPassword) // If password same as confirm password
        {
            $sql = mysqli_query($connect,"INSERT INTO admin_acc (name,email,password,admin_type) VALUES ('$Name','$Email','$Password','$AdminType')");
            
            echo "<script> alert('Registration sucessful!') </script>";
            sleep(1);  // Enable webpage loading for 1 seconds
            header("Location: AdminLogin.php");
            exit();
        }
        else
        {
            echo "<script> alert('Password Does Not Matched!') </script>";
        }
    }

    


} 

?>

<!DOCTYPE html>
<html>

    <head>

        <title> Welcome Admin </title>

        <link rel="stylesheet" href="SignUp&Login_Style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    </head>

    <body>
    
        <div class="form-container">

            <form action="" method="post">
               <h3>register now</h3>
               
               <input type="text" name="name" required placeholder="Enter your name">
               <input type="email" name="email" required placeholder="Enter your email">
               <input type="password" name="password" required placeholder="Enter your password">
               <input type="password" name="cpassword" required placeholder="Confirm your password">
               <select name="admin_type">
                  <option value="SuperAdmin">Super Admin</option>
                  <option value="Admin">Admin</option>
               </select>
               <input type="submit" name="submit" value="register now" class="form-btn">
               <p> Already have an account? <a href="AdminLogin.php"> Login now </a></p>
            </form>
         
         </div>
        
    </body>

</html>