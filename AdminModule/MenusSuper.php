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
        <title> YumYum Menu List </title>
        
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

        <!-- Javascript  -->

        <script src="Date&Time Widget.js" defer> </script>  <!-- defer means script only going to be execute once document is opened --> 
        <script src="AddCategory.js"> </script>

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

        <!-- Menu Button -->
        <div class="first-layer">
        
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
                            <a href="HistorySuper.phpid=<?php echo $id; ?>" class="sub-item"> History </a>


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

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Menu </h2>

            </div>

            <div class="addCatbtn">

                <button style="background:burlywood; margin-top:20px; margin-left:5px; width:250px; height:30px; cursor:pointer; font-weight:bold; border-radius:5px;" onmouseover="this.style.background='sandybrown'" onmouseout="this.style.background='burlywood'">
                    ADD NEW CATEGORY
                </button>

            </div>

            <div class="popup">
                
                <div class="form">

                    <h2 class="AddAdminTitle"> ADD NEW CATEGORY </h2>
                    
                    <form method="post" action="" enctype="multipart/form-data"> 
                        
                        <div class="form-element">
                            Name <input type="text" name="name" required placeholder="Enter New Category Name (e.g., Appetizers, Main Courses)">                    
                        </div>

                        <div class="form-element">
                            Custom Label <input type="text" name="type" required placeholder="Enter Custom Label (e.g., Food, Beverages, Desserts)">                    
                        </div>

                        <div class="form-element">
                            Category Image <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                        </div>

                        <div class="form-element">
                            <input type="submit" name="addCAT" value="ADD NEW CATEGORY" class="form-btn">
                        </div>

                        <div class="form-element">
                            <button class="cancel-btn"> CANCEL </button>
                        </div>

                    </form>

                </div>
            </div>

            <?php

                // Check if form is submitted
            if(isset($_POST['addCAT'])) 
            {
                $Name = $_POST['name'];
                $Type = $_POST['type']; 
                $Image = $_FILES['image']['name'];
                $ImageTmp = $_FILES['image']['tmp_name'];

                $path = "category_images/";

                $image_ext = pathinfo($Image, PATHINFO_EXTENSION);
                $filename = time() . '.' . $image_ext;

                // Prepare the SQL statement using a prepared statement to prevent SQL injection
                $sql = mysqli_prepare($connect, "INSERT INTO category (cat_name, cat_img ,cat_type) VALUES (?, ?, ?)");

                if ($sql) 
                {

                    mysqli_stmt_bind_param($sql, "sss", $Name, $filename, $Type);
                    $result = mysqli_stmt_execute($sql);

                    if ($result) 
                    {
                        move_uploaded_file($ImageTmp, $path . $filename);
                        echo "<script>alert('New Category Added!')</script>";
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


            <div class="add-products">

                <form action="AddproductSuper.php" method="POST" enctype="multipart/form-data">
                    <h3>ADD PRODUCT</h3>


                        <label for="name" class="label">Product Name</label>
                        <input type="text" required placeholder="e.g., Delicious Pizza" name="name" maxlength="100" class="box">


                        <div class="form-group">

                        <label for="price" class="label">Product Price</label>
                        <input type="text" required placeholder="e.g., 15.99" name="price" oninput="validateDecimalInput(this)" class="box">

                        </div>

                        <div class="form-group">

                        <label for="desc" class="label">Product Description</label>
                        <input type="text" required placeholder="e.g., Mouth-watering pizza topped with fresh ingredients" name="desc" class="box">

                        </div>

                        <div class="form-group">

                        <label for="category" class="label">Select Category</label>
                        <select name="category" class="box" required>
                            <option value="" disabled selected>SELECT CATEGORY --</option>
                            <?php
                                 $connect = mysqli_connect("localhost", "root", "", "yumyum");

                                $fetchCategoriesQuery = mysqli_query($connect, "SELECT * FROM category");

                                if ($fetchCategoriesQuery && mysqli_num_rows($fetchCategoriesQuery) > 0) 
                                {
                                    while ($categoryData = mysqli_fetch_assoc($fetchCategoriesQuery)) 
                                    {
                                        echo '<option value="' . $categoryData['cat_type'] . '">' . $categoryData['cat_type'] . '</option>';
                                    }
                                }
            ?>
                        </select>

                        </div>

                        <div class="form-group">

                        <label for="image" class="label">Upload Image</label>
                        <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" required>

                        </div>

                        <input type="submit" value="ADD PRODUCT" name="add_product" class="btn">
                </form>

            </div>

            <div class="DisplayCat">

            <?php
                
                $connect = mysqli_connect("localhost", "root", "", "yumyum");

                $fetchCategoriesQuery = mysqli_query($connect, "SELECT * FROM category");

                if ($fetchCategoriesQuery && mysqli_num_rows($fetchCategoriesQuery) > 0) 
                {   
                    while ($categoryData = mysqli_fetch_assoc($fetchCategoriesQuery)) 
                    {
                        echo '<div class="Cat-container">';
                        
                        echo '<a href="ProductSuper.php?cat_type=' . $categoryData['cat_type'] . '" class="cat_link"> ';
                        echo '<img src="category_images/' . $categoryData['cat_img'] . '" class="cat_img">';
                        echo '</a>';
                        echo '<h3>' . $categoryData['cat_name'] . '</h3>';

                        echo '<form method="post">';
                        echo '<input type="hidden" name="category_id" value="' . $categoryData['cat_id'] . '">';
                        echo '<button type="submit" name="edit-btn" class="edit">Edit</button>';
                        echo '</form>';

                        echo '<form method="post" onsubmit="return confirm(\'Are you sure you want to delete this category?\');">';
                        echo '<input type="hidden" name="category_id" value="' . $categoryData['cat_id'] . '">';
                        echo '<button type="submit" name="dlt-btn" class="dlt">Delete</button>';
                        echo '</form>';
                        
                        echo '</div>';
                    }
                }

                if(isset($_POST['dlt-btn']))
                {
                    $deleteCategoryID = $_POST['category_id'];

                    $deleteQuery = "DELETE FROM category WHERE cat_id='$deleteCategoryID' ";
                    $deleteResult = mysqli_query($connect,$deleteQuery);

                    if ($deleteResult) 
                    {
                        echo "<script>alert('Category deleted successfully.'); window.location.href = 'MenusSuper.php';</script>";
                    } else 
                    {
                        echo "<script>alert('Failed to delete category.'); window.location.href = 'MenusSuper.php';</script>";
                    }
                }
                
            ?>

            </div>

            

      

        

    </body>

</html>