<?php include("connect.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Page</title>
    <link rel="stylesheet" href="customer.css">

    <script>
        function comform()
        {
            return confirm("Do you want to delete this account?");
        }
    </script>
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
        .update
        {
            border: 0;
            color: blue;

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
                <h2>Customer Detail</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Delete Customer</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        

                            $result = mysqli_query($connect , " SELECT * from customer  where cus_delete = '0'" );
                            $count = mysqli_num_rows($result);

			
                            if ($count < 1)
                            {
                        ?>
                            <tr>
                                <td colspan="6">No Records Found</td>
                            </tr>
                        
                        <?php
                            }
                            if(isset($_GET["delete"]))
                            {
                                $code = $_GET["code"];
                        
                                $result = "UPDATE `customer` SET `cus_delete` = '1' WHERE `cus_id` = '$code' ";
                                mysqli_query($connect , $result);
                                header("Refresh:0.5 url=customer.php");
                        
                            }

                            else
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                        ?>			

                                    <tr>
                                        <td><?php echo $row["cus_name"]; ?></td>
                                        <td><?php echo $row["user_email"]; ?></td>
                                        <td><a class="deletebtn" href="customer.php?delete&code=<?php echo $row['cus_id']; ?>" onclick="return comform();">Delete</a></td>
                                    </tr>
                            
                    <?php
                            
                                }
                            }
                            
                    ?>
                            
                    </tbody>
                </table>
            </div>

    </div>

    </body>
</body>
</html>
<?php
    


?>