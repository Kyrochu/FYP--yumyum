<?php include ("connection_sql.php") ?>

<?php
    session_start();

    // Check if the session variable is set
    if (isset($_SESSION['dataFromPage1']) && isset($_SESSION['data'] )) 
    {
        $total_price = $_SESSION['dataFromPage1'];
        $user = $_SESSION['data'];

        echo "Total from Page 1: " . $total_price;
        echo "Total from Page 1: " . $user;
    } 
    else 
    {
        echo "Session variable not set.";
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/pay.css">
    <link rel="stylesheet" href="css/popup.css">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="AdmimModule/Admin_Style.css">



</head>
<body>
    

<?php

    $sql = "SELECT * FROM users WHERE id = '$user' ";
    $result = mysqli_query($connect, $sql);
    $resultcheck = mysqli_num_rows($result);
  
    if ($resultcheck > 0) 
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $f_name = $row["name"];
            $email = $row["email"];
            $address = $row["address"];
            $city = $row["city"];
            $address = $row["address"];
            $state = $row["state"];
            $postcode = $row["postcode"];
        }
    }
?>

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



<div class="container">
        <form action="" method="post" onsubmit="return save(event)">
            <div class="row">
                <div class="col">
                    <h3 class="title">billing address</h3>
                    <input style="display:none;" type="number" id="u_id" value="<?php echo $user ?>">
                    <input style="display:none;" type="number" id="price" value="<?php echo $total_price ?>">
                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" placeholder="john deo" value="<?php echo $f_name ?>" id="f_name" name="f_name" required>
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com" value="<?php echo $email ?>" id="email" name="email" required>
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality" value="<?php echo $address ?>" required>
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="mumbai" value="<?php echo $city ?>" required>
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" placeholder="india" value="<?php echo $state ?>" required>
                        </div>
                        <div class="inputBox">
                            <span>Post code :</span>
                            <input type="text" placeholder="123 456" value="<?php echo $postcode ?>" maxlength="5" pattern=".{5,6}" title="Enter a valid post code" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">Payment</h3>
                    <div class="inputBox">
                        <span>Cards accepted :</span>
                        <img src="img/masterlogo.png" alt=""><img src="img/visalogo.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>Name on card :</span>
                        <input type="text" placeholder="John Deo" id="card_name"  required>
                    </div>
                    <div class="inputBox">
                        <span>Credit card number :</span>
                        <input type="text" placeholder="1111 2222 3333 4444 " id="card_num" maxlength="19" pattern="[0-9]{19}" title="Enter 16 card number" required>
                    </div>
                    <div id="cardNumberError" class="error"></div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Exp year :</span>
                            <input type="text" placeholder="2022" id="exp_year" maxlength="4" pattern="[0-9]{4}" title="Enter a valid year " required>
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" placeholder="123" id="cvv" maxlength="3" pattern="[0-9]{3}" title="Enter a valid CVV number" required>
                        </div>
                    </div>
                    
                </div>
            </div>
                <button type="submit" class="submit-btn">Proceed to Checkout</button>
                <div id="paymentError" class="error"></div>
        </form>
        <div id="overlay" class="overlay"></div>
        <div id="popup" class="popup" style="text-align: center; " >
            <span>Payment done , Thank you</span>
        </div>
    </div>         



<script src="AdminModule/Date&Time Widget.js" defer> </script> 






<script>
    function save(event) {
            event.preventDefault(); // Prevent form submission
            var user_id = document.getElementById("u_id").value;
            var c_num = document.getElementById("card_number").value;
            var total = document.getElementById("price").value;

            // Validate credit card details
            var cardValidation = validateCreditCardDetails();

            if (cardValidation.valid) {
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
            } else {
                // Display card validation error
                document.getElementById('cardNumberError').innerText = cardValidation.message;
            }

            return false; // Prevent default form submission
        }

        document.addEventListener('DOMContentLoaded', function() {
            var cardNumInput = document.getElementById('card_num');

            cardNumInput.addEventListener('input', function() {
                var trimmedValue = cardNumInput.value.replace(/\s/g, ''); // Remove existing spaces
                var formattedValue = formatCardNumber(trimmedValue);
                cardNumInput.value = formattedValue;
            });

            function formatCardNumber(value) {
                var formattedValue = value.replace(/\D/g, ''); // Remove non-numeric characters
                var spacedValue = '';

                for (var i = 0; i < formattedValue.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        spacedValue += ' '; // Insert space every four characters
                    }
                    spacedValue += formattedValue.charAt(i);
                }

                return spacedValue;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var expYearInput = document.getElementById('exp_year');
            var cvvInput = document.getElementById('cvv');

            expYearInput.addEventListener('input', function() {
                var trimmedValue = expYearInput.value.replace(/\s/g, ''); // Remove existing spaces
                var formattedValue = formatExpYear(trimmedValue);
                expYearInput.value = formattedValue;
            });

            cvvInput.addEventListener('input', function() {
                var trimmedValue = cvvInput.value.replace(/\s/g, ''); // Remove existing spaces
                var formattedValue = formatCVV(trimmedValue);
                cvvInput.value = formattedValue;
            });

            function formatExpYear(value) {
                return value.replace(/\D/g, '').substring(0, 4); // Remove non-numeric characters and limit to 4 digits
            }

            function formatCVV(value) {
                return value.replace(/\D/g, '').substring(0, 3); // Remove non-numeric characters and limit to 3 digits
            }
        });



        document.getElementById("card_name").addEventListener("input", function () {
            document.getElementById('cardNumberError').innerText = '';
        });

        document.getElementById("card_number").addEventListener("input", function () {
            document.getElementById('cardNumberError').innerText = '';
        });

        document.getElementById("exp_year").addEventListener("input", function () {
            document.getElementById('cardNumberError').innerText = '';
        });

        document.getElementById("cvv").addEventListener("input", function () {
            document.getElementById('cardNumberError').innerText = '';
        });

        function validateCreditCardDetails() {
            var cardNumber = document.getElementById("card_number").value;
            var expYear = document.getElementById("exp_year").value;
            var cvv = document.getElementById("cvv").value;

            // Your existing validation code

            // Return an object with validation result and message
            return {
                valid: true, // Change to your validation result
                message: "Your custom validation message", // Change to your validation message
            };
        }

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