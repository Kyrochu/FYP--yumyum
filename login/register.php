<?php
    include("data_connection.php");

    if(isset($_POST["signUpbutton"])){

        // Get user input from the registration form
        $name = $_POST['name'];
        $contactNumber = $_POST['contact_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        

        // Check if the email already exists in the database
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check_query);
        if(mysqli_num_rows($result) > 0) {
            // Email already exists, display an alert
            echo "<script>alert('Email already exists. Please choose a different email.');</script>";
            echo "<script>window.location = 'login.php';</script>";
            exit(); // Stop further execution
        }

        // Check if the password and confirm password match
        if($password != $confirm_password) {
            echo "Password and confirm password must be the same.";
            echo "<script>window.location = 'login.php';</script>";
            exit(); // Stop further execution
        }

        // Insert user data into the database
        $query = "INSERT INTO users (name, contact_number, email, password) VALUES ('$name', '$contactNumber', '$email', '$password')";
        if (mysqli_query($conn, $query)) {
            // Registration successful
            echo "<script>alert('Register Successful.');</script>";
            echo "<script>window.location = 'login.php';</script>";
            exit(); // Stop further execution
        } else {
            // Registration failed
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
?>
