<?php include("connect.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin.css">

    <style>
        tr.scroll
        {
            overflow-y: scroll;
            height: 4rem;
        }
        body
        {
            height: 100vh;
            font-family: sans-serif;
            font-size: 0.88rem;
            user-select: none;
            background: linear-gradient(to right , #B9961D , #5404FF ) ;
            overflow-x: hidden;
        }

        main .admin-photo
        {
            margin-left: 80rem;
            margin-bottom: 4rem;
        }
    </style>
</head>
<body>
    <div class="container">
       <aside >
            <div class="co">
                <div class="top">
                    <div class="logo" >
                        <img src="pic/royal logo.jpg"  >
                        <h2 class="logo-name">Royal Hotal</h2>
                    </div>
                    <div class="close" id="closebtn">
                        <img src="pic/close.png" style="height: 20px; width: 20px;" >
                    </div>
                </div>

                <div class="sidebar" >
                        <a href="admin.php" class="active">
                            <img src="pic/dashboard.png" style="height: 20px; width: 20px;" >
                                <h3 >Dashboard</h3>
                        </a>
                        <a href="package.php" class="activeP">
                            <img src="pic/package.png" style="height: 20px; width: 20px;" >
                                <h3>Room</h3>
                        </a>
                        <a href="stuff.php" class="activeS">
                            <img src="pic/users.png" style="height: 20px; width: 20px;" >
                                <h3>Staff</h3>
                        </a>
                        <a href="customer.php" class="activeC">
                            <img src="pic/users.png" style="height: 20px; width: 20px;" >
                                <h3>Customer</h3>
                        </a>
                        <a href="addPackage.php" class="activeA">
                            <img src="pic/plus.png" style="height: 20px; width: 20px;" >
                                <h3>Add Room</h3>
                        </a>
                        <a href="income.php" class="activeI" >
                            <img src="pic/report.png" style="height: 20px; width: 20px;" >
                                <h3>Income detail</h3>
                        </a>
                        <a href="#">
                            <img src="pic/logout.png" style="height: 20px; width: 20px;" >
                                <h3>Logout</h3>
                        </a>
                </div>
            </div>
       </aside>

    
       <main>
            <h1 class="top-name">Dashboard</h1>

            <div class="admin-photo">
                <img src="pic/admin.png" style="height: 40px; width: 40px;">
                <h3>Hi, Admin</h3>
            </div>

            <!-- start of circle sales-->
            <div class="insights">
                <div class="sales">
                    <img src="pic/data-analysis.png" style="height: 40px; width: 40px;">
                    <div .class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1>RM25,024</h1>
                        </div>
                        
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            
                <!-- end of circle -->
        
                <!-- start of circle Expenses -->
            
                <div class="expenses">
                    <img src="pic/bar-chart.png" style="height: 40px; width: 40px;">
                    <div .class="middle">
                        <div class="left">
                            <h3>Total Expenses</h3>
                            <h1>RM14,160</h1>
                        </div>
                    </div>
                    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            
                <!-- end of circle -->

                <!-- start of circle income-->
            
                <div class="income">
                    <img src="pic/profit.png" style="height: 40px; width: 40px;">
                    <div .class="middle">
                        <div class="left">
                            <h3>Total Income</h3>
                            <h1>RM10,840</h1>
                        </div>
                    </div>
                    
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- end of circle -->
            </div>


            
            <div class="order">
                <h2>Booking Detail</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Customer No</th>
                            <th>Customer Name</th>
                            <th>CUstomer Phone Number</th>
                            <th>Payment</th>
                            <th>Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $result = mysqli_query($connect , " SELECT * from customer  " );
                            $count = mysqli_num_rows($result);


                            if ($count < 1)
                            {
                            ?>
                            <tr>
                                <td colspan="6">No Records Found</td>
                            </tr>

                            <?php
                            }
                            else
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                            ?>			

                                    <tr class="scrool">
                                        <td><?php echo $row["cus_name"]; ?></td>
                                        <td><?php echo $row["user_email"]; ?></td>
                                        <td><?php echo $row["cus_phone"]; ?></td>
                                        <td>Booking</td>
                                    </tr>

                            <?php

                                }
                            }

                        ?>
                    </tbody>
                </table>
                <a href="customer.php" > Show All</a>
            </div>
       </main>

    </div>

    
</body>
</html>


