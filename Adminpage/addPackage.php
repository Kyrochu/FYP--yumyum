<?php include("connect.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room Page</title>
    <link rel="stylesheet" href="addPackage.css">

    <style>
        .save
        {
            border: 0;
            background: transparent;
            color: green;
            text-align: center;
            display: block;
            margin: 1rem auto;
        }

        .save:hover
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
                <h2>Package Detail</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>Add Package</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post">
                            <tr>
                                <td>
                                    <input type="text" name="room_name" class="name" placeholder="Room Name">
                                </td>
                                <td>
                                    <input type="text" name="room_price" class="name" placeholder="Room Price">
                                </td>
                                <td>
                                    <input class="save"  type="submit" name="savebtn" value="Save">
                                </td>
                            </tr>
                        </form>
                        <?php

                            if(isset($_POST["savebtn"]))
                            {
                                $name = $_POST["room_name"];
                                $price = $_POST["room_price"];

                                if(!$name == "")
                                {
                                    $sql = mysqli_query($connect, "INSERT INTO room (`room_name` , `room_price`)
                                        VALUES ('$name' , '$price')");

                                    if($sql)
                                    {
                                        ?>
                                            <script>alert("The record has being saved. ");</script>
                                        <?php
                                    }
                                    header("Refresh:0.5 url=addPackage.php");
                                }
                                else
                                ?>
                                    <script>alert("Please fill the text ");</script>
                                <?php
                            }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>