<?php

session_start();

if(isset($_GET['add_addon']))
{
    $productId = $_GET['pro_id'];
    $selected_category_id = $_GET['cat_id'];

    $a_name = $_GET['addon_name'];
    $a_price = $_GET['addon_price'];

    $connect = mysqli_connect("localhost", "root", "", "yumyum");

    $fetchProductQuery = mysqli_query($connect,"SELECT * FROM menu WHERE food_id='$productId'");
    $productData = mysqli_fetch_assoc($fetchProductQuery);

    $add_query = "INSERT INTO add_on(add_name,add_price,food_id) VALUES ('$a_name','$a_price','$productId') ";
    $add_query_run = mysqli_query($connect,$add_query);

    if($add_query_run)
        {
            echo "<script> alert('New AddOn Added'); window.location.href = 'AddOnSuper.php?pro_id=$productId&cat_id=$selected_category_id'; </script>";

        }
        else
        {
            echo "<script> alert('Failed to Add'); window.location.href = 'AddOnSuper.php?pro_id=$productId&cat_id=$selected_category_id'; </script>";
        }
}

?>