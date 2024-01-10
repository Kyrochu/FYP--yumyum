<?php

session_start();

$connect = mysqli_connect("localhost", "root", "", "admin_fyp");

if(isset($_POST['addCAT'])) 
{
    $Name = $_POST['name'];
    $Image = $_FILES['image']['name'];
    $ImageTmp = $_FILES['image']['tmp_name'];

    $path = "category_images/";

    $image_ext = pathinfo($Image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    // Prepare the SQL statement using a prepared statement to prevent SQL injection
    $sql = mysqli_prepare($connect, "INSERT INTO category (cat_name, cat_img) VALUES (?, ?)");

    if ($sql) 
    {
        mysqli_stmt_bind_param($sql, "ss", $Name, $filename);
        $result = mysqli_stmt_execute($sql);

        if ($result) 
        {
            move_uploaded_file($ImageTmp, $path . $filename);
            echo "<script> alert('New Category Added!') </script>";
        } 
        else 
        {
            echo "Error executing SQL statement: " . mysqli_error($connect);
        }

        mysqli_stmt_close($sql);
    } 
    else 
    {
        echo "Error preparing SQL statement: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>