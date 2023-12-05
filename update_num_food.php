<?php
include("connection_sql.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the food ID and action from the AJAX request
        $foodId = $_POST["foodId"];
        $action = $_POST["action"];

        // Fetch the current num_food value from the database
        $sql = "SELECT num_food FROM cart WHERE food_id = $foodId";
        $result = mysqli_query($connect, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $numFood = $row["num_food"];

            // Update the num_food value based on the action
            if ($action == "increment") {
                $numFood++;
            } elseif ($action == "decrement" && $numFood > 0) {
                $numFood--;
            }

            // Update the num_food in the database
            $updateSql = "UPDATE cart SET num_food = $numFood WHERE food_id = $foodId";
            $updateResult = mysqli_query($connect, $updateSql);

            if ($updateResult) {
                // Return the updated num_food value as a JSON response
                echo json_encode(["numFood" => $numFood]);
            } else {
                // Handle the update failure
                echo json_encode(["error" => "Failed to update num_food"]);
            }
        } else {
            // Handle the fetch failure
            echo json_encode(["error" => "Failed to fetch num_food"]);
        }
    } else {
        // Handle non-POST requests
        echo json_encode(["error" => "Invalid request method"]);
    }
?>
