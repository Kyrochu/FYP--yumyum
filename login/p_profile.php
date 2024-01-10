<?php
    include("data_connection.php");

    $uid = isset($_GET['userID']) ? $_GET['userID'] : null;

    $id = "SELECT * from users where id = '$uid'";
    $re = mysqli_query($conn, $id);
    $row = mysqli_fetch_assoc($re);
    $name = $row["name"];
    $cnum = $row["contact_number"];
    $address = $row["address"];
    $city = $row["city"];
    $state = $row["state"];
    $postcode = $row["postcode"];
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        p {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }
        .EP{
            font-size: 20px;
            margin-bottom: 15px;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="profile.php" method="post">
                <h1>Personal Profile</h1>       
                <input type="hidden" name="id" value="<?php echo $uid ?>">
                <p>Name: <?php echo $name; ?></p>
                <p>Contact_number: <?php echo $cnum; ?></p>
                <p>Address: <?php echo $address; ?></p>
                <p>City: <?php echo $city; ?></p>
                <p>State: <?php echo $state; ?></p>
                <p>Postcode: <?php echo $postcode; ?></p> 
            </form>

                <!-- Edit Profile button -->
                <div class="EP">
                     <a href="edit_profile.php?userID=<?php echo $uid?>">Edit Profile</a>
                </div>
            
               
           
        </div>          
    </div>
</body>
</html>
