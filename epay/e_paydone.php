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

            // Verify PIN
            if ($row_user["pin"] === $pin) 
            {
                // Authentication and PIN verification successful

                // Update wallet balance in the e_wallet table
                $wallet_query = "SELECT * FROM e_wallet WHERE user_id = '$e_u_id'";
                $wallet_result = mysqli_query($connect, $wallet_query);

                if ($wallet_result && mysqli_num_rows($wallet_result) > 0) 
                {
                    $row_wallet = mysqli_fetch_assoc($wallet_result);
                    $wallet_debit = $row_wallet["w_debit"]; // Current wallet balance

                    // Calculate the new balance after deduction
                    $at_wallet = $wallet_debit - $total_price;

                    // Update the wallet balance
                    $update_query = "UPDATE e_wallet SET w_debit = '$at_wallet' WHERE user_id = '$e_u_id'";
                    $update_result = mysqli_query($connect, $update_query);

                    if ($update_result) 
                    {
                        // Insert order data into the "order" table
                        $food_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND cart_food_delete = '1'";
                        $food_result = mysqli_query($connect, $food_query);

                        while ($row_food = mysqli_fetch_assoc($food_result)) 
                        {
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
                        $cart_query = "UPDATE cart SET cart_food_delete = '0' WHERE user_id = $user_id";
                        $cart_result = mysqli_query($connect, $cart_query);

                        if ($cart_result) 
                        {
                            echo "done"; // Transaction successful
                        
                        } 
                        
                    } 
                
                } 
                
            } 
        
        } 
    
    }
}
?>
