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
                        <a href="HistorySuper.php?id=<?php echo $id; ?>" class="sub-item"> History </a>


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

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Pending Status </h2>

            </div>

            <?php

    $order = "SELECT * FROM `order` ";
    $order_result = mysqli_query($connect,$order);
    $row_order = mysqli_fetch_assoc($order_result);

    $uid = $row_order['user_id'];

    $user = "SELECT * FROM users ";
    $user_result = mysqli_query($connect,$user);
    $row_user = mysqli_fetch_assoc($user_result);

    $grouped_orders = [];

    while ($row_order = mysqli_fetch_assoc($order_result)) 
    {
        $time = $row_order["or_time"];
        $fid = $row_order["food_id"];
        $n_food = $row_order["num_food"];

        $menu = "SELECT * FROM menu WHERE food_id = ?";
        $menu_stmt = $connect->prepare($menu);
        $menu_stmt->bind_param("i", $fid);
        $menu_stmt->execute();
        $menu_result = $menu_stmt->get_result();

        if ($menu_result->num_rows > 0) 
        {
            $row_menu = mysqli_fetch_assoc($menu_result);

            $order_group_key = $row_order["or_time"];

            if (!isset($grouped_orders[$order_group_key])) {
                $grouped_orders[$order_group_key] = [
                    'name' => $row_user["name"],
                    'time' => $row_order["or_time"],
                    'foods' => []
                ];
            }

            $grouped_orders[$order_group_key]['foods'][] = [
                'food_name' => $row_menu["food_name"],
                'food_price' => $row_menu["food_price"],
                'food_num' => $row_order["num_food"],
                // Add other fields you want to display
            ];
        } else 
        {
            echo "No menu items found for food_id: $fid";
        }
    }

    $menu_stmt->close();
?>

            <div class="PendingstatusBox">

                <?php
                foreach ($grouped_orders as $group) 
                {

                ?>

                <div class="Status-container">

                    <div class="cus-info">

                        <h3> Order Number : </h3>
                        <h3> Order Time : <?php echo $group['time']; ?> </h3>
                        <h3> ID : </h3>
                        <h3> Username : <?php echo $group['name']; ?> </h3>
                        <h3> Address : </h3>
                        <h3> Contact Number : </h3>
                        <h3> Orders : </h3>
                        <h3> Total Price : RM </h3>
                        
                    </div>
                    
                    <input type="submit" value="DELIVERED" name="delivered" class="btn">


                </div>

                <?php

                }

                ?>

            </div>

            <div class="menus">

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Delivered Orders </h2>

            </div>

            

            <div class="DeliveredstatusBox">
            
            


            <div class="Status-container">

                <div class="cus-info">

                    <h3> Order Number : </h3>
                    <h3> Order Time :  </h3>
                    <h3> ID : </h3>
                    <h3> Username :  </h3>
                    <h3> Address : </h3>
                    <h3> Contact Number : </h3>
                    <h3> Orders : </h3>
                    <h3> Total Price : RM </h3>
                    
                </div>

            </div>
            
            

           

    </body>

</html>