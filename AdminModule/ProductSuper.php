<?php

include('DataConnect.php');

if(!isset($_SESSION['email']))
{
    header("location:AdminLogin.php");
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
                <a href="">    
                   
                    <img src="admin.png" alt="No Image!">

                </a>

                <h1 style="color:navajowhite"> Welcome,<?php echo $_SESSION['email'] ?> </h1>

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

                        <a href="StatusSuper.php?id=<?php echo $id; ?>" class="sub-item"> Status </a>
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
            
            <div class="menus">

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Products </h2>

            </div> 

            <div class="backbtn">
        
            <form action="MenusSuper.php">
                <button type="submit" style="background:burlywood;margin-top:20px;margin-left:5px;width:250px;height:30px;cursor:pointer;font-weight:bold;border-radius:5px;">
                    BACK
                </button>
            </form>
            
            </div>
            
            <div class="display-products">

            <?php
            
            if (isset($_GET['cat_type'])) 
            {
                $selected_category_id = $_GET['cat_type'];

                $connect = mysqli_connect("localhost", "root", "", "yumyum");

                // Fetch products for the selected category
                $result = mysqli_query($connect, "SELECT * FROM menu WHERE food_type = '$selected_category_id' ");

                if ($result && mysqli_num_rows($result) > 0) 
                {
                    echo "<table class='productTable' border='2' cellspacing='0'>
                            <tr class='headings'>
                                <th>No.</th>
                                <th>Product Name</th>
                                <th>Price (RM)</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>";

                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        // Display product details here for the selected category
                        $productName = $row['food_name'];
                        $productPrice = $row['food_price'];
                        $productDescription = $row['food_description'];
                        $productImage = $row['food_img'];
                        $productId = $row['food_id'];

                        echo "<tr>
                                <td>$productId</td>
                                <td>$productName</td>
                                <td>$productPrice</td>
                                <td>$productDescription</td>
                                <td><img src='../img/$productImage' alt='Product Image' class='img'> </td>
                                <td>
                                    <form action='EditProduct.php' method='GET'>
                                        <input type='hidden' name='cat_id' value='$selected_category_id'>
                                        <input type='hidden' name='pro_id' value='$productId'>
                                        <button type='submit' name='editbtn' class='edit'>EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <button class='dlt' onclick='deleteProduct($productId, $selected_category_id)'>DELETE</button>
                                </td>
                            </tr>";
                    }

                        echo "</table>";
                } 
                else 
                {
                    echo 'No products available for this category.';
                }

}
?>



    </body>

</html>