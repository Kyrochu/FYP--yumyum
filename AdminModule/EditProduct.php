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

        <!-- Menu Button -->

        <div class="menu-btn">

            <i class="fas fa-bars"></i>

        </div>
        
        <div class="side-bar">

            <!-- Header Section -->

            <header>

                <div class="close-btn">
                    
                    <i class="fas fa-times"> </i>
                
                </div>
                <a href="Admin.html">    
                   
                    <img src="admin.png" alt="No Image!">

                </a>

                <h1 style="color:navajowhite"> Welcome, <?php echo $_SESSION['email'] ?> </h1>

            </header>

            <div class="menu">

                <div class="item"><a href="AdminProfileSuper.php?id=<?php echo $id; ?>"><i class="fab fa-jenkins"></i> My Profile </a></div>
                <div class="item"><a href="SuperAdminPanel.php?id=<?php echo $id; ?>"><i class="fas fa-desktop"></i> Dashboard </a></div>
                <div class="item"><a class="sub-btn"><i class="fas fa-user"></i> Accounts
                
                <!-- Dropdown List (Accounts)-->
                <i class="fas fa-angle-right dropdown"> </i>
                </a>

                    <div class="sub-menu">

                        <a href="SubUserAccSuper.php?id=<?php echo $id; ?>" class="sub-item"> User </a>
                        <a href="SubAdminAccSuper.php?id=<?php echo $id; ?>" class="sub-item"> Admin </a>


                    </div>
            
            
                </div>
                
                
                <div class="item"><a class="sub-btn"><i class="fa fa-cutlery"></i> Manage 
                
                <!-- Dropdown List (Manage)-->
                <i class="fas fa-angle-right dropdown"> </i>
                </a>

                    <div class="sub-menu">

                        <a href="MenusSuper.php?id=<?php echo $id; ?>" class="sub-item"> Menu </a>
                        
                    </div>
        
        
                </div>
                
                <div class="item"><a class="sub-btn"><i class="fas fa-book-reader"></i> Orders 
                
                <!-- Dropdown List (Orders)-->
                <i class="fas fa-angle-right dropdown"> </i>
                </a>

                    <div class="sub-menu">

                        <a href="" class="sub-item"> Status </a>
                        <a href="" class="sub-item"> History </a>


                    </div>
        
                </div>

                <div class="item"><a href=""><i class="fa fa-commenting"></i> Reviews </a></div>
                
                <div class="item">

                    <div class="logout">
                        <a href="Logout.php"><i class="fas fa-sign-out-alt"> </i> Logout </a>
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
            
            <form method="GET" action="" enctype="multipart/form-data"> 

                <input type="hidden" name="product_id" value="<?php echo $row['food_id']?>">


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
                    IMAGE <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" value="<?php echo $row['food_img']?>">
                </div>

                <div class="form-element">
                    <input type="submit" name="updateProduct" value="UPDATE PRODUCT" class="edit-submit-btn">
                </div>

                <div class="form-element">
                    <input type="button" class="edit-cancel-btn" value="CANCEL" onclick="location.href='MenusSuper.php';">
                </div>
            
            </form>

            <?php
            
                }
            }

            if(isset($_GET['updateProduct']))
            {
                $Pro_id = $_GET['product_id'];
                $Pro_name = $_GET['name'];
                $Pro_price = $_GET['price'];
                $Pro_desc = $_GET['desc'];
                $productImage = $_FILES['image']['name'];
                $productImageTmp = $_FILES['image']['tmp_name'];

                $query = "UPDATE menu SET food_name = '$Pro_name',food_price = '$Pro_price' , food_description = '$Pro_desc' WHERE food_id =$Pro_id ";
                $query_run = mysqli_query($connect,$query);

                if($query_run)
                {
                    echo "<script>alert('Product Updated');
                    window.location.href = 'ProductSuper.php';</script>";// Redirect to ProductSuper.php after successful update
                    exit(); // Ensure script execution stops after redirection
                }
                else
                {
                    // Handle the case if the update query fails
                    echo "<script>alert('Failed to update product!');
                    window.location.href = 'ProductSuper.php';</script>";
                }

            }


            ?>


            

            
        
            
    </body>

</html>