<?php

include("../login/data_connection.php");

if(isset($_POST['logbtn'])) {
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    $query = "SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($conn, $query);
    $row_user = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);

    $id = "SELECT * from users where email = '$email'";
    $re = mysqli_query($conn, $id);
    $row = mysqli_fetch_assoc($re);
    $uid = $row["id"];
    

    if ($rowcount != 0) {

        header("Location: e_index.php?uid=$uid");
        echo"<script>
                alert('Login successful.');
            </script>";
        exit(); 
    } else {
        echo "<script>
                alert('Wrong email or password, Please re-enter again.');
                window.location = 'e_login.php';
              </script>";
    }

}
?>