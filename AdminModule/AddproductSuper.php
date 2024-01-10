<?php

session_start();

//  if(isset($_POST['add_product'])) 
//  {
//      $productName = $_POST['name'];
//      $productPrice = $_POST['price'];
//      $productDesc = $_POST['desc'];
//      $category = $_POST['category'];
//      $productImage = $_FILES['image']['name'];
//      $productImageTmp = $_FILES['image']['tmp_name'];

//      $path = "product_images/";

//      $image_ext = pathinfo($productImage, PATHINFO_EXTENSION);
//      $filename = time() . '.' . $image_ext;

//      $connect = mysqli_connect("localhost", "root", "", "admin_fyp");

//      $fetchCategoryQuery = mysqli_query($connect, "SELECT cat_id FROM category WHERE cat_name = '$category'");
//      $categoryData = mysqli_fetch_assoc($fetchCategoryQuery);
//      $categoryId = $categoryData['cat_id'];

//      $sql = mysqli_prepare($connect, "INSERT INTO products (pro_name, pro_price, pro_desc, cat_id, pro_img) VALUES ('$productName','$productPrice','$productDesc','$category', ?)");

//      if ($sql) 
//      {
//          mysqli_stmt_bind_param($sql, "sssss", $productName, $productPrice, $productDesc, $categoryId, $filename);
//          $result = mysqli_stmt_execute($sql);

//          if ($result) 
//         {
//             move_uploaded_file($productImageTmp, $path . $filename);
//             echo "<script>alert('New Product Added!');
//                 window.location.href = 'MenusSuper.php';</script>";
//         } 
//         else 
//         {
//             echo "Error executing SQL statement: " . mysqli_error($connect);
//         }

//          mysqli_stmt_close($sql);
//      } 
//      else 
//      {
//          echo "Error preparing SQL statement: " . mysqli_error($connect);
//      }

//      mysqli_close($connect);
//  }

if(isset($_POST['add_product'])) 
{
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productDesc = $_POST['desc'];
    $category = $_POST['category'];
    $productImage = $_FILES['image']['name'];

    if(file_exists("product_images/" . $_FILES['image']['name']))
    {
        $Store = $_FILES['image']['name'];
        echo "<script> alert('Image already exists!) </script>";
        header('Locaton:MenusSuper.php');
    }
    else
    {
        $fetchCategoryQuery = mysqli_query($connect, "SELECT cat_id FROM category WHERE cat_name = '$category'");
        $categoryData = mysqli_fetch_assoc($fetchCategoryQuery);
        $categoryId = $categoryData['cat_id'];

        $query ="INSERT INTO products (pro_name, pro_price, pro_desc, cat_id, pro_img) VALUES ('$productName','$productPrice','$productDesc','$category', '$productImage')";
        $query_run = mysqli_query($connect,$query);

        if($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'],"product_images/".$_FILES['image']['name']);
            echo "<script> alert('New Product Added!') </script>";
        }
        else
        {
            echo "<script> alert('Failed to add new product!') </script>";
        }
    }
}


 
?>