<?php
include("data_connection.php");

$uid = isset($_GET['userID']) ? $_GET['userID'] : null;

$id = "SELECT * FROM users WHERE id = '$uid'";
$re = mysqli_query($conn, $id);

if (!$re || mysqli_num_rows($re) == 0) {
    // Handle case when no user found with the given ID
    die("User not found");
}

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
        background-color: burlywood; 
        font-family: 'Arial', sans-serif;

        }


    a {
        text-decoration: none;
        color: inherit; 
    }
    a:hover {
        text-decoration: underline; 
    }
    

    p {
        font-size: 18px;
        color: #333;
        margin-top: 50px;
        margin-bottom: 30px;
        margin-left: 255px;
        font-weight: bold;
        color: white;
    }
    span{
        color: white;
        margin-left: 70px;
        font-weight: bold;
        font-size: 35px;
    }

    .EP {
        font-size: 20px;
        margin-top: 30px;
        margin-left: 15px;
        color: white; 
        display: flex;
        align-items: center;
        font-weight: bold;
    }
    .SP {
            font-size: 15px;
            margin-left: 15px;
            color: white;
        }
    
    .password-fields {
            display: none;
        }
        
    label {
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
        margin-left: 380px;
        align-items: center;
        color: white; 
    }

    input[type="checkbox"] {
        margin-left: 25px;
        margin-top: 10px;
    }
     /* Style for the checkmark when checked */
     input[type="checkbox"]:checked + .checkmark:after {
            content: '\2713'; /* Unicode checkmark character */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: block;
            text-align: center;
            line-height: 20px;
            font-size: 14px;
           /* Adjust the color as needed */
        }

    .UP {
        margin-top: 15px;
        margin-left: -4px;
        width: 45%;
        color: white;
        background-color: #FFA500; /* 橙色背景 */
        border: 1px solid ; 
        border-radius: 5px;
    }

    button:hover {
        background-color: #FF4500; /* 橙红色悬停背景 */
    }

    /* 容器 1 样式 */
    .container1 {
    width: 15%;
    padding-right: 10px;
    border-radius: 5px;
    margin-left: 35px;
    background-color: grey;
    }
    
    .form-container1 {
        border: 2px solid ;
        border-radius: 5px;
        padding: 20px;
        width: auto;
        margin-top: 30px;
        border-color: grey;

    }

    
    .container2 {
        margin-bottom: 263px;
        margin-top: -250px;
        border-radius: 10px;
        margin-left: 400px;
        width: 56%;
        background-color: #587272; 
        padding: 20px;
    }

    .form-container2 {
        border: 1px solid #587272;
        width: 100%;
        border-radius: 10px;
        border-color: #587272;

    }

     /* Hide the password fields by default */
     .password-fields {
            display: none;
        }
       
        .checkbox{
            margin-left: -20px;
        }
        label {
            font-size: 16px; /* Adjust the font-size as needed */
            cursor: pointer;
            align-items: center; /* Align items vertically in the center */
        }

        /* Style for the checkbox */
        input[type="checkbox"] {
            margin-left: -125px; 
            margin-top: 20px;
 
        }

        /* Style for the checkbox visual indicator */
        .checkmark {
            position: relative;
            display: inline-block;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style for the checkmark when checked */
        input[type="checkbox"]:checked + .checkmark:after {
            content: '\2713'; /* Unicode checkmark character */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: block;
            text-align: center;
            line-height: 20px;
            font-size: 14px;
           /* Adjust the color as needed */
        }
        

        </style>
</head>
<body>
    
    <div class="container1">
        <div class="form-container1">

            <div class="EP">
                <a href="p_profile.php?userID=<?php echo $uid?>">My Profile</a>
            </div>   
            <div class="EP">
                <a href="edit_profile.php?userID=<?php echo $uid?>">Edit Profile</a>
            </div>

            <div class="EP">
                <a href="../user_order.php?userID=<?php echo $uid?>">Order Detail</a>
            </div>

            <div class="EP">
                <a href="../user_receipt.php?userID=<?php echo $uid?>">Order History</a>
            </div>   
            <div class="EP">
                    <a href="/fyp--yumyum/log_index.php?userID=<?php echo $uid?>">Back</a>
            </div>
                         
        </div>
    </div>

    <!-- 容器 2 -->
    <div class="container2">
        <div class="form-container2">
            <form action="" method="post"> 
                <input type="hidden" name="id" value="<?php echo $uid ?>">
                <span>Hello           <?php echo $uname; ?></span>
                <p>My Email : <?php echo $email?></p>
                <p>Contact Number : <?php echo $cnum; ?></p>
                <?php if (!empty($address)) echo "<p>Address        : $address</p>"; ?>
                <?php if (!empty($city)) echo "<p>City           : $city</p>"; ?>
                <?php if (!empty($state)) echo "<p>State          : $state</p>"; ?>
                <?php if (!empty($postcode)) echo "<p>Postcode       : $postcode</p>"; ?>

        
                </div>
        
            </form>
        </div>
    </div>


</body>
</html>
