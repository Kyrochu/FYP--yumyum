<?php

session_start();

if(isset($_GET['add_addon']))
{
    $productId = $_GET['pro_id'];

    $a_name = $_GET['addon_name'];
    $a_price = $_GET['addon_price'];

    $connect = mysqli_connect("localhost", "root", "", "yumyum");

    $fetchProductQuery = mysqli_query($connect,"SELECT * FROM menu WHERE food_id='$productId'");
    $productData = mysqli_fetch_assoc($fetchProductQuery);

    $add_query = "INSERT INTO add_on(add_name,add_price,food_id) VALUES ('$a_name','$a_price','$productId') ";
    $add_query_run = mysqli_query($connect,$add_query);

    if ($add_query_run) 
    {
        echo "<script>
            alert('Addon added successfully.');
            window.location.href ='AddOnSuper.php?addonbtn=1&pro_id=$productId&cat_id={$productData['food_type']}';
        </script>";
        exit();
    } 
    else 
    {
        echo "<script>alert('Failed to add add-on');</script>";
    }

   
}


if (isset($_POST['delete_selected_addons'])) 
{
    $connect = mysqli_connect("localhost", "root", "", "yumyum");

    $productId = $_POST['delete_id'];

    // Ensure the selected addons array is set
    if (isset($_POST['selected_addons']) && is_array($_POST['selected_addons'])) {
        $selectedAddons = $_POST['selected_addons'];

        // Loop through selected addons and delete them
        foreach ($selectedAddons as $addonId) {
            $deleteQuery = "DELETE FROM add_on WHERE add_id = '$addonId' AND food_id = '$productId'";
            $deleteResult = mysqli_query($connect, $deleteQuery);

            // Check for deletion success
            if (!$deleteResult) {
                echo "<script>alert('Failed to delete addon with ID $addonId: " . mysqli_error($connect) . "');</script>";
            }
        }

        echo "<script>
            alert('Add-On(s) deleted successfully');
            window.location.href ='AddOnSuper.php?addonbtn=1&pro_id=$productId&cat_id={$productData['food_type']}';
        </script>";
        exit();
    } else {
        echo "<script>alert('No add-on(s) selected for deletion');</script>";
    }
}

?>