<?php
    // Your database connection code
    include('DataConnect.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $Add_ID = $_POST['add_id'];
        $orderTime = $_POST['order_time'];
        $orderDate = date('Y-m-d', strtotime($orderTime)); // Extracts date in 'YYYY-MM-DD' format
        $orderTime_r = date('H:i:s', strtotime($orderTime)); 
    
        // Prepare and execute the SQL query to select orders based on the order time
        $selectQuery = "SELECT * FROM `order` WHERE or_time = ?";
        $selectStmt = $connect->prepare($selectQuery);
        $selectStmt->bind_param("s", $orderTime);
        $selectStmt->execute();
        $result = $selectStmt->get_result();
    
        // Insert the selected orders into the order_history table
        while ($row = $result->fetch_assoc()) {
            // Fetch user information based on user_id
            $userQuery = "SELECT * FROM users WHERE id = ?";
            $userStmt = $connect->prepare($userQuery);
            $userStmt->bind_param("i", $row['user_id']);
            $userStmt->execute();
            $userResult = $userStmt->get_result();
            $userRow = $userResult->fetch_assoc();
    
            // Fetch menu information based on food_id
            $menuQuery = "SELECT * FROM menu WHERE food_id = ?";
            $menuStmt = $connect->prepare($menuQuery);
            $menuStmt->bind_param("i", $row['food_id']);
            $menuStmt->execute();
            $menuResult = $menuStmt->get_result();
            $menuRow = $menuResult->fetch_assoc();
    
            // Fetch add-on information based on add_on_id
            $addOnQuery = "SELECT * FROM add_on WHERE add_id = ?";
            $addOnStmt = $connect->prepare($addOnQuery);
            $addOnStmt->bind_param("i", $row['add_on_id']);
            $addOnStmt->execute();
            $addOnResult = $addOnStmt->get_result();
            $addOnRow = $addOnResult->fetch_assoc();

            if ($addOnRow && isset($addOnRow['add_price'])) {
                $addOnPrice = $addOnRow['add_price'];
            } else {
                $addOnPrice = 0; 
            }

            if ($addOnRow && isset($addOnRow['add_name'])) {
                $addOnName = $addOnRow['add_name'];
            } else {
                // If $addOnRow or 'add_name' is not set, set $addOnName to null
                $addOnName = "";
            }

            $totalPrice = ($menuRow['food_price'] + $addOnPrice) * $row['num_food'];
    
            // Insert data into order_history table
            $insertQuery = "INSERT INTO `order_history` (order_date, user_id, username, contact_number, address, city, state, postcode, food_name, add_on_name, add_on_price, quantity, price, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $connect->prepare($insertQuery);
            $insertStmt->bind_param("sisssssssisddd", $orderTime, $row['user_id'], $userRow['name'], $userRow['contact_number'], $userRow['address'], $userRow['city'], $userRow['state'], $userRow['postcode'], $menuRow['food_name'], $addOnName, $addOnPrice, $row['num_food'], $menuRow['food_price'], $totalPrice);
            $insertStmt->execute();

            // Update the 'or_delete' column in the 'order' table
            $updateQuery = "UPDATE `order` SET or_delete = '0' WHERE or_time = ?";
            $updateStmt = $connect->prepare($updateQuery);
            $updateStmt->bind_param("s", $orderTime);
            $updateStmt->execute();

        }
    
            $selectStmt->close();
            $userStmt->close();
            $menuStmt->close();
            $addOnStmt->close();
            $insertStmt->close();
            $updateStmt->close();

      
        echo "<script>
            alert('Order Delivered Sucessfully');
            window.location.href ='StatusSuper.php?id=$Add_ID';
        </script>";
        exit();
    
        
    } else {

        http_response_code(400);
        echo "Invalid request";
    }
?>
