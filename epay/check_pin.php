<?php
include("../connection_sql.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    $userEmail = $_POST["user_email"];
    $userPassword = $_POST["user_password"];
    $pin = $_POST["pin"];
    $user_id = $_POST["user_id"];
    $total_price = $_POST["price"];

    // Query the e_user table to retrieve the user's record
    $query = "SELECT * FROM e_user WHERE user_email = '$userEmail' AND user_pass = '$userPassword'";
    $result = mysqli_query($connect, $query);

    if ($result) 
    {
        if (mysqli_num_rows($result) > 0) 
        {
            $row_user = mysqli_fetch_assoc($result);
            $e_u_id = $row_user["user_id"]; // Retrieve the user ID

            if ($row_user["pin"] === $pin) 
            {
                // Query the e_wallet table to get the wallet debit
                $wallet_query = "SELECT w_debit FROM e_wallet WHERE user_id = '$e_u_id'";
                $wallet_result = mysqli_query($connect, $wallet_query);

                if ($wallet_result && mysqli_num_rows($wallet_result) > 0) 
                {
                    $row_wallet = mysqli_fetch_assoc($wallet_result);
                    $wallet_debit = $row_wallet["w_debit"]; // Current wallet balance

                    // Check if the wallet debit is enough
                    if ($wallet_debit >= $total_price) 
                    {
                        echo "done"; // Wallet debit is enough
                    } 
                    else 
                    {
                        echo "insufficient"; // Wallet debit is not enough
                    }
                } 
                else 
                {
                    echo "error_wallet"; // Error fetching wallet details
                }
            } 
        
        } 
    
    }
}
?>
