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
        <script src="ViewOrderDetails.js"> </script>


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
            
            <div class="menus">

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Pending Status </h2>

            </div>

            <?php

                $user = "SELECT * FROM users";
                $user_result = mysqli_query($connect, $user);
                $row_user = mysqli_fetch_assoc($user_result);

                $order = "SELECT * FROM `order` ORDER BY or_time desc";
                $order_stmt = $connect->prepare($order);
                $order_stmt->execute();
                $order_result = $order_stmt->get_result();

                // Check if there are rows in the order result
                if ($order_result->num_rows > 0) {
                    $grouped_orders = [];

                    while ($row_order = mysqli_fetch_assoc($order_result)) {
                        $time = $row_order["or_time"];
                        $fid = $row_order["food_id"];
                        $n_food = $row_order["num_food"];

                        $menu = "SELECT * FROM menu WHERE food_id = ?";
                        $menu_stmt = $connect->prepare($menu);
                        $menu_stmt->bind_param("i", $fid);
                        $menu_stmt->execute();
                        $menu_result = $menu_stmt->get_result();

                        if ($menu_result->num_rows > 0) {
                            $row_menu = mysqli_fetch_assoc($menu_result);
                
                            // Fetch add-on details based on food_id (assuming add_id is from the menu table)
                            $add_on_query = "SELECT * FROM add_on WHERE add_id = ?";
                            $add_on_stmt = $connect->prepare($add_on_query);
                            $add_on_stmt->bind_param("i", $fid);
                            $add_on_stmt->execute();
                            $add_on_result = $add_on_stmt->get_result();
                
                            if ($add_on_result->num_rows > 0) {
                                $row_addon = mysqli_fetch_assoc($add_on_result);
                                $add_on_name = $row_addon['add_name'];
                                $add_on_price = $row_addon['add_price'];
                            } else {
                                // No add-on found
                                $add_on_name = "No Add-on";
                                $add_on_price = 0;
                            }
                
                            // Group orders by time
                            $order_group_key = $row_order["or_time"];
                            if (!isset($grouped_orders[$order_group_key])) {
                                $grouped_orders[$order_group_key] = [
                                    'name' => $row_user["name"],
                                    'uid' => $row_order["user_id"],
                                    'time' => $row_order["or_time"],
                                    'foods' => []
                                ];
                            }
                
                            // Add menu item with add-on details to the grouped orders
                            $grouped_orders[$order_group_key]['foods'][] = [
                                'food_name' => $row_menu["food_name"],
                                'food_price' => $row_menu["food_price"] + $add_on_price,
                                'food_num' => $row_order["num_food"],
                                'add_on_name' => $add_on_name,
                                'add_on_price' => $add_on_price
                            ];
                        } else {
                            echo "No menu items found for food_id: $fid";
                        }
                    }

                    $order_stmt->close();
                    $menu_stmt->close();
                    $add_on_stmt->close();

                    // Display the grouped orders if any
                    if (!empty($grouped_orders)) 
                    {
                        foreach ($grouped_orders as $group) 
                        {
                            $total = 0;

                            if (isset($group['time'])) 
                            {
                                $datetime = $group['time'];
                
                                // Extract date and time parts
                                $date = date('Y-m-d', strtotime($datetime));
                                $time = date('H:i:s', strtotime($datetime));
                            } 
                            else 
                            {
                                echo "wrong";
                            }
                    ?>
                            <div class="PendingstatusBox">
                                
                                <div class="Status-container">
                                    
                                    <div class="cus-info">
                                        
                                        <h3> Order Number : </h3>
                                        <?php

                                        // Fetch user details based on 'uid' from 'user' table
                                        $user_query = "SELECT * FROM users WHERE id = ?";
                                        $user_stmt = $connect->prepare($user_query);
                                        $user_stmt->bind_param("i", $group['uid']);
                                        $user_stmt->execute();
                                        $user_result = $user_stmt->get_result();
                
                                        if ($user_result->num_rows > 0) 
                                        {
                                            $row_user = mysqli_fetch_assoc($user_result);
                                            ?>
                                            <h3> Order Date : <?php echo $date; ?></h3>
                                            <h3> Order Time :<?php echo $time; ?> </h3>
                                            <h3> Username : <?php echo $row_user['name']; ?> </h3>
                                            <?php
                                        } 
                                        else 
                                        {
                                            echo "User not found for user_id: " . $group['uid'];
                                        }
                                        
                                        $user_stmt->close();
                                        ?>
                                        
                                        <h3> Contact Number : <?php echo $row_user['contact_number']; ?> </h3>
                                        
                                        <div class="popup">
                                            
                                            <div class="food-ordered-box">
                                                <?php
                                                foreach ($group['foods'] as $food) 
                                                {

                                                    $food_total_price = ($food["food_price"] + $food["add_on_price"]) * $food["food_num"];

                                                ?>
                                                    <h3 class="card-text"><?php echo $food["food_name"]; ?> - <?php echo $food["add_on_name"]; ?> </h3>
                                                    <h3 class="card-text"> Quantity: <?php echo $food["food_num"]; ?> - Price: <?php echo number_format($food["food_price"], 2); ?> </h3>
                                                    <br>
                                                    <br>
                                                    
                                                    <?php
                                                    $total += $food_total_price; 
                                                }
                                                    ?>
                                                
                                                <h3 class="card-text">Total Price: RM<?php echo number_format($total, 2); ?></h3>
                                            </div>
                                            
                                            <div class="form-element">
                                                <button class="cancel-btn"> CANCEL </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" value="VIEW ORDER DETAILS" name="delivered" class="vieworder">
                                    <?php
                                    ?>
                                    <form method="POST" >
                                        <input type="submit" value="DELIVERED" name="delivered" class="btn">
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>

            <div class="menus">

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Delivered Orders </h2>

            </div>


            <div class="DeliveredstatusBox">

            <?php
                // Fetch data from the order_history table
                $select_query = "SELECT * FROM order_history ORDER BY order_date, order_time";
                $result = mysqli_query($connect, $select_query);

                // Initialize an array to hold the data
                $orders = [];

                // Loop through the fetched data and organize it into an array
                while ($row = mysqli_fetch_assoc($result)) {
                    $order_date = $row['order_date'];
                    $order_time = $row['order_time'];


                    // Add the data to the array
                    $orders[$order_date][$order_time][] = $row;
                }
            ?>
            
            
            <?php foreach ($orders as $date => $times) : ?>
                <?php foreach ($times as $time => $order_details) : ?>
                    <div class="PendingstatusBox">
                        <div class="Status-container">
                            <div class="cus-info">
                                <h3>Order Date: <?php echo $date; ?></h3>
                                <h3>Order Time: <?php echo $time; ?></h3>
                                <h3>User Name: <?php echo $order_details[0]['username']; ?></h3>
                                <h3> Contact Number : <?php echo $order_details[0]['contact_number']; ?> </h3>
                                <!-- Continue with your HTML layout -->
                                <div class="popup">
                                    <div class="food-ordered-box">
                                        <!-- Iterate over the orders for this date and time -->
                                        <?php foreach ($order_details as $order) : ?>
                                            <h3 class="card-text"><?php echo $order['food_name']; ?> - <?php echo $order['add_on_name']; ?></h3>
                                            <h3 class="card-text">Quantity: <?php echo $order['quantity']; ?></h3>
                                            <!-- Continue displaying other details -->
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- Add the rest of your HTML structure -->
                                    <div class="form-element">
                                        <button class="cancel-btn">CANCEL</button>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="VIEW ORDER DETAILS" name="delivered" class="vieworder">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            
            

    

        <?php
            if (isset($_POST['delivered'])) {
                $insert_query = "INSERT INTO order_history (order_number, order_date, order_time, username, contact_number, food_name, add_on_name, add_on_price, quantity, price, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
                $insert_stmt = $connect->prepare($insert_query);
        
                foreach ($group['foods'] as $food) {
                    $order_number = ''; // Set your order number here, if available
                    $order_date = $date;
                    $order_time = $time;
                    $username = $row_user['name'];
                    $contact_number = $row_user['contact_number'];
                    $food_name = $food["food_name"];
                    $add_on_name = $food["add_on_name"];
                    $add_on_price = $food["add_on_price"];
                    $quantity = $food["food_num"];
                    $price = $food["food_price"];
                    
                    $total_price = $price  * $quantity;

                    $insert_stmt->bind_param("issssssdidd", $order_number, $order_date, $order_time, $username, $contact_number, $food_name, $add_on_name, $add_on_price, $quantity, $price, $total_price);
                    $insert_stmt->execute();
                }
        
                $insert_stmt->close();
            }
        ?>


    </body>

</html>