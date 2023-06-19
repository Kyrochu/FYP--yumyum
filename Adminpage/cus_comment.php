<?php include("connect.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Page</title>
    <link rel="stylesheet" href="cus_comment.css">

    <style>
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
                <a href="room.php" class="activeP">
                    <img src="pic/package.png" style="height: 20px; width: 20px;" >
                        <h3>Room</h3>
                </a>
                <a href="staff.php" class="activeS">
                    <img src="pic/users.png" style="height: 20px; width: 20px;" >
                        <h3>Staff</h3>
                </a>
                <a href="customer.php" class="activeC">
                    <img src="pic/users.png" style="height: 20px; width: 20px;" >
                        <h3>Customer</h3>
                </a>
                <a href="addroom.php" class="activeA">
                    <img src="pic/plus.png" style="height: 20px; width: 20px;" >
                        <h3>Add Room</h3>
                </a>
                <a href="cus_comment.php" class="activeI" >
                    <img src="pic/report.png" style="height: 20px; width: 20px;" >
                        <h3>Comment Detail</h3>
                </a>
                <a href="Homepage.php">
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
                    <h2>The Comment Customer</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Comment Details</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php

                            $result = mysqli_query($connect , "SELECT * from comment");
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
                                <td><?php echo $row["name_com"] ?></td>
                                <td><?php echo $row["email_com"] ?></td>
                                <td><?php echo $row["text_com"] ?></td>

                            </tr>
                        <?php
                                }
                            }
                        ?>
                        </tbody>

                    </table>
                </div>
            </div>
       </main>
    </div>