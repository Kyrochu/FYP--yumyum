<?php
    include("../connection_sql.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["uid"]) && isset($_POST["pin"]) && isset($_POST["cpin"])) {
        $uid = $_POST["uid"];
        $pin = $_POST["pin"];
        $cpin = $_POST["cpin"];

        // Perform the database insertion to activate the wallet
        $up_pin = "UPDATE users SET pin = $pin WHERE id = $uid";
        mysqli_query($connect, $up_pin);

        $insert_query = "INSERT INTO e_wallet (user_id, w_debit) VALUES ('$uid', 0)";
        if (mysqli_query($connect, $insert_query)) {
            // If insertion is successful, return a success message
            echo "Wallet activated successfully!";
        } else {
            // If there's an error, return the error message
            echo "Error activating wallet: " . mysqli_error($connect);
        }
    } else {
        // If the request method is not POST or UID is not set, return an error message
        echo "Invalid request!";
    }
?>