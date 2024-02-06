<?php

include("../login/data_connection.php");

if(isset($_POST['logbtn'])) {
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    $query = "SELECT * FROM e_user WHERE user_email = '$email' AND user_pass = '$password'";
    $result = mysqli_query($conn, $query);
    $row_user = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);

    $id = "SELECT * from e_user where user_email = '$email'";
    $re = mysqli_query($conn, $id);
    $row = mysqli_fetch_assoc($re);
    $uid = $row["user_id"];
    

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