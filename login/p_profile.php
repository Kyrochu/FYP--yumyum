<?php
    include("data_connection.php");

    $uid = isset($_GET['userID']) ? $_GET['userID'] : null;

    $id = "SELECT * from users where id = '$uid'";
    $re = mysqli_query($conn, $id);
    $row = mysqli_fetch_assoc($re);
    $uname = $row["name"];
    $cnum = $row["contact_number"];
    $email = $row["email"];
    $address = $row["address"];
    $city = $row["city"];
    $state = $row["state"];
    $postcode = $row["postcode"];

    
?>

<!DOCTYPE html>
<html>
<head>
<style>
        h1 {
            font-size: 50px;
            margin-left: 165px;
            margin-bottom: 50px;
        }
        
        p {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
            margin-left: 199px;
            font-weight: bold;
        }
        .EP {
            font-size: 20px;
            margin-top: 50px;
            margin-bottom: 15px;
            margin-left: 180px;
        }
        .B {
            margin-left: 400px;
            margin-top: -38px;
            font-size: 20px;
        }
        .container {
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            width: 50%;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
        <div class="form-container">
            <form action="profile.php" method="post">
                <h1>Personal Profile</h1>    
                <input type="hidden" name="id" value="<?php echo $uid ?>">
                <p>Personal Email : <?php echo $email?></p>
                <p>Name           : <?php echo $uname; ?></p>
                <p>Contact Number : <?php echo $cnum; ?></p>
                <?php if (!empty($address)) echo "<p>Address        : $address</p>"; ?>
                <?php if (!empty($city)) echo "<p>City           : $city</p>"; ?>
                <?php if (!empty($state)) echo "<p>State          : $state</p>"; ?>
                <?php if (!empty($postcode)) echo "<p>Postcode       : $postcode</p>"; ?>
            </form>

                <!-- Edit Profile button -->
                <div class="EP">
                     <a href="edit_profile.php?userID=<?php echo $uid?>">Edit Profile</a>
                </div>

                <div class="EP">
                     <a href="user_order.php?userID=<?php echo $uid?>">Order Detail</a>
                </div>

                <div class="EP">
                     <a href="user_receipt.php?userID=<?php echo $uid?>">Order History</a>
                </div>

                <div class="B">
                <a href="/fyp--yumyum/log_index.php?userID=<?php echo $uid?>">Back</a>
                </div>
            
               
           
        </div>          
    </div>
</body>
</html>
