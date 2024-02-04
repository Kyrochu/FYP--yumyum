<?php
    include('DataConnect.php');


    // Assuming this code block is within your PHP file
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delivered'])) {
        // Assuming you have a database connection named $connect

        // Loop through the grouped orders to insert data into the order_history table
        foreach ($grouped_orders as $group) {
            $datetime = $group['time'];
            $date = date('Y-m-d', strtotime($datetime));
            $time = date('H:i:s', strtotime($datetime));
            $username = $group['name'];
            $contact_number = $row_user['contact_number'];

            foreach ($group['foods'] as $food) {
                $food_name = $food["food_name"];
                $add_on_name = $food["add_on_name"];
                $add_on_price = $food["add_on_price"];
                $quantity = $food["food_num"];
                $price = $food["food_price"];
                $total_price = $quantity * ($price + $add_on_price);

                // Prepare and bind parameters
                $insert_query = "INSERT INTO order_history (order_date, order_time, username, contact_number, food_name, add_on_name, add_on_price, quantity, price, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $connect->prepare($insert_query);
                $stmt->bind_param("ssssssiiid", $date, $time, $username, $contact_number, $food_name, $add_on_name, $add_on_price, $quantity, $price, $total_price);

                // Execute the statement
                $stmt->execute();

                // Check for errors or success
                if ($stmt->affected_rows === -1) {
                    // Handle insertion failure
                    echo "Failed to insert order history for: $food_name";
                } else {
                    // Handle successful insertion
                    echo "Order history inserted successfully for: $food_name";
                }

                // Close statement
                $stmt->close();
            }
        }
    }
?>

