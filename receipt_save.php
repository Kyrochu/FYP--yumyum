
<?php
include("connection_sql.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["u_id"]) && isset($_POST["card_num"]) && isset($_POST["total_price"])) {
        $user_id = $_POST["u_id"];
        $card_num = $_POST["card_num"];
        $total_price = floatval($_POST["total_price"]);

        // Insert data into the "receipt" table
        $insert_query = "INSERT INTO receipt (u_id, card_number, total_price, re_time) VALUES (?, ?, ?, NOW())";
        $stmt = mysqli_prepare($connect, $insert_query);
        mysqli_stmt_bind_param($stmt, "ssd", $user_id, $card_num, $total_price);

        $result = mysqli_stmt_execute($stmt);


        if ($result) {
            echo "Order placed successfully.";
        } else {
            echo "Error placing order: " . mysqli_error($connect);
        }


        $food_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND cart_food_delete = '1'";
        $food_result = mysqli_query($connect, $food_query);

        // Loop 
        while ($row = mysqli_fetch_assoc($food_result)) {
            $food_id = $row['food_id'];
            $quantity = $row['num_food'];
            $addid = $row['add_on_id'];

            // Insert the data into the "order" table
            $order_query = "INSERT INTO `order` (user_id, food_id, num_food, add_on_id , or_time) VALUES (?, ?, ?, ?, NOW())";
            $order_stmt = mysqli_prepare($connect, $order_query);
            mysqli_stmt_bind_param($order_stmt, "iiii", $user_id, $food_id, $quantity, $addid);

            $order_result = mysqli_stmt_execute($order_stmt);

            if (!$order_result) {
                echo "Error inserting data into 'order' table: " . mysqli_error($connect);
            }
        }

        // Delete items from the "cart" table
        $cart_query = "UPDATE cart SET cart_food_delete = '0' WHERE user_id = $user_id";
        $cart_result = mysqli_query($connect, $cart_query);

        if (!$cart_result) {
            echo "Error deleting items from 'cart' table: " . mysqli_error($connect);
        }

        

    } else {
        echo "Invalid data received.";
    }
}
?>
