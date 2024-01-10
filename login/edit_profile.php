<?php
include("data_connection.php");

$uid = isset($_GET['userID']) ? $_GET['userID'] : null;

$id = "SELECT * FROM users WHERE id = '$uid'";
$re = mysqli_query($conn, $id);

if ($re && mysqli_num_rows($re) > 0) {
    $row = mysqli_fetch_assoc($re);
    $name = $row["name"];
    $cnum = $row["contact_number"];
    $address = $row["address"];
    $city = $row["city"];
    $state = $row["state"];
    $postcode = $row["postcode"];
} else {
    // Handle case when no user found with the given ID
    $name = "";
    $cnum = "";
    $address = "";
    $city = "";
    $state = "";
    $postcode = "";
}

    // Update profile logic
    if (isset($_POST['updateProfile'])) {
        $name = $_POST['name'];
        $contactNumber = $_POST['contact_number'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postcode = $_POST['postcode'];

        //Retrieve other form fields as well

        // Update the user information in the database
        $updateQuery = "UPDATE users SET name='$name', contact_number='$contactNumber', address='$address' ,city ='$city', state='$state', postcode='$postcode' WHERE id ='$uid' ";
        mysqli_query($conn, $updateQuery);

        // Redirect to the profile page after updating
        header("Location: p_profile.php?userID=$uid");
        exit();

        echo $name;
    }
    
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="" method="post">
                <h1>Edit Profile</h1>       
                <input type="hidden" name="id" value="<?php echo $uid ?>">
                <input type="text" name="name" placeholder="<?php echo $name ;?>" />
                <input type="text" name="contact_number" placeholder=" <?php echo $cnum ;?>"/>
                <input type="text" name="address" placeholder="<?php echo $address ;?>" />
                <input type="text" name="city" placeholder="<?php echo $city ;?>" />
                <input type="text" name="state" placeholder="<?php echo $state ;?>" />
                <input type="text" name="postcode" placeholder="<?php echo $postcode ;?>" />

                <!-- Other input fields for city, state, postcode, etc. -->
                <button type="sumbit" name="updateProfile" >Update Profile</button>
            </form>
        </div>          
    </div>


</body>
</html>
