<?php
    include("../login/data_connection.php");

    if(isset($_POST["regbtn"])){

        // Get user input from the registration form
        $name = $_POST['name'];
        $contactNumber = $_POST['contact'];
        $email = $_POST['email'];
        $password = $_POST['new_password'];
        $confirm_password = $_POST['com_password'];
        $pin = $_POST['pin'];

        if($password && $confirm_password)
        {
            // Insert user data into the database
            $query = "INSERT INTO e_user (user_name, user_contact, user_email, user_pass, pin) VALUES ('$name', '$contactNumber', '$email', '$password', '$pin')";
            if (mysqli_query($conn, $query)) {
                // Registration successful
                $uid = mysqli_insert_id($conn); // Get the last inserted user ID

                // Insert data into e_wallet table
                $insert_query = "INSERT INTO e_wallet (user_id, w_debit) VALUES ('$uid', 0)";
                if (mysqli_query($conn, $insert_query)) {
                    echo "Registration successful!";
                    echo "<script> 
                            window.location = 'e_login.php';
                            alert ('Register successful');
                          </script>";
                } else {
                    echo "Error inserting data into e_wallet table: " . mysqli_error($conn);
                }
            } else {
                // Registration failed
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        }
        else
        {
            echo" Password and confirm password must be same.";
            echo" <script> window.location = 'e_login.php' </script>";
        }
    }
?>
