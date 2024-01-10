<?php
include("connection_sql.php"); 

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    if (isset($_POST["u_id"]) && isset($_POST["card_num"]) && isset($_POST["total_price"])) 
    {
        $user_id = $_POST["u_id"];
        $card_num = $_POST["card_num"];
        $total_price = floatval($_POST["total_price"]);

        $insert_query = "INSERT INTO receipt (u_id, card_number, total_price) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connect, $insert_query);
        mysqli_stmt_bind_param($stmt, "ssd", $user_id, $card_num, $total_price);

        $result = mysqli_stmt_execute($stmt);

        // Check for success
        if ($result) {
            echo "Order placed successfully.";
        } else {
            echo "Error placing order: " . mysqli_error($connect);
        }
    } 
    else 
    {
        echo "Invalid data received.";
    }
}
?>
