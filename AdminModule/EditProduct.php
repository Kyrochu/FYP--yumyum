<?php

include('DataConnect.php'); // Include the database connection file

if (!isset($_SESSION['email'])) 
{
    header("location: AdminLogin.php");
    exit(); // Terminate script after redirection
}

$id = isset($_GET['id'])?$_GET['id']:NULL;

?>

<!DOCTYPE html>
<html>
    
    <head>
        <title> YumYum Admin Accounts List </title>
        
        <link rel="stylesheet" href="Admin_Style.css">  <!-- CSS for Admin Page -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Link for Icon Style  -->
        
        <!-- JQuery CDN Link -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>

            $(document).ready(function()
            {
                //JQuery for expanding and collapsing the sidebar

                $('.menu-btn').click(function()
                {
                    $('.side-bar').addClass('active');
                    $('.menu-btn').css("visibility","hidden");

                });

                //Closing button

                $('.close-btn').click(function()
                {
                    $('.side-bar').removeClass('active');
                    $('.menu-btn').css("visibility","visible");
                });

                //Toggle Sub-Menu

                $('.sub-btn').click(function()
                {
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });
            })
        </script>

        <!-- Javascript for Date&Time Widget  -->

        <script src="Date&Time Widget.js" defer> </script>  <!-- defer means script only going to be execute once document is opened --> 
        <script src="AddCategory.js"> </script>
        <script src="EditProduct.js"> </script>
        <script>
    function goToProductSuper() 
    {
        window.location.href = 'ProductSuper.php';
    }
    </script>

    
    </head>

    <body>

        <div class="side-bar">

                <!-- Header Section -->

                <div class="menu">

                    <div class="item"><a href="AdminProfileSuper.php?id=<?php echo $id; ?>"><i class="fab fa-jenkins"></i> <span class="menu-text"> My Profile </span> </a></div>
                    <div class="item"><a href="SuperAdminPanel.php?id=<?php echo $id; ?>"><i class="fas fa-desktop"></i> <span class="menu-text"> Dashboard </span> </a></div>
                    <div class="item"><a class="sub-btn"><i class="fas fa-user"></i> <span class="menu-text"> Accounts </span>
                    
                    <!-- Dropdown List (Accounts)-->
                    <i class="fas fa-angle-right dropdown"> </i>
                    </a>

                        <div class="sub-menu">

                            <a href="SubUserAccSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> User </span> </a>
                            <a href="SubAdminAccSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Admin </span> </a>


                        </div>
                
                
                    </div>
                    
                    
                    <div class="item"><a class="sub-btn"><i class="fa fa-cutlery"></i> <span class="menu-text"> Manage </span>
                    
                    <!-- Dropdown List (Manage)-->
                    <i class="fas fa-angle-right dropdown"> </i>
                    </a>

                        <div class="sub-menu">

                            <a href="MenusSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Menu </span> </a>
                                                    
                        </div>
            
            
                    </div>
                    
                    <div class="item"><a class="sub-btn"><i class="fas fa-book-reader"></i> <span class="menu-text"> Orders </span>
                    
                    <!-- Dropdown List (Orders)-->
                    <i class="fas fa-angle-right dropdown"> </i>
                    </a>

                        <div class="sub-menu">

                            <a href="StatusSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Status </span></a>
                            <a href="HistorySuper.phpid=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> History </span> </a>


                        </div>
            
                    </div>

                    <div class="item"><a href=""><i class="fa fa-commenting"></i> <span class="menu-text"> Reviews </span> </a></div>
                    
                    <div class="item">

                        <div class="logout">
                            <a href="Logout.php"><i class="fas fa-sign-out-alt"> </i> <span class="menu-text"> Logout </span> </a>
                        </div>

                    </div>

                </div>
            </div> 

        <!-- Date & Time Widget -->

        <div class="datetime">

            <div class="main-content">

                <div class="header-title">

                    <span> Admin </span>
                    <h2> Dashboard </h2>

                </div>

            </div>

            <div class="search-box">

                    <i class="fa-solid fa-search"> </i>
                    <input type="text" placeholder="Search">

                </div>

            <div class="date">

                <span id="day"> Day </span>
                <span id="month"> Month </span>
                <span id="daynum"> 00 </span>
                <span id="year"> Year </span>

            </div>

            <div class="time">

                <span id="hour"> 00 </span>:
                <span id="minutes"> 00 </span>:
                <span id="seconds"> 00 </span>
                <span id="period"> AM </span>

            </div>
            
            <div class="EditProduct">

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Edit Product </h2>

            </div> 

            <?php

            if(isset($_GET['editbtn']))
            {
                $selected_category_id = $_GET['cat_id'];
                $productId = $_GET['pro_id'];

                $query = "SELECT * FROM menu WHERE food_id='$productId' ";
                $query_run = mysqli_query($connect,$query);

                foreach($query_run as $row)
                {
            ?>    
            
            <form method="POST" action="" enctype="multipart/form-data"> 

                <input type="hidden" name="product_id" value="<?php echo $row['food_id']?>">
                <input type="hidden" name="current_image" value="<?php echo $row['food_img']?>">

                <div class="form-element">
                    PRODUCT NAME <input type="text" name="name" value="<?php echo $row['food_name']?>">                    
                </div>

                <div class="form-element">
                    PRODUCT PRICE <input type="text" name="price" value="<?php echo $row['food_price']?>">                    
                </div>

                <div class="form-element">
                    PRODUCT DESCRIPTION <input type="text" name="desc" value="<?php echo $row['food_description']?>">                    
                </div>

                <div class="form-element">  
                    IMAGE <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" value="../img/<?php echo $row['food_img']?>">
                </div>

                <div class="form-element">
                    <input type="submit" name="updateProduct" value="UPDATE PRODUCT" class="edit-submit-btn">
                </div>

                <div class="form-element">
                    <input type="button" class="edit-cancel-btn" value="CANCEL" onclick="location.href='ProductSuper.php?cat_type=<?php echo $selected_category_id ?>';">
                </div>
            
            </form>

            <?php 
            
                }
            }

            if(isset($_POST['updateProduct']))
            {
                $Pro_id = $_POST['product_id'];
                $Pro_name = $_POST['name'];
                $Pro_price = $_POST['price'];
                $Pro_desc = $_POST['desc'];
                $productImage = $_FILES['image']['name'];
                $productImageTmp = $_FILES['image']['tmp_name'];
                $currentImage = $_POST['current_image'];

                if (!empty($productImage)) 
                {
                    $uploadPath = '../img/'; 
        
                    // Move the uploaded image to your desired directory
                    move_uploaded_file($productImageTmp, $uploadPath . $productImage);
                } 
                    else 
                {
                    // If no new image is uploaded, use the existing image filename
                    $productImage = $currentImage;
                }
        
                $query = "UPDATE menu SET food_name = '$Pro_name', food_price = '$Pro_price', food_description = '$Pro_desc', food_img = '$productImage' WHERE food_id = $Pro_id";
                $query_run = mysqli_query($connect, $query);
        
                if ($query_run) 
                {
                    if (!empty($productImage)) 
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'], "../img/".$_FILES['image']['name']);
                    }

                    echo "<script>alert('Product Updated'); window.location.href = 'ProductSuper.php?cat_type=$selected_category_id';</script>";
                    sleep(1);
                } 
                else 
                {
                    echo "<script>alert('Failed to update product!'); window.location.href = 'ProductSuper.php?cat_type=$selected_category_id';</script>";
                }
            
            }
            ?>


            

            
        
            
    </body>

</html>