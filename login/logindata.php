<?php

include("data_connection.php");

if(isset($_POST['signIn'])) {
    $email = $_POST['signinemail'];
    $password = $_POST['signinpassword'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $row_user = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);

    $id = "SELECT * from users where email = '$email'";
    $re = mysqli_query($conn, $id);
    $row = mysqli_fetch_assoc($re);
    $uid = $row["id"];


    if($rowcount != 0){

        echo"<script>
                alert('Login successful.');
                window.location = '/FYP--yumyum/log_index.php?userID=$uid';
            </script>";
            mysqli_close($connect);
    }else{
        echo"<script>
            alert('Wrong email or password, Please reenter again.');
            window.location = 'login.php';
        </script>";
    }

}
?>