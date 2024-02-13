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

        <!-- Javascript for Date&Time Widget  -->

        <script src="Date&Time Widget.js" defer> </script>  <!-- defer means script only going to be execute once document is opened --> 
        <script src="AddCategory.js"> </script>


    </head>

    <body>

       <div class="side-bar">

                <!-- Header Section -->

                <div class="menu">

                    <div class="item"><a href="AdminProfileSuper.php?id=<?php echo $id; ?>"><i class="fab fa-jenkins"></i> <span class="menu-text"> My Profile </span> </a></div>
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
            
            <div class="AdminProfile">

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Admin's Profile </h2>

            </div>
            
            <div class="editAdminProfile">

                    <?php
                            
                            $name = isset($_GET['name']) ? $_GET['name'] : '';

                            $query = "SELECT * FROM admin_acc WHERE name='$name' ";
                            $query_run = mysqli_query($connect,$query);
                            $row = mysqli_fetch_assoc($query_run); 
                            
                            

                    ?>


                    <form method="GET" action="EditAdminProfileSuper.php?id=<?php echo $id ?>"> 

                        <input type="hidden" name="admin_id" value="<?php echo $row ["id"];?>"> 

                        <div class="edit-form">
                            EMAIL <input type="text" name="email" value="<?php echo $row['email'];?> " readonly>                    
                        </div> 
                        
                        <div class="edit-form">
                            USERNAME <input type="text" name="name" value="<?php echo $row['name'];?> ">                    
                        </div> 

                        <div class="edit-form">
                            ENTER CURRENT PASSWORD <input type="text" name="oldPassword">
                        </div>

                        <div class="edit-form"> 
                            ENTER NEW PASSWORD <input type="text" name="password">
                        </div>

                        <div class="edit-form">
                            CONFIRM PASSWORD <input type="text" name="newPassword">
                        </div>
                        
                        <div class="edit-form">
                            <button  class="edit-submit-btn"> Update Profile </button>
                        </div>

                    </form> 

            </div>

            

        

    </body>

</html>