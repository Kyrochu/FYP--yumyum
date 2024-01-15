
<?php
    include("connection_sql.php");

    if (isset($_GET['user_id'])) 
    {
        $uid = $_GET['user_id'];

            $updateQuery = "UPDATE cart SET cart_food_delete = '0' WHERE user_id = $uid";
            mysqli_query($connect, $updateQuery); 

            if (mysqli_query($connect, $updateQuery)) {
                echo "Update successful!";
            } else {
                echo "Error updating record: " . mysqli_error($connect);
            }
    }
?>
