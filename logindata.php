<?php
session_start();
include("data_connection.php");

if(isset($_POST['signIn'])) {
    $email = $_POST['signinemail'];
    $password = $_POST['signinpassword'];

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $row_user = mysqli_fetch_assoc($result);
    $rowcount = mysqli_num_rows($result);


    if($rowcount != 0){
        $_SESSION["CUSTOMERID"] = $row_user["id"];
        $_SESSION["CUSTOMERNAME"] = $row_user["name"];
        
        echo"<script>
                alert('Login successful.');
                window.location = '/about/log_index.php';
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