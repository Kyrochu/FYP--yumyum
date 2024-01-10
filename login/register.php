<?php
    include("data_connection.php");


    if(isset($_POST["signUpbutton"])){

        // Get user input from the registration form
        $name = $_POST['name'];
        $contactNumber = $_POST['contact_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postcode = $_POST['postcode'];


        if($password && $confirm_password)
        {
            // Insert user data into the database
            $query = "INSERT INTO users (name, contact_number, email, password, address , city, state , postcode, code ) VALUES ('$name', '$contactNumber', '$email', '$password', '$address', '$city', '$state', '$postcode' , 'null')";
            if (mysqli_query($conn, $query)) {
                // Registration successful
                echo "Registration successful!";
                echo "<script> window.location = 'login.php';
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
            echo" <script> window.location = 'login.php' </script>";
        }
    }
?>