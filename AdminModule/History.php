<?php
    include('DataConnect.php');

    if (isset($_POST['delivered'])) 
    {
        // Retrieve order details from the hidden input field
        $order_details = json_decode($_POST['order_details'], true);


        $order_date = date('Y-m-d');
        $order_time = date('H:i:s');

        // Fetch user details based on 'uid' from 'users' table
        $user_query = "SELECT * FROM users WHERE id = ?";
        $user_stmt = $connect->prepare($user_query);
        $user_stmt->bind_param("i", $order_details[0]['uid']); // Assuming the user ID is the same for all foods in the order
        $user_stmt->execute();
        $user_result = $user_stmt->get_result();

        if ($user_result->num_rows > 0) 
        {
            $row_user = $user_result->fetch_assoc(); // Fetch the user details
            $username = $row_user['name']; // Retrieve the user's name
        } 
        else 
        {
            // Handle case where user is not found
            $username = "Unknown User";
        }

        $user_stmt->close();
        $insert_query = "INSERT INTO order_history (order_date, order_time, username, contact_number, food_name, add_on_name, add_on_price, quantity, price, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $insert_stmt = $connect->prepare($insert_query);
    
        foreach ($order_details as $food) {
            // Set your order number here, if available
            $order_number = ''; 


            $food_name = $food["food_name"];
            $add_on_name = $food["add_on_name"];
            $add_on_price = $food["add_on_price"];
            $quantity = $food["food_num"];
            $price = $food["food_price"];

            $total_price = $price * $quantity;

            $insert_stmt->bind_param("ssssssdddd", $order_date, $order_time, $username, $contact_number, $food_name, $add_on_name, $add_on_price, $quantity, $price, $total_price);
            $insert_stmt->execute();
        }

        $insert_stmt->close();
    }
?>
