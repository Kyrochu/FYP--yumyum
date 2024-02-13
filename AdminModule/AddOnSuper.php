<?php

include('DataConnect.php'); // Include the database connection file

if (!isset($_SESSION['email'])) 
{
    header("location: AdminLogin.php");
    exit(); // Terminate script after redirection
}

$id = isset($_GET['id'])?$_GET['id']:NULL;
$CatType = isset($_GET['cat_id'])?$_GET['cat_id']:NULL;

?>

<!DOCTYPE html>
<html>
    
    <head>
        <title> Add-On </title>
        
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

        <script>
            function validateDecimalInput(input) 
            {
                // Remove any non-digit and non-dot characters
                input.value = input.value.replace(/[^0-9.]/g, '');

                // Ensure only one dot is allowed
                input.value = input.value.replace(/(\..*)\./g, '$1');

                // Ensure up to two decimal places without leading zeros
                var parts = input.value.split('.');
                if (parts.length > 1) {
                    parts[1] = parts[1].slice(0, 2); // Take only up to two decimal places
                    input.value = parts.join('.');
                }
            }
        </script>

    
    </head>

    <body>

        <div class="side-bar">

                <!-- Header Section -->

                <div class="menu">

                    <div class="item"><a href="SuperAdminPanel.php?id=<?php echo $id; ?>"><i class="fas fa-desktop"></i> <span class="menu-text"> Dashboard </span> </a></div>
                    <div class="item"><a class="sub-btn"><i class="fas fa-user"></i> <span class="menu-text"> Accounts </span>
                    
                    <!-- Dropdown List (Accounts)-->
                    <i class="fas fa-angle-right dropdown" id="menu-icon"> </i>
                    </a>

                        <div class="sub-menu">

                            <a href="SubUserAccSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> User </span> </a>
                            <a href="SubAdminAccSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Admin </span> </a>


                        </div>
                
                
                    </div>
                    
                    
                    <div class="item"><a class="sub-btn"><i class="fa fa-cutlery"></i> <span class="menu-text"> Manage </span>
                    
                    <!-- Dropdown List (Manage)-->
                    <i class="fas fa-angle-right dropdown" id="menu-icon"> </i>
                    </a>

                        <div class="sub-menu">

                            <a href="MenusSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Menu </span> </a>
                                                    
                        </div>
            
            
                    </div>
                    
                    <div class="item"><a class="sub-btn"><i class="fas fa-book-reader"></i> <span class="menu-text"> Orders </span>
                    
                    <!-- Dropdown List (Orders)-->
                    <i class="fas fa-angle-right dropdown" id="menu-icon"> </i>
                    </a>

                        <div class="sub-menu">

                            <a href="StatusSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Status </span></a>
                            <a href="HistorySuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> History </span> </a>


                        </div>
            
                    </div>
                    
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

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Manage Add-On </h2>

            </div> 
            
            <a href="ProductSuper.php?cat_type=<?php echo $CatType ?>" class="button-link"> BACK </a>

            <div class="products-container">

                <div class="products">

                <?php 
                    if(isset($_GET['addonbtn'])) 
                    {
                        $productId = $_GET['pro_id'];   
                        $selected_category_id = $_GET['cat_id'];

                        $query = "SELECT * FROM menu WHERE food_id='$productId'";
                        $query_run = mysqli_query($connect, $query);
                        $row = mysqli_fetch_assoc($query_run);

                        $selected_addon = "SELECT * FROM add_on WHERE food_id='$productId' ";
                        $selected_addon_run = mysqli_query($connect, $selected_addon);

                        $food_name = $row['food_name'];
                        $food_img = $row['food_img'];
                        echo "<h2 class='food-name'> Item Name: $food_name</h2>";
                        echo "<img src='../img/$food_img' alt='Product Image' class='addonimg'>";

                        ?>
                       <div class="Addon-itmes">
                            <h2>Add-On Items</h2>

                            <form action="AddOn.php" method="POST">
                                <input type="hidden" name="cat_id" value="<?php echo $selected_category_id; ?>">
                                <input type="hidden" name="pro_id" value="<?php echo $productId; ?>">

                                <?php
                                foreach ($selected_addon_run as $ROW) {
                                    $a_id = $ROW['add_id'];
                                    $a_name = $ROW['add_name'];
                                    $a_price = $ROW['add_price'];

                                    echo "<div class='addon-item'>";
                                    echo "<span class='addon-name'> - $a_name</span>";
                                    echo "<span class='addon-price'> RM " . number_format($a_price, 2) . "</span>";
                                    echo "<input type='checkbox' class ='checkBOX' name='selected_addons[]' value='$a_id'>";
                                    echo "</div>";
                                }
                                ?>

                                <input type='hidden' name='delete_id' value='<?php echo $productId; ?>'>
                                <input type="submit" value="Delete Selected Addons" name="delete_selected_addons" class="delete-addon-btn">
                                
                            </form>

                        </div>


                <div class="addon-form">
                    <h2>Add New Add-On Item</h2>

                    <form action="AddOn.php" method="GET">
                        <!-- Include input fields for addon details -->
                        <label for="addon-name">Add-On Name:</label>
                        <input type="text" class="addname" name="addon_name" required>

                        <label for="addon-price">Add-On Price (RM):</label>
                        <input type="text" class="addprice" name="addon_price" oninput="validateDecimalInput(this)" required>

                        <input type='hidden' name='cat_id' value="<?php echo $selected_category_id; ?>" >
                        <input type="hidden" name="pro_id" value="<?php echo $productId; ?>">
                        <input type="submit" value="Add Add-On" name="add_addon" class="addonbtn">
                    </form>

                </div>
            </div>
            <?php

                    }
                ?>

            

            
 
    </body>

</html>