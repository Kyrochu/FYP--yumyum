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
        <title> YumYum Admin Accounts List </title>
        
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
        <script src="AddAdminSuper.js"> </script>


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
            
            <div class="adminTable">

            <h2 style="margin-left:5px;text-transform:uppercase;text-decoration:underline;margin-top:35px;"> Admin Accounts </h2>

            <div class="addAdminbtn">

                <button style="background:burlywood; margin-top:20px; margin-left:5px; width:250px; height:30px; cursor:pointer; font-weight:bold; border-radius:5px;" onmouseover="this.style.background='sandybrown'" onmouseout="this.style.background='burlywood'">
                    ADD NEW ADMIN 
                </button>

            </div>

            <div class="popup">
                
                <div class="form">

                    <h2 class="AddAdminTitle"> ADD NEW ADMIN </h2>
                    
                    <form method="post"> 
                        
                        <div class="form-element">
                            USERNAME <input type="text" name="name" required placeholder="Enter New Username">                    
                        </div>

                        <div class="form-element">  
                            EMAIL <input type="email" name="email" required placeholder="Enter New Email">    
                        </div>

                        <div class="form-element">
                        PASSWORD <input type="password" name="password" required placeholder="Enter New Password">
                        </div>   

                        <div class="form-element">
                        CONFIRM PASSWORD <input type="password" name="cpassword" required placeholder="Confirm password">
                        </div>   

                        <div class="form-element">
                            ROLE <select name="admin_type">
                                <option value="Admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-element">
                            <input type="submit" name="addadmin" value="ADD NEW ADMIN" class="form-btn">
                        </div>

                        <div class="form-element">
                            <button class="cancel-btn"> CANCEL </button>
                        </div>

                    </form>

                </div>
            </div>


            <?php

                $result = mysqli_query($connect,"SELECT * FROM admin_acc");

                if (isset($_POST["addadmin"]))
                {
                    $Name = $_POST["name"];
                    $Email = $_POST["email"];
                    $Password = $_POST["password"];
                    $CPassword = $_POST["cpassword"];
                    $AdminType = $_POST["admin_type"];
                
                    $duplicate = mysqli_query($connect,"SELECT* FROM admin_acc WHERE name = '$Name' OR email = '$Email' "); // If Name of Email duplicate
                    if(mysqli_num_rows($duplicate) > 0)
                    {
                        echo "<script> alert('Username or Email already exists!') </script>";
                    }
                    else
                    {
                        if($Password == $CPassword) // If password same as confirm password
                        {
                            $sql = mysqli_query($connect,"INSERT INTO admin_acc (name,email,password,admin_type) VALUES ('$Name','$Email','$Password','$AdminType')");
                            
                            echo "<script> alert('New Admin Added!'); window.location.href = 'SubAdminAccSuper.php'; </script>";
                            sleep(1);  // Enable webpage loading for 1 seconds
                            exit();
                        }
                        else
                        {
                            echo "<script> alert('Password Does Not Matched!') </script>";
                        }
                    }
                
                }

                if (isset($_POST["dlt-btn"]) && isset($_POST["delete_id"])) 
                {
                    $delete_id = $_POST["delete_id"];
                    
                    // Perform the delete operation based on the ID
                    $delete_query = "DELETE FROM admin_acc WHERE id = $delete_id";
                    mysqli_query($connect, $delete_query);
                }
                
                // Fetch the admin accounts
                $result = mysqli_query($connect, "SELECT * FROM admin_acc");


            ?>

                <table class="adminAcc" border="2" cellspacing="0" >

                    <tr class="headings">

                        <th> ID </th>
                        <th> Username </th>
                        <th> Email </th>
                        <th> Role </th>
                        <th> Edit </th>
                        <th> DELETE</th>

                    </tr>

                    <?php

                        while($row=mysqli_fetch_assoc($result))
                        {
            
                    ?>

                    <tr>

                        <th> <?php echo $row["id"]; ?> </th>  
                        <th> <?php echo $row["name"]; ?> </th>
                        <th> <?php echo $row["email"]; ?> </th>
                        <th> <?php echo $row["admin_type"]; ?> </th>
                        <th>
                            <form method="post" action="EditAdminSuper.php"> 
                                <input type="hidden" name="edit_id" value="<?php echo $row["id"]; ?>" >
                                <button type="submit" name="edit-btn" class="edit"> EDIT </button>
                            </form>
                        </th>
                        <th>
                            <form method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row["id"]; ?>">
                                <button type="submit" name="dlt-btn" class="dlt" onclick="return confirm('Are you sure you want to delete this account?')"> DELETE </button>
                            </form>
                        </th>
                      
                    </tr>
        
                    <?php    
                        }
                    ?>

                </table>

            </div>

        </div>

      

        

    </body>

</html>