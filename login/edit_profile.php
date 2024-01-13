<?php
    include("data_connection.php");

    $uid = isset($_GET['userID']) ? $_GET['userID'] : null;

    $id = "SELECT * FROM users WHERE id = '$uid'";
    $re = mysqli_query($conn, $id);

    $password = "";  // Initialize $password variable

    if ($re && mysqli_num_rows($re) > 0) {
        $row = mysqli_fetch_assoc($re);
        $name = $row["name"];
        $cnum = $row["contact_number"];
        $email = $row["email"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $postcode = $row["postcode"];
        $password = $row["password"];
    } else {
        // Handle case when no user found with the given ID
        $name = "";
        $cnum = "";
        $email= "";
        $address = "";
        $city = "";
        $state = "";
        $postcode = "";
    }

if (isset($_POST['updateProfile'])) {
    $name = $_POST['name'];
    $contactNumber = $_POST['contact_number'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];

    if (!empty($oldPassword)) {
        // Check if old password matches the one in the database
        if ($oldPassword !== $password) {
            echo "<script>alert('Old password does not match.');</script>";
        } else {
            // Update the user information in the database
            $updateQuery = "UPDATE users SET name='$name', contact_number='$contactNumber', address='$address', city='$city', state='$state', postcode='$postcode', password='$newPassword' WHERE id ='$uid'";
            mysqli_query($conn, $updateQuery);

            // Redirect to the profile page after updating
            header("Location: p_profile.php?userID=$uid");
            exit();
        }
    } else {
        // Old password is empty, no need to validate
        // Continue with updating other user information
        $updateQuery = "UPDATE users SET name='$name', contact_number='$contactNumber', address='$address', city='$city', state='$state', postcode='$postcode' WHERE id ='$uid'";
        mysqli_query($conn, $updateQuery);

        // Redirect to the profile page after updating
        header("Location: p_profile.php?userID=$uid");
        exit();
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        h1 {
            text-align: center;
            color: #333;
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
        display: flex; /* Use flexbox to align items horizontally */
        align-items: center; /* Align items vertically in the center */
        }

        /* Style for the checkbox */
        input[type="checkbox"] {
            margin-left: 25px; 
            margin-top: 10px;
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
            color: #4caf50; /* Adjust the color as needed */
        }
        .SP{
            font-size: 15px;
            margin-left: -140px;
        }
        .UP{
            margin-top: 15px;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="" method="post">
                <h1>Edit Profile</h1>
                <p>Personal Email : <?php echo $email?></p>

                <input type="hidden" name="id" value="<?php echo $uid ?>">
                <input type="text" name="name" placeholder="Name" required value="<?php echo $name; ?>" />
                <input type="text" name="contact_number" placeholder="Contact Number" required value="<?php echo $cnum; ?>" />
                <span id="contactNumberFormat"></span>
                <span id="contactNumberError" class="error-message"></span>
                <input type="text" name="address" placeholder="Address" required value="<?php echo $address; ?>" />
                <input type="text" name="city" placeholder="City" required value="<?php echo $city; ?>" />
                <input type="text" name="state" placeholder="State" required value="<?php echo $state; ?>" />
                <input type="text" name="postcode" placeholder="Postcode" required value="<?php echo $postcode; ?>" />
                <label>
                    <input type="checkbox" id="passwordToggle">
                    <span class="SP">Edit Passwords</span>
                </label>
                <div class="password-fields">
                    <input type="password" name="old_password" placeholder="Old Password"  />
                    <input type="password" name="new_password" placeholder="New Password"  />
                </div>
                <button type="submit" class="UP" name="updateProfile">Update Profile</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordFields = document.querySelector('.password-fields');
            const passwordToggle = document.getElementById('passwordToggle');

            passwordToggle.addEventListener('change', function () {
                passwordFields.style.display = this.checked ? 'block' : 'none';
            });
        });
    </script>

    <script>
    const contactNumberInput = document.querySelector('input[name="contact_number"]');
    const contactNumberError = document.getElementById('contactNumberError');
    const contactNumberFormat = document.getElementById('contactNumberFormat');
    const contactNumberRegex = /^[0-9\-]+$/; 

        contactNumberInput.addEventListener('input', function () {
        let contactNumber = this.value;

        
        contactNumberInput.addEventListener('input', function () {
        let contactNumber = this.value;

        
        contactNumber = contactNumber.replace(/[^\d\-]/g, '');
        contactNumber = contactNumber.replace(/[^\d\-]|-(?=[^-]*-)/g, '');

        if (contactNumber === '' || contactNumber === '-') {
            contactNumberError.textContent = 'Please enter a valid contact number.';
            contactNumberError.style.color = 'red';
            contactNumberFormat.textContent = '';
        } else if (!contactNumberRegex.test(contactNumber)) {
            contactNumberError.textContent = 'Contact number should contain numbers and at most one hyphen.';
            contactNumberError.style.color = 'red';
            contactNumberFormat.textContent = '';
        } else {
            const formattedContactNumber = contactNumber.replace(/(\d{3})-?(\d+)/, '$1-$2');

            if (formattedContactNumber !== this.value) {
                // 如果格式不匹配，显示提示信息
                contactNumberError.textContent = 'Format must be : xxx-xxxxxxx';
                contactNumberError.style.color = 'red';
                contactNumberFormat.textContent = '';
            } else {
                // 格式匹配时清空错误信息
                contactNumberError.textContent = '';
                contactNumberError.style.color = '';
            }
        }

        // 更新输入框的值
        this.value = contactNumber;
        });
    });
    </script>
</body>
</html>