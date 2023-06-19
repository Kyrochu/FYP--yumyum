<?php include("connect.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Page</title>
    <link rel="stylesheet" href="customer.css">
    <style>
        .deletebtn
        {
            border: 0;
            color: red;

        }

        .deletebtn:hover
        {
            cursor: pointer;
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
        }
    </style>

</head>
<body>
    <div class="container">
        <aside >
            <div class="top">
                <div class="logo" >
                    <img src="pic/royal logo.jpg"  >
                    <h2 class="logo-name">Royal Hotal</h2>
                </div>
                <div class="close" id="closebtn">
                    <img src="pic/close.png" style="height: 20px; width: 20px;" >
                </div>
            </div>

            <div class="sidebar">
                <a href="admin.php" class="active">
                    <img src="pic/dashboard.png" style="height: 20px; width: 20px;" >
                        <h3>Dashborad</h3>
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
       </aside>

       <main>
        <h1></h1>
        <div class="admin-photo">
            <img src="pic/admin.png" style="height: 40px; width: 40px;">
            <h3>Hi,Admin</h3>
        </div>
        <div class="package">

            <div class="booking">
                <h2>Customer Detail</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Booking</th>
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

                                    <tr>
                                        <td><?php echo $row["cus_name"]; ?></td>
                                        <td><?php echo $row["user_email"]; ?></td>
                                        <td><?php echo $row["cus_phone"]; ?></td>
                                        <td>Booking</td>
                                        <td>
                                            <input class="deletebtn" type="submit" name="delete" value="Delete">
                                        </td>
                                    </tr>
                            
                    <?php
                            
                                }
                            }

                    ?>
                            
                    </tbody>
                </table>
            </div>

            <div class="add">
                <table>
                    <thead>
                        <h2 style="margin-bottom :2rem; ">Update Customer Details</h2>
                        <tr>
                            <th>Customer No</th>
                            <th>Customer Name</th>
                            <th>Phone</th>
                            <th>Package</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>number id</td>
                            <td>
                                <input type="text" name="package_name" class="name" placeholder="Customer Name">
                            </td>
                            <td>
                                <input type="text" name="package_price" class="name" placeholder="Customer Phone">
                            </td>
                            <td>
                                <input type="text" name="package_type" class="name" placeholder="Package Type">
                            </td>
                            <td>
                                <a href="" class="delete">Save</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>

    </body>
</body>
</html>