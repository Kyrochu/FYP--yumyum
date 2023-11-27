<?php
// Include the database connection file
require_once("data_connection.php");

// Fetch user data based on the logged-in user or any identifier you use (like session or user ID)
$userID = 1; // Replace this with your logic to get the user ID or use sessions
$query = "SELECT * FROM users WHERE id = '$userID'";
$result = mysqli_query($conn, $query);
$userData = mysqli_fetch_assoc($result);

// Check if form is submitted for saving changes
if(isset($_POST['save'])){
    // Retrieve updated data from the form
    $username = $_POST['username'];
    $contactNumber = $_POST['contact_number'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Perform validation and update the database
    // (Implement validation logic to check and update the data accordingly)
    // For simplicity, direct update query is shown here, ensure to hash the password in a real scenario
    $updateQuery = "UPDATE users SET username = '$username', contact_number = '$contactNumber', password = '$password' WHERE id = '$userID'";
    mysqli_query($conn, $updateQuery);

    // Redirect to profile page after saving changes
    header("Location: user_profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <!-- Your CSS and other headers here -->
</head>
<body>
    <h1>User Profile</h1>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $userData['username']; ?>"><br><br>

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" value="<?php echo $userData['contact_number']; ?>"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password"><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password"><br><br>

        <input type="submit" name="save" value="Save">
    </form>
</body>
</html>
