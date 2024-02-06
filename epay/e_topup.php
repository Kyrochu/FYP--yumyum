<?php include ("../connection_sql.php") ?>

<?php
    session_start();

    // // Check if the session variable is set
    // if (isset($_SESSION['dataFromPage1']) && isset($_SESSION['data'] )) 
    // {
    //     $total_price = $_SESSION['dataFromPage1'];
    //     $user = $_SESSION['data'];

    // } 


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="e_pay.css">
    <link rel="stylesheet" href="../css/popup.css">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="../AdmimModule/Admin_Style.css">



</head>
<body>
    

<?php

    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];

        $query = "SELECT * FROM e_user WHERE user_id = '$uid'";
        $result = mysqli_query($connect, $query);
        $row_user = mysqli_fetch_assoc($result);
        $u_name = $row_user["user_name"];
        $u_email = $row_user["user_email"];
    }
  
    
?>


<div class="container">
        <form action="" method="post" onsubmit="return save(event)">
            <div class="row">
                <div class="col">
                    <h3 class="title">billing address</h3>
                    <input style="display:none;" type="number" id="u_id" value="<?php echo $user ?>">
                    <input style="display:none;" type="number" id="price" value="<?php echo $total_price ?>">
                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" placeholder="john deo" value="" id="f_name" name="f_name" required>
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com" value="<?php echo $u_email ?>" id="email" name="email" required>
                        <div id="emailError" class="danger"></div>
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality" value="" required>
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="mumbai" value="" required>
                    </div>
                    <div class="flx">
                        <div class="inputBox">
                            <span>State :</span>
                            <select id="state" name="state" required>
                                <option value="" disabled selected>Select your state</option>
                                <option value="Johor">Johor</option>
                                <option value="Kedah">Kedah</option>
                                <option value="Kelantan">Kelantan</option>
                                <option value="Kuala Lumpur">Kuala Lumpur</option>
                                <option value="Labuan">Labuan</option>
                                <option value="Malacca">Melaka</option>
                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                <option value="Pahang">Pahang</option>
                                <option value="Penang">Penang</option>
                                <option value="Perak">Perak</option>
                                <option value="Perlis">Perlis</option>
                                <option value="Putrajaya">Putrajaya</option>
                                <option value="Sabah">Sabah</option>
                                <option value="Sarawak">Sarawak</option>
                                <option value="Selangor">Selangor</option>
                                <option value="Terengganu">Terengganu</option>
                               
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>Post code :</span>
                            <input type="text" placeholder="12345" value="" maxlength="5" pattern=".{5,6}" title="Enter a valid post code" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">Payment</h3>
                    <div class="inputBox">
                        <span>Cards accepted :</span>
                        <img src="../img/masterlogo.png" alt=""><img src="../img/visalogo.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>Name on card :</span>
                        <input type="text" placeholder="John Deo" id="card_name"  required>
                    </div>
                    <div class="inputBox">
                        <span>Credit card number :</span>
                        <div id="cardType"></div>
                        <input type="text" placeholder="5555 2222 3333 4444" id="card_number" maxlength="19" pattern="[0-9\s]{16,19}" title="Enter a valid card number " required>
                        <div id="cardNumberError" class="danger"></div>
                    </div>
                    
                    
                    <div class="flex">
                        <div class="inputBox">
                            <span>Exp date (MM/YYYY):</span>
                            <input type="month" id="exp_date" required>
                            <div id="expDateError" class="danger"></div>
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="123" id="cvv" maxlength="3" pattern="[0-9]{3}" title="Enter a valid CVV number" required>
                        </div>
                    </div>
                    
                </div>
            </div>
                <button type="submit" class="submit-btn">Proceed to Checkout</button>
                <button type="button" href="log_menu.php?userID=<?php echo $uid; ?>" class="submit-btn">Back to Menu</button>
                <div id="paymentError" class="error"></div>
        </form>
        
        <div id="overlay" class="overlay"></div>
        <div id="popup" class="popup" style="text-align: center; " >
            <span>Payment done , Thank you</span>
        </div>
    </div>         






<script>

    
    function save(event) {
            event.preventDefault(); 
            var user_id = document.getElementById("u_id").value;
            var c_num = document.getElementById("card_number").value;
            var total = document.getElementById("price").value;

                $.ajax({
                    type: "POST",
                    url: "receipt_save.php",
                    data: { u_id: user_id, card_num: c_num, total_price: total },
                    success: function (response) {
                        console.log("done");
                        document.getElementById('overlay').style.display = 'block';
                        document.getElementById('popup').style.display = 'block';

                        setTimeout(function () {
                            document.getElementById('popup').classList.add('visible');
                        }, 10);

                        setTimeout(function () {
                            document.getElementById('popup').classList.remove('visible');
                            setTimeout(function () {
                                window.location.href = 'log_menu.php?userID=' + user_id;
                            }, 1000);
                        }, 2000);
                    },
                });
           

            return false; 
        }

        

        document.addEventListener('DOMContentLoaded', function() {

            //Card Name
            var cardNameInput = document.getElementById('card_name');

            cardNameInput.addEventListener('input', function () {
                var value = cardNameInput.value;

                // Regular expression to allow only alphabets and spaces
                var pattern = /^[A-Za-z\s]+$/;

                if (!pattern.test(value)) {
                    
                    cardNameInput.value = value.replace(/[^A-Za-z\s]/g, '');
                }
            });

            // Card Number
            var cardNumInput = document.getElementById('card_number');
            var cardTypeDiv = document.getElementById('cardType');

            cardNumInput.addEventListener('input', function() {
                var trimmedValue = cardNumInput.value.replace(/\s/g, ''); // Remove existing spaces
                var formattedValue = formatCardNumber(trimmedValue);
                cardNumInput.value = formattedValue;

                // Display card type based on the first digit
                displayCardType(formattedValue.charAt(0));
            });

            // Expiry Year
            var expDateInput = document.getElementById('exp_date');
            var expDateErrorDiv = document.getElementById('expDateError');

            expDateInput.addEventListener('input', function() {
                var expDateValue = expDateInput.value;
                var currentYear = new Date().getFullYear();
                var enteredYear = parseInt(expDateValue.split('-')[0]);
                var enteredMonth = parseInt(expDateValue.split('-')[1]);

                // Validate entered date
                if (isNaN(enteredYear) || isNaN(enteredMonth) || enteredYear < currentYear || enteredYear > currentYear + 5) {
                    displayExpDateError('Invalid expiration date. Please enter a valid date.');
                } else {
                    displayExpDateError('');
                }
            });

            // CVV
            var cvvInput = document.getElementById('cvv');
            cvvInput.addEventListener('input', function() {
                var trimmedValue = cvvInput.value.replace(/\s/g, ''); // Remove existing spaces
                var formattedValue = formatCVV(trimmedValue);
                cvvInput.value = formattedValue;
            });

            //Email
            var emailInput = document.getElementById('email');
            var emailErrorDiv = document.getElementById('emailError');

            emailInput.addEventListener('blur', function () {
                var emailValue = emailInput.value.toLowerCase();

                // Regular expression for a more comprehensive email pattern
                var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                if (!emailPattern.test(emailValue)) {
                    emailErrorDiv.innerText = 'Please enter a valid email address.';
                } else {    
                    var domain = emailValue.split('@')[1]; // Get the domain part after '@'
                    if (isValidEmailDomain(domain)) {
                        emailErrorDiv.innerText = '';
                    } else {
                        emailErrorDiv.innerText = 'Please enter a valid email domain.';
                    }
                }
            });

            function isValidEmailDomain(domain) {
                return domain === 'gmail.com' || domain === 'hotmail.com'; 
            }


            // Card Number formatting function
            function formatCardNumber(value) {
                var formattedValue = value.replace(/\D/g, ''); // Remove non-numeric characters
                var spacedValue = '';
                var firstDigit = formattedValue.charAt(0);

                for (var i = 0; i < formattedValue.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        spacedValue += ' '; // Insert space every four characters
                    }

                    if (i === 0) {
                        // For the first digit
                        if (firstDigit !== '4' && firstDigit !== '5') {
                            // If the first digit is neither 4 nor 5, display an error message
                            displayCardError('We just accept VISA or MASTER');
                            return spacedValue;
                        } else {
                            // If the first digit is valid, clear the error message
                            displayCardError('');
                        }
                    } 

                    spacedValue += formattedValue.charAt(i);
                }

                // Display card type based on the first digit
                displayCardType(firstDigit === '4' ? 'VISA' : 'MASTER');
                return spacedValue;
            }

            // Display card error message function
            function displayCardError(message) {
                var cardErrorDiv = document.getElementById('cardNumberError');
                cardErrorDiv.innerText = message;
            }



            // Expiry Year formatting function
            function formatExpYear(value) {
                return value.replace(/\D/g, '').substring(0, 4); // Remove non-numeric characters and limit to 4 digits
            }

            // CVV formatting function
            function formatCVV(value) {
                return value.replace(/\D/g, '').substring(0, 3); // Remove non-numeric characters and limit to 3 digits
            }

            // Display card type function
            function displayCardType(cardType) {
                var cardTypeText = '';

                if (cardType === '4') {
                    cardTypeText = 'VISA';
                } else if (cardType === '5') {
                    cardTypeText = 'MASTER';
                }


                function displayExpDateError(message) {
                    expDateErrorDiv.innerText = message;
                }

            }

            emailInput.addEventListener('blur', function () {
                var emailValue = emailInput.value.toLowerCase();

                // Regular expression for a more comprehensive email pattern
                var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                if (!emailPattern.test(emailValue)) {
                    emailErrorDiv.innerText = 'Please enter a valid email address.';
                } else {
                    var domain = emailValue.split('@')[1]; // Get the domain part after '@'
                    if (isValidEmailDomain(domain)) {
                        emailErrorDiv.innerText = ''; // Reset the error message when the email is correct
                    } else {
                        emailErrorDiv.innerText = 'Please enter a valid email domain.';
                    }
                }
            });
        });





       

    // function verifyCode() 
    // {
    //     var enteredCode = $('#entered_code').val();
    //     var popupContent = document.getElementById('popup');
    //     var uid = document.getElementById('u_id').value;

   
    //     //AJAX request to verify the entered code
    //     $.ajax(
    //     {
    //         type: "POST",
    //         url: "user_verify.php",
    //         data: { entered_code: enteredCode },
    //         success: function (verificationResponse) 
    //         {
    //                 console.log(verificationResponse);

    //                 // Update the content of the popup based on verification response
    //                 if (verificationResponse === 'success')
    //                 {
    //                     $.ajax(
    //                     {
    //                         type: "POST",
    //                         url: "paydone.php",
    //                         data: { user_id:uid },
    //                         success: function(response) 
    //                         {
    //                             console.log("Data added to cart successfully");
    //                         }
    //                     });

    //                     popupContent.innerHTML = '<p>Verification successful!</p>';
    //                     document.getElementById('overlay').style.display = 'none';
    //                     setTimeout(function () 
    //                     {
    //                         document.getElementById('popup').classList.remove('visible');

    //                         setTimeout(function () 
    //                         {
    //                             window.location.href = 'log_menu.php?userID=' + uid;
    //                         }, 1000);
    //                     }, 2000);
    //                 } 
    //                 else 
    //                 {
    //                     // Display an error message and allow the user to try again
    //                     popupContent.innerHTML = '<p style="color: red;">Verification failed. Please try again.</p>' +
    //                         '<label for="entered_code">Verification Code</label><br><br>' +
    //                         '<input type="text" id="entered_code" required autocapitalize="none"><br>' +
    //                         '<br><button class="btn" onclick="verifyCode()">Verify</button>';
    //                 }
    //         },
    //     });
    // }



</script>
    
</body>
</html>