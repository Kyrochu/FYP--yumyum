<?php
include("../connection_sql.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Declare variables and retrieve POST data
    $userEmail = $_POST["user_email"];
    $userPassword = $_POST["user_password"];
    $pin = $_POST["pin"];
    $user_id = $_POST["user_id"];
    $total_price = $_POST["price"];

    // Query the e_user table to retrieve the user's record
    $query = "SELECT * FROM e_user WHERE user_email = ? AND user_pass = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "ss", $userEmail, $userPassword);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $row_user = mysqli_fetch_assoc($result);
        $e_u_id = $row_user["user_id"]; // Retrieve the user ID
        $pin_user = $row_user["pin"];

        if (trim($pin_user) === trim($pin)) {
            // Query the e_wallet table to get the wallet debit
            $wallet_query = "SELECT w_debit FROM e_wallet WHERE user_id = ?";
            $wallet_stmt = mysqli_prepare($connect, $wallet_query);
            mysqli_stmt_bind_param($wallet_stmt, "i", $e_u_id);
            mysqli_stmt_execute($wallet_stmt);
            $wallet_result = mysqli_stmt_get_result($wallet_stmt);

            if ($wallet_result && mysqli_num_rows($wallet_result) > 0) {
                $row_wallet = mysqli_fetch_assoc($wallet_result);
                $wallet_debit = $row_wallet["w_debit"]; // Current wallet balance

                if ($wallet_debit >= $total_price) {
                    $new_wallet_balance = $wallet_debit - $total_price;
                
                    // Update the wallet balance in the database
                    $update_query = "UPDATE `e_wallet` SET w_debit = '$new_wallet_balance' WHERE user_id = '$e_u_id'";
                    $update_result = mysqli_query($connect, $update_query);
                    

                    if ($update_result) {
                        // Insert order data into the "order" table
                        $food_query = "SELECT * FROM cart WHERE user_id = ? AND cart_food_delete = '1'";
                        $food_stmt = mysqli_prepare($connect, $food_query);
                        mysqli_stmt_bind_param($food_stmt, "i", $user_id);
                        mysqli_stmt_execute($food_stmt);
                        $food_result = mysqli_stmt_get_result($food_stmt);

                        while ($row_food = mysqli_fetch_assoc($food_result)) {
                            $food_id = $row_food['food_id'];
                            $quantity = $row_food['num_food'];
                            $addid = $row_food['add_on_id'];

                            // Prepare and execute the order insertion query
                            $order_query = "INSERT INTO `order` (user_id, food_id, num_food, add_on_id , or_time) VALUES (?, ?, ?, ?, NOW())";
                            $order_stmt = mysqli_prepare($connect, $order_query);
                            mysqli_stmt_bind_param($order_stmt, "iiii", $user_id, $food_id, $quantity, $addid);
                            $order_result = mysqli_stmt_execute($order_stmt);

                            if (!$order_result) {
                                echo "Error inserting data into 'order' table: " . mysqli_error($connect);
                            }
                        }

                        // Update the "cart" table
                        $cart_query = "UPDATE cart SET cart_food_delete = '0' WHERE user_id = ?";
                        $cart_stmt = mysqli_prepare($connect, $cart_query);
                        mysqli_stmt_bind_param($cart_stmt, "i", $user_id);
                        mysqli_stmt_execute($cart_stmt);
                        
                        echo "done"; // Payment and order processing completed
                    } else {
                        echo "Error updating wallet balance: " . mysqli_error($connect);
                    }
                } else {
                    echo "insufficient"; // Wallet debit is not enough
                }
            } else {
                echo "error_wallet"; // Error fetching wallet details
            }
        } else {
            echo "invalid_pin"; // Invalid PIN
            echo $e_u_id;
        }
    } else {
        echo "invalid_credentials"; // Invalid email or password
        
    }
}
?>
