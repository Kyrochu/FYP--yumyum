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
    $uid = $row["id"];


    if($rowcount != 0){

        echo"<script>
                alert('Login successful.');
                window.location = 'e_index.php';
            </script>";
            mysqli_close($connect);
    }else{
        echo"<script>
            alert('Wrong email or password, Please reenter again.');
            window.location = 'e_login.php';
        </script>";
    }

}
?>