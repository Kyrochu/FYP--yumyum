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
                            <a href="HistorySuper.phpid=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> History </span> </a>


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

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Edit Category </h2>

            </div> 

             <?php

            if(isset($_GET['edit-btn']))
            {
                $CategoryId = $_GET['category_id'];

                $query = "SELECT * FROM category WHERE cat_id='$CategoryId' ";
                $query_run = mysqli_query($connect,$query);

                foreach($query_run as $row)
                {
            ?>

             <form method="POST" action="" enctype="multipart/form-data"> 

                <input type="hidden" name="category_id" value="<?php echo $row['cat_id']?>">
                <input type="hidden" name="current_image" value="<?php echo $row['cat_img']?>">

                <div class="form-Element">
                    Category Name <input type="text" name="name" value="<?php echo $row['cat_name']?>">                    
                </div>

                <div class="form-Element">  
                    Category Image <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
                </div>

                <div class="form-Element">
                    <input type="submit" name="updateCategory" value="UPDATE CATEGORY" class="edit-submit-btn">
                </div>

                <div class="form-Element">
                    <input type="button" class="Edit-cancel-btn" value="CANCEL" onclick="location.href='MenusSuper.php';">
                </div>
            
            </form>

            <?php 
            
                }
            }

            if(isset($_POST['updateCategory']))
            {
                $CatID = $_POST['category_id'];
                $Name = $_POST['name'];
                $Image = $_FILES['image']['name'];
                $ImageTmp = $_FILES['image']['tmp_name'];

                $currentImage = $_POST['current_image'];

                if (!empty($Image)) 
                {
                    $uploadPath = 'category_images/';
                    move_uploaded_file($ImageTmp, $uploadPath . $Image);
                } 
                else 
                {
                    $Image = $currentImage;
                }

                $query = "UPDATE category SET cat_name = '$Name', cat_img = '$Image' WHERE cat_id = $CatID";
                $query_run = mysqli_query($connect, $query);

                if ($query_run) 
                {
                    if (!empty($Image)) 
                    {
                        move_uploaded_file($_FILES['image']['tmp_name'], "../img/".$_FILES['image']['name']);
                    }

                    echo "<script>alert('Category Updated'); window.location.href = 'MenusSuper.php';</script>";
                } 
                else 
                {
                    echo "<script>alert('Failed to update category!'); window.location.href = 'MenusSuper.php';</script>";
                }
            }
            ?>

            
        
            
    </body>

</html>