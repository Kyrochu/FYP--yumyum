<?php
    session_start();
    include('dataconnection.php');

    if(isset($_POST["Login"])){
        $gmail = $_POST["Email"];
        $pass = $_POST["Pass"];

        $sql = "select Customer_id, Cus_firstname, Cus_lastname, Cus_email, Cus_password, Cus_phone_number, Cus_status from customer where Cus_email = '$gmail' and Cus_password = '$pass'";

        $checkuser = mysqli_query($connect, $sql);
        $row_user = mysqli_fetch_assoc($checkuser);
        $rowcount = mysqli_num_rows($checkuser);

        if($rowcount!=0){
            if($row_user["Cus_status"]=='1'){
                $_SESSION["CustomerID"]=$row_user["Customer_id"];
                $_SESSION["CustomerName"] = $row_user["Cus_firstname"] . " " . $row_user["Cus_lastname"];
                echo"<script>
                    alert('Login successful.');
                    window.location = 'C:\xampp\htdocs\IWP_project\room\room.php';
                </script>";
                mysqli_close($connect);
            } else{
                echo"<script>
                    alert('Your account already terminated by the admin, if you want to recover your account please contact our admin.');
                    window.location = 'login.php';
                </script>";
            }
        } else{
            echo"<script>
                alert('Wrong email or password, Please reenter again.');
                window.location = 'login.php';
            </script>";
        }
    }

?>