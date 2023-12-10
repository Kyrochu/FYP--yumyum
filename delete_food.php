<?php
include("connection_sql.php");


if ($_SERVER["REQUEST_METHOD"] === "POST") 
{

    if (isset($_POST["delete_item"])) 
    {
        $cart_id = $_POST["cart_id"];

        $delete_query = "DELETE FROM cart WHERE cart_id=?";
        $stmt = mysqli_prepare($connect, $delete_query);
        
        mysqli_stmt_bind_param($stmt, "i", $cart_id);
        $result = mysqli_stmt_execute($stmt);

        
    } 
  
}


?>
