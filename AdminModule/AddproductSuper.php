<?php

session_start();

if(isset($_POST['add_product'])) 
{
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productDesc = $_POST['desc'];
    $category = $_POST['category'];
    $productImage = $_FILES['image']['name'];
    
    $connect = mysqli_connect("localhost", "root", "", "yumyum");

    if(file_exists("../img/" . $_FILES['image']['name']))
    {
        $Store = $_FILES['image']['name'];
        echo "<script> alert('Image already exists!) </script>";
        header('Locaton:MenusSuper.php');
    }
    else
    {
        $fetchCategoryQuery = mysqli_query($connect, "SELECT * FROM category WHERE cat_type = '$category'");
        $categoryData = mysqli_fetch_assoc($fetchCategoryQuery);
        $categoryId = $categoryData['cat_type'];

        $query ="INSERT INTO menu (food_name, food_price, food_description, food_type, food_img) VALUES ('$productName','$productPrice','$productDesc','$categoryId', '$productImage')";
        $query_run = mysqli_query($connect,$query);

        if($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'],"../img/".$_FILES['image']['name']);
            echo "<script> alert('New Product Added!'); window.location.href = 'MenusSuper.php'; </script>";
        }
        else
        {
            echo "<script> alert('Failed to add new product!'); window.location.href = 'MenusSuper.php'; </script>";
        }
    }
}


 
?>