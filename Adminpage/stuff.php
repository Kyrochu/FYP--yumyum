<?php include("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuff Page</title>
    <link rel="stylesheet" href="stuff.css">

    <script>
        function comform()
        {
            return confirm("Do you want to delete this account?");
        }
    </script>
    <style>
        .scrollable-table {
            height: 200px; /* Adjust the height as needed */
            overflow-y: scroll;
        }

        form.st input[type="submit"]
        {
            border: 0;
            background-color: transparent;
            color: rgb(175, 171, 171);
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
                <h2>Staff Detail</h2>
                <div >
                    <form action="" method="get" class="st">
                        <tr>
                            <td><input type="text" name="stuff_name" placeholder="Stuff Name"></td>
                            <td><input type="submit" name="search" value="Search"></td>
                        </tr>
                    </form>
                    <?php

                        if(isset($_GET["search"]))
                        {
                            $sfname=$_GET["stuff_name"];

                            $result=mysqli_query($connect," SELECT * FROM login WHERE user_name LIKE '%$sfname%'");

                            if(mysqli_num_rows($result) == 0 )
                            {
                                echo "<br> Result could not be found!";
                            }
                            else
                            {
                                echo "<table border='1' width='50%' >";

                                while($row=mysqli_fetch_assoc($result))    //Associate name is follow the name from our database
                                {
                                    ?>

                                        <tr>
                                            <td><?php echo $row["user_id"]; ?></td>
                                            <td><?php echo $row["user_name"]; ?></td>
                                            <td><?php echo $row["user_email"]; ?></td>
                                        </tr>

                                    <?php
                                }
                                echo "<table>";
                            }
                        }
                    ?>

                </div>
                <table>
                    <thead>
                        <tr>
                            <th>User No</th>
                            <th>Admin Name</th>
                            <th>Admin Email</th>
                            <th>Delete Account</th>
                        </tr>
                    </thead>
                    <tbody >
                        <?php
                        $result = mysqli_query($connect, "SELECT * FROM login WHERE user_type = 'admin' AND user_delete = '0' ");
                        $count = mysqli_num_rows($result);

                        if ($count < 1) {
                            ?>
                            <tr>
                                <td colspan="4">No Records Found</td>
                            </tr>
                            <?php
                        } else {
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <form action="">
                                    <tr>
                                        <td><?php echo $row["user_id"]; ?></td>
                                        <td><?php echo $row["user_name"]; ?></td>
                                        <td><?php echo $row["user_email"]; ?></td>
                                        <td><a class="deletebtn" href="stuff.php?delete&code=<?php echo $row['user_id']; ?>" onclick="return comform();">Delete</a></td>
                                    </tr>
                                </form>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="add">
                <h2>Admin Register</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Admin Name</th>
                            <th>Admin Email</th>
                            <th>Admin Password</th>
                            <th>Save Account</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="POST">
                            <tr>
                                <td>
                                    <input type="text" name="admin_name" class="name" placeholder="Name">
                                </td>
                                <td>
                                    <input type="email" name="admin_email" class="name" placeholder="exmaple@gmail.com">
                                </td>
                                <td>
                                    <input type="text" name="admin_pass" class="name" placeholder="Password">
                                </td>
                                <td >
                                    <input class="save" type="submit" name="savebtn" value="Save Account">
                                </td>
                            </tr>
                        </form>
                        <?php

                            if(isset($_POST["savebtn"]))
                            {
                                $name = $_POST["admin_name"];
                                $email = $_POST["admin_email"];
                                $pass = $_POST["admin_pass"];

                                $sql = mysqli_query($connect, "INSERT INTO login (`user_name`, `user_email`, `user_password`, `user_type`)
                                    VALUES ('$name', '$email', '$pass', 'admin')");

                                if($sql)
                                {
                                    ?>
                                        <script>alert("The account has being saved. ");</script>
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
    if(isset($_GET["delete"]))
    {
        $code = $_GET["code"];

        $result = "UPDATE `login` SET `user_delete` = '1' WHERE `user_id` = '$code' ";
        mysqli_query($connect , $result);
        header("Refresh:0.5 url=stuff.php");

    }

?>