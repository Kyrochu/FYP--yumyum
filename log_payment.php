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

    <form action="" method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>
                <input style="display:none;" type="number" id="u_id" value="<?php echo $user ?>" >
                <input style="display:none;" type="number" id="price" value="<?php echo $total_price ?>" >

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
                        <span>zip code :</span>
                        <input type="text" placeholder="123 456" value="<?php echo $postcode ?>" required>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="img/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="john deo" id="card_name" required>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" id="card_number" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="123" required>
                    </div>
                </div>

            </div>

        </div>

        <input type="submit" value="proceed to checkout" name="submit_order" class="submit-btn" onclick="save(event)">

    </form>


    
    <div id="overlay" class="overlay"></div>
    <div id="popup" class="popup" style="text-align: center; " >
        <label for="entered_code">Verification Code</label><br><br>
        <input type="text" id="entered_code" required autocapitalize="none"><br>
        <br><button class="btn " onclick="verifyCode()">Verify</button>
    </div>

            

</div>    



<script src="AdminModule/Date&Time Widget.js" defer> </script> 






<script>
    function save(event) {
        event.preventDefault(); // Prevent form submission

        var user_id = document.getElementById("u_id").value;
        var c_num = document.getElementById("card_number").value;
        var total = document.getElementById("price").value;

        console.log(user_id, c_num, total);

        $.ajax({
            type: "POST",
            url: "receipt_save.php",
            data: { u_id: user_id, card_num: c_num, total_price: total },
            success: function (response) {
                console.log("done");

                $.ajax({
                    type: "POST",
                    url: "send_email.php",
                    data: { name: $('#f_name').val(), email: $('#email').val() },
                    success: function (emailResponse) {
                        console.log("Email sent");
                    },
                });

                

                // Show the popup
                document.getElementById('overlay').style.display = 'block';
                document.getElementById('popup').style.display = 'block';

                setTimeout(function() {
                    document.getElementById('popup').classList.add('visible');
                }, 10);
            },
        });
    }

    function verifyCode() 
    {
        var enteredCode = $('#entered_code').val();
        var popupContent = document.getElementById('popup');
        var uid = document.getElementById('u_id').value;

   
        //AJAX request to verify the entered code
        $.ajax(
        {
            type: "POST",
            url: "user_verify.php",
            data: { entered_code: enteredCode },
            success: function (verificationResponse) 
            {
                    console.log(verificationResponse);

                    // Update the content of the popup based on verification response
                    if (verificationResponse === 'success')
                    {
                        popupContent.innerHTML = '<p>Verification successful!</p>';
                        document.getElementById('overlay').style.display = 'none';
                        setTimeout(function () 
                        {
                            document.getElementById('popup').classList.remove('visible');

                            // Redirect to the log_menu page after 1.5 seconds (1500 milliseconds)
                            setTimeout(function () 
                            {
                                window.location.href = 'log_menu.php?userID=' + uid;
                            }, 1000);
                        }, 2000); // Display success message for 2 seconds (adjust as needed)
                    } 
                    else 
                    {
                        // Display an error message and allow the user to try again
                        popupContent.innerHTML = '<p style="color: red;">Verification failed. Please try again.</p>' +
                            '<label for="entered_code">Verification Code</label><br><br>' +
                            '<input type="text" id="entered_code" required autocapitalize="none"><br>' +
                            '<br><button class="btn" onclick="verifyCode()">Verify</button>';
                    }
            },
        });
    }



</script>
    
</body>
</html>