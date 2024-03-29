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

        // Check if 'confirm_password' key is set before using it
        $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

        if (!empty($oldPassword)) {
            if ($oldPassword !== $password) {
                echo "<script>alert('Password does not match.');</script>";
            }
            else if ($newPassword !== $confirmPassword) {
                echo "<script>alert('New password and confirm password do not match.');</script>";
            } 
            else {
                // Update the user information in the database
                $updateQuery = "UPDATE users SET name='$name', contact_number='$contactNumber', address='$address', city='$city', state='$state', postcode='$postcode', password='$confirmPassword' WHERE id ='$uid'";
                mysqli_query($conn, $updateQuery);

                // Redirect to the profile page after updating with success parameter
                header("Location: p_profile.php?userID=$uid&success=true");
                exit();
            }
        } else {
            // Old password is empty, no need to validate
            // Continue with updating other user information
            $updateQuery = "UPDATE users SET name='$name', contact_number='$contactNumber', address='$address', city='$city', state='$state', postcode='$postcode' WHERE id ='$uid'";
            mysqli_query($conn, $updateQuery);

            // Redirect to the profile page after updating with success parameter
            header("Location: p_profile.php?userID=$uid&success=true");
            exit();
        }
    }

    // Check if success parameter is set in the URL
    $success = isset($_GET['success']) ? $_GET['success'] : false;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: orange; 
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        p{
            color: white;
        }
    
        
        .column {
            position: relative;
            /* Add any additional styling for the column */
        }

        #togglePasswordSignUp {
            position: absolute;
            top: 45%; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
            transform: translateY(-50%);
            cursor: pointer;
            color: #7a7474;
        }

        .column {
            position: relative;
            /* Add any additional styling for the column */
        }

        .togglePassword {
            position: absolute;
            top: 45%; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
            transform: translateY(-50%);
            cursor: pointer;
            color: #7a7474;
        }


        .container1 {
            width: 15%;
            border-radius: 5px;
            padding-right: 5px;
            margin-left: -1096px;
            background-color: black;
            margin-top: -390px;
            position: fixed;
            box-shadow: 10px 10px 10px white;
            opacity: 0.9;
        }

        .form-container1 {
            border: 2px solid;
            border-radius: 5px;
            border-color: black;
            padding: 20px;
            width: auto;
        }
    

        .EP, .SP, .UP {
    
            color: white;
        }
        a {
            text-decoration: none;
            color: inherit; 
        }
        a:hover {
            text-decoration: underline; 
        }

        .EP {
            font-size: 20px;
            margin-top: 30px;
            margin-left: 15px;
            display: flex;
            font-weight: bold;
        }

        .SP {
            font-size: 15px;
            margin-left: -145px;
            color: white;
        }

        .UP {
            margin-top: 15px;
            margin-left: 100px;
            border: 1px solid grey;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            background-color: orange;
        }

        
        .container2 {
            background-color: black;
            padding: 50px;
            border-radius: 8px;
            width: 300px;
            margin-top: 20px;
            margin-left: 35px;
            box-shadow: 10px 10px 10px white;
            opacity: 0.9;
        }

        .form-container2 {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center the items horizontally */
        }

        input {

          
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #696969;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            background-color: #D3D3D3;
        }

        button {
            
            color: orange;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #FF8C00	;
;
        }

        h1 {
            text-align: center;
            color: white;
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
        
        .state-dropdown {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            font-size: 14px;
            background-color: #D3D3D3;
        }

        /* Style for the selected option */
        .state-dropdown option:checked {
            background-color: #4caf50;
            color: white;
        }
        #postcodeError{
            color: red;
        }
        #passwordError{
            color: red;
        }
      
    </style>
</head>
<body>

<div class="container1">
    <div class="form-container1">
        
        <div class="EP">
            <a href="p_profile.php?userID=<?php echo $uid ?>">My Profile</a>
        </div>
        <div class="EP">
            <a href="edit_profile.php?userID=<?php echo $uid ?>">Edit Profile</a>
        </div>
        <div class="EP">
            <a href="../user_order.php?userID=<?php echo $uid ?>">Order Detail</a>
        </div>
        <div class="EP">
            <a href="../user_receipt.php?userID=<?php echo $uid ?>">Order History</a>
        </div>
    </div>
</div>

<div class="container2">
    <div class="form-container2">
        <form action="" method="post" id="updateProfileForm" onsubmit="showAlert()">
            <h1>Edit Profile</h1>
            <p>My Email: <?php echo $email ?></p>
            <input type="hidden" name="id" value="<?php echo $uid ?>">
            <span id="nameError" class="NE"></span>
            <input type="text" name="name" placeholder="Name" required value="<?php echo $name; ?>" />
            <span id="contactNumberFormat"></span>
            <span id="contactNumberError" class="error-message"></span>
            <input type="text" name="contact_number" placeholder="Contact Number" required value="<?php echo $cnum; ?>" />
            <input type="text" name="address" placeholder="Address" required value="<?php echo $address; ?>" />
            <input type="text" name="city" placeholder="City" required value="<?php echo $city; ?>" />
            
            
            <select name="state" required class="state-dropdown">
                <option value="" disabled>Select your state</option>
                <option value="Johor" <?php echo ($state === 'Johor') ? 'selected' : ''; ?>>Johor</option>
                <option value="Kedah" <?php echo ($state === 'Kedah') ? 'selected' : ''; ?>>Kedah</option>
                <option value="Kelantan" <?php echo ($state === 'Kelantan') ? 'selected' : ''; ?>>Kelantan</option>
                <option value="Malacca" <?php echo ($state === 'Malacca') ? 'selected' : ''; ?>>Malacca</option>
                <option value="Negeri Sembilan" <?php echo ($state === 'Negeri Sembilan') ? 'selected' : ''; ?>>Negeri Sembilan</option>
                <option value="Pahang" <?php echo ($state === 'Pahang') ? 'selected' : ''; ?>>Pahang</option>
                <option value="Penang" <?php echo ($state === 'Penang') ? 'selected' : ''; ?>>Penang</option>
                <option value="Perak" <?php echo ($state === 'Perak') ? 'selected' : ''; ?>>Perak</option>
                <option value="Perlis" <?php echo ($state === 'Perlis') ? 'selected' : ''; ?>>Perlis</option>
                <option value="Sabah" <?php echo ($state === 'Sabah') ? 'selected' : ''; ?>>Sabah</option>
                <option value="Sarawak" <?php echo ($state === 'Sarawak') ? 'selected' : ''; ?>>Sarawak</option>
                <option value="Selangor" <?php echo ($state === 'Selangor') ? 'selected' : ''; ?>>Selangor</option>
                <option value="Terengganu" <?php echo ($state === 'Terengganu') ? 'selected' : ''; ?>>Terengganu</option>
            </select>

            <input type="text" name="postcode" placeholder="Postcode" required value="<?php echo $postcode; ?>" oninput="validatePostcode(this)" />
            <span id="postcodeError" class="error-message"></span>            
            <label>
                    <input type="checkbox" id="passwordToggle">
                    <span class="SP">Change Passwords?</span>
                </label>
                <div class="password-fields">
                <div class="column">
                    <input maxlength="8" type="password" name="old_password" placeholder="Current Password" />
                    <i class="fas fa-eye togglePassword" data-target="old_password"></i>
                </div>

                <div class="column">
                    <input maxlength="8" type="password" name="new_password" placeholder="New Password" />
                    <i class="fas fa-eye togglePassword" data-target="new_password"></i>
                </div>

                    <span id="passwordError" class="PE"></span>

                    <div class="column">
                        <input maxlength="8" type="password" name="confirm_password" placeholder="Confirm Password" />
                        <i class="fas fa-eye togglePassword" data-target="confirm_password"></i>
                    </div>
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
        document.addEventListener("DOMContentLoaded", function () {
            // Check if success parameter is set in the URL
            const urlParams = new URLSearchParams(window.location.search);
            const success = urlParams.get('success');

            // Display alert if success parameter is 'true'
            if (success === 'true') {
                alert('Updated successful.');
                // Redirect to the profile page after displaying the alert
                window.location.href = `p_profile.php?userID=<?php echo $uid ?>&success=true`;
            }
        });
    </script>

    <script>
    function showAlert() {
        // Display an alert when the form is submitted successfully
        alert("Profile updated successfully!");
    }
