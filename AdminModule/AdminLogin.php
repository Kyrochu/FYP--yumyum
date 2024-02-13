<?php

include("DataConnect.php");

if(isset($_POST["submit"]))
{
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $result = mysqli_query($connect,"SELECT *FROM admin_acc WHERE email='$Email' AND password = '$Password' ");

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $id = $row['id'];

        if($row['admin_type'] == 'Admin' )
        {
            $_SESSION['email'] = $row['name'];
            header("location:AdminPanel.php?id=$id");
        }
        elseif($row['admin_type'] == 'SuperAdmin')
        {
            $_SESSION['email'] = $row['name'];
            header("location:SuperAdminPanel.php?id=$id");
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
               <input type="submit" name="submit" value="login now" class="form-btn">
              
            </form>
         
         </div>

         
    </body>

</html>