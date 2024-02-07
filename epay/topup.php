<?php
    include ("../connection_sql.php");

    // Check if u_id and amount are set in the POST request
    if(isset($_POST['u_id']) && isset($_POST['amount'])) {
        // Retrieve user_id and topup_amount from the POST request
        $user_id = $_POST['u_id'];
        $topup_amount = $_POST['amount'];
        

        // Prepare the SQL query to update the user's wallet amount
        $sql = "UPDATE e_wallet SET w_debit = w_debit + $topup_amount WHERE user_id = $user_id";

        // Execute the SQL query
        if (mysqli_query($connect, $sql)) {
            echo "Wallet updated successfully";
        } else {
            // Return error message if query execution fails
            echo "Error updating wallet: " . mysqli_error($connect);
        }

        // Close the database connection
        mysqli_close($connect);
    } else {
        // Return error message if u_id or amount is not set
        echo "Error: Invalid parameters";
    }
?>
