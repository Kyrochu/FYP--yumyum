<?php

    // Include your database connection file
    include("connection_sql.php");

    // Check if the food_id is set and not empty
    if (isset($_GET['food_id']) && !empty($_GET['food_id'])) 
        {
            $food_id = mysqli_real_escape_string($connect, $_GET['food_id']);

            // Fetch details based on the food_id from the menu table
            $menu_sql = "SELECT * FROM menu WHERE food_id = '$food_id'";
            $menu_result = mysqli_query($connect, $menu_sql);

            if ($menu_result && $menu_row = mysqli_fetch_assoc($menu_result)) {
                // Fetch additional options from the add_cart table based on the food_id
                $options_sql = "SELECT * FROM add_cart WHERE food_id = '$food_id'";
                $options_result = mysqli_query($connect, $options_sql);

                $options = [];
                while ($option_row = mysqli_fetch_assoc($options_result)) {
                    $options[] = $option_row;
                }

                // Combine menu details and options
                $response = json_encode([
                    'food_img' => $menu_row['food_img'],
                    'food_id' => $menu_row['food_id'],
                    'food_name' => $menu_row['food_name'],
                    'food_price' => $menu_row['food_price'],
                    'options' => $options,
        ]
    );

            echo $response;
        } else {
            // Return an empty JSON object or handle the error as needed
            echo json_encode([]);
        }
    } else {
        // Return an empty JSON object or handle the error as needed
        echo json_encode([]);
    }

?>
