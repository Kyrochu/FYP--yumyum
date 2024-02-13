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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

        <script>
    function printReceipt(orderDate, orderTime) {
        // Redirect to printReceipt.php with the orderDate and orderTime parameters
        window.location.href = 'printReceipt.php?orderDate=' + orderDate + '&orderTime=' + orderTime;
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

                <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Order History </h2>

            </div>


            <div class="DeliveredstatusBox">

                    <?php

                        $select_orders_query = "SELECT * FROM order_history ORDER BY order_date";
                        $result_orders_query = mysqli_query($connect, $select_orders_query);

                        // Initialize an array to hold the data
                        $orders_list = [];

                        // Loop through the fetched data and organize it into an array
                        while ($row_orders_data = mysqli_fetch_assoc($result_orders_query)) {
                            $orderDateTime = $row_orders_data['order_date'];

                            $order_date_r = date('Y-m-d', strtotime($orderDateTime)); 
                            $order_time_r = date('H:i:s', strtotime($orderDateTime));

                            // Create a unique key combining date and time
                            $order_key = $order_date_r . '_' . $order_time_r;

                            // Add the data to the array
                            $orders_list[$order_key][] = $row_orders_data;
                        }
                    ?>
                                
                                
                    <?php foreach ($orders_list as $order_key => $order_details) : ?>
                        <div class="OrderHistory">
                            <div class="Status-container">
                                <div class="cus-info">

                                    <h2> Customer Info </h2>

                                    <?php
                                    // Extract date and time from the key
                                    list($order_date_r, $order_time_r) = explode('_', $order_key);
                                    ?>
                                    <h3>Order Date: <?php echo $order_date_r; ?></h3>
                                    <h3>Order Time: <?php echo $order_time_r; ?></h3>
                                    <!-- dispaly name and num -->
                                    <?php if (!empty($order_details)) : ?>
                                        <h3>Username: <?php echo $order_details[0]['username']; ?></h3>
                                        <h3>Contact Number: <?php echo $order_details[0]['contact_number']; ?></h3>
                                        <h3>Address: </h3>
                                        <h3> <?php echo $order_details[0]['address'];?>, <?php echo $order_details[0]['city']; ?>, <?php echo $order_details[0]['state']; ?>, <?php echo $order_details[0]['postcode']; ?>, </h3>
                                    <?php endif; ?>
                                    <hr>
                                    
                                    <!-- Iterate over the orders for this date and time -->

                                    <div class="food-ordered">
                                        <h2> Food ordered </h2>

                                        <?php 
                                        $total_price = 0;
                                        foreach ($order_details as $single_order) : 
                                            $total_price += $single_order['total_price'];
                                        ?>
                                            <h3 class="card-text"> <?php echo $single_order['food_name']; ?> - <?php echo ($single_order['add_on_name'] != null) ? $single_order['add_on_name'] : 'No AddOn'; ?> </h3>
                                            <h3 class="card-text">Quantity: <?php echo $single_order['quantity']; ?> - Price: RM <?php echo number_format($single_order["total_price"], 2); ?> </h3>
                                            <br>
                                        <?php endforeach; ?>

                                        <!-- Display the total price -->
                                        <h3 class="card-text">Total Price: RM <?php echo number_format($total_price, 2); ?></h3>
                                    </div>
                                    

                                </div>

                                <input type="button" value="PRINT RECEIPT" name="delivered" class="btn" onclick="printReceipt('<?php echo urlencode($order_date_r); ?>', '<?php echo urlencode($order_time_r); ?>')">
                                    
                            </div>
                        </div>
                    <?php endforeach; ?>

            
            </div>

            

    </body>

</html>