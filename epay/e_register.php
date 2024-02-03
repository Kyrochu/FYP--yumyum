<?php
    include("../login/data_connection.php");


    if(isset($_POST["regbtn"])){

        // Get user input from the registration form
        $name = $_POST['name'];
        $contactNumber = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['new_password'];
        $confirm_password = $_POST['com_password'];
        

        if($password && $confirm_password)
        {
            // Insert user data into the database
            $query = "INSERT INTO e_user (user_name, user_contact, user_email, user_pass) VALUES ('$name', '$contactNumber', '$email', '$password')";
            if (mysqli_query($conn, $query)) {
                // Registration successful
                echo "Registration successful!";
                echo "<script> window.location = 'e_login.php';
                alert ('Register successful');
                
                </script>";
            } else {
                // Registration failed
                echo "Error: " . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);
        }
        else
        {
            echo" Password and confirm password must be same.";
            echo" <script> window.location = 'e_login.php' </script>";
        }
    }
?>