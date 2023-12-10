<?php
include("connection_sql.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the food ID and action from the AJAX request
        $foodId = $_POST["foodId"];
        $action = $_POST["action"];

        // Fetch the current num_food value from the database
        $sql = "SELECT num_food FROM cart WHERE cart_id = $foodId";
        $result = mysqli_query($connect, $sql);

        if ($result && mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $numFood = $row["num_food"];

            if ($action == "increment") {
                $numFood++;
            } elseif ($action == "decrement" && $numFood > 0) {
                $numFood--;
            }

            // Update the num_food in the database
            $updateSql = "UPDATE cart SET num_food = $numFood WHERE cart_id = $foodId";
            $updateResult = mysqli_query($connect, $updateSql);

            
        }
    }
?>
