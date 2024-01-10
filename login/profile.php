<?php
    include("data_connection.php");

    $uid = isset($_GET['userID']) ? $_GET['userID'] : null;

    $id = "SELECT * from users where id = '$uid'";
    $re = mysqli_query($conn, $id);
    $row = mysqli_fetch_assoc($re);
    $name = $row["name"];
    $cnum = $row["contact_number"];
    $address = $row["address"];

    // Update profile logic
    if (isset($_POST['updateProfile'])) {
        $name = $_POST['name'];
        $contactNumber = $_POST['contact_number'];
        $address = $_POST['address'];
        //Retrieve other form fields as well

        // Update the user information in the database
        $updateQuery = "UPDATE users SET name='$name', contact_number='$contactNumber', address='$address' WHERE id ='$uid' ";
        mysqli_query($conn, $updateQuery);

        // Redirect to the profile page after updating
        header("Location: profile.php?userID=$uid");
        exit();

        echo $name;
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <!-- your stylesheets and scripts -->
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="profile.php" method="post">
                <h1>Edit Profile</h1>       
                <input type="hidden" name="id" value="<?php echo $uid ?>">
                <input type="text" name="name" placeholder="<?php echo $name ;?>" />
                <input type="text" name="contact_number" placeholder=" <?php echo $cnum ;?>"/>
                <input type="text" name="address" placeholder="<?php echo $address ;?>" />
                <!-- Other input fields for city, state, postcode, etc. -->
                <button type="submit" name="updateProfile" onclick="updata_c_detail()">Update Profile</button>
            </form>
        </div>          
    </div>

    <script>
        updata_c_detail()
        {
            
        }
        
    </script>
</body>
</html>