</script>


<script>
    function validatePostcode(input) {
        // Get the value of the input field
        const postcode = input.value;

        // Regular expression to match 5 digits
        const postcodeRegex = /^\d{5}$/;

        // Check if the postcode matches the regular expression
        if (!postcodeRegex.test(postcode)) {
            // Display error message if the postcode does not match the pattern
            document.getElementById('postcodeError').textContent = 'Postcode should contain exactly 5 digits.';
        } else {
            // Clear the error message if the postcode is valid
            document.getElementById('postcodeError').textContent = '';
        }

        // Remove any non-numeric characters from the input
        input.value = postcode.replace(/\D/g, '');
    }
</script>

<script>
    const contactNumberInput = document.querySelector('input[name="contact_number"]');
    const contactNumberError = document.getElementById('contactNumberError');
    const contactNumberFormat = document.getElementById('contactNumberFormat');
    const contactNumberRegex = /^[0-9\-]+$/;

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
                contactNumberError.textContent = 'Format must be: xxx-xxxxxxx';
                contactNumberError.style.color = 'red';
                contactNumberFormat.textContent = '';
            } else {
                contactNumberError.textContent = '';
                contactNumberError.style.color = '';
            }
        }

        this.value = contactNumber;
    });

    const nameInput = document.querySelector('input[name="name"]');
    const nameError = document.getElementById('nameError');

        nameInput.addEventListener('input', function () {
            let name = this.value.trim(); // Trim leading and trailing whitespaces

            // Check if the input contains only letters
            if (/^[a-zA-Z]+$/.test(name)) {
                if (name === '') {
                    nameError.textContent = 'Please enter a valid name.';
                    nameError.style.color = 'red';
                } else {
                    // Check if the first letter is uppercase
                    const firstLetter = name.charAt(0);
                    if (firstLetter !== firstLetter.toUpperCase()) {
                        nameError.textContent = 'First letter must be uppercase.';
                        nameError.style.color = 'red';
                    } else {
                        // Clear the error message if the input is valid
                        nameError.textContent = '';
                        nameError.style.color = '';
                    }
                }
            } else {
                nameError.textContent = 'Only character are allowed.';
                nameError.style.color = 'red';
            }
        });

        const passwordInput = document.querySelector('input[name="new_password"]');
        const passwordError = document.getElementById('passwordError');
        const passwordRege = /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*[0-9])(?=.*[A-Z]).{8,}$/;

        passwordInput.addEventListener('input', function () {
            const password = this.value;
            
            if (password === '') {
                passwordError.textContent = '';
            } else if (password.length >= 8 && passwordRege.test(password)) {
                passwordError.textContent = '';
            } else if (/^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*[0-9])/.test(password)) {
                passwordError.textContent = '';
            } else {
                passwordError.textContent = 'Password should have a maximum of 8 characters and contain at least 1 symbol, 1 number.';
                passwordError.style.fontSize = '14px'; // Change font size to 14px
            }
        });

        passwordInput.addEventListener('blur', function () {
            const password = this.value;

            if ((password === '') || (passwordRege.test(password) && /^(?=.*[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?])(?=.*[0-9])/.test(password))) {
                passwordError.textContent = '';
            }
        });



    const togglePasswordButton = document.querySelectorAll('.togglePassword');

    togglePasswordButton.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-target');
            const passwordInput = document.querySelector(`input[name="${targetId}"]`);

            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            button.classList.toggle('fa-eye');
            button.classList.toggle('fa-eye-slash');
        });
    });


        const togglePasswordButtonSignUp = document.getElementById('togglePasswordSignUp');
        const signUpPassword = document.querySelector('input[name="password"]');

        togglePasswordButtonSignUp.addEventListener('click', () => {
            const type = signUpPassword.getAttribute("type") === "password" ? "text" : "password";
            signUpPassword.setAttribute("type", type);

            togglePasswordButtonSignUp.classList.toggle("fa-eye");
            togglePasswordButtonSignUp.classList.toggle("fa-eye-slash");
        });
    </script>
</body>
</html>
