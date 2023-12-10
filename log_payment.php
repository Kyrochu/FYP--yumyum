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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>

<?php
    $sql = "SELECT * FROM users WHERE id = '15' ";
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

<div class="container">

    <form action="" method="post"  >

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>
                <input style="display:none;" type="number" id="u_id" value="<?php echo $user ?>" >
                <input style="display:none;" type="number" id="price" value="<?php echo $total_price ?>" >

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="john deo" value="<?php echo $f_name ?>" id="f_name" >
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="example@example.com" value="<?php echo $email ?>" >
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="room - street - locality" value="<?php echo $address ?>" >
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="mumbai" value="<?php echo $city ?>" >
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="india" value="<?php echo $state ?>" >
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="123 456" value="<?php echo $postcode ?>" >
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
                    <input type="text" placeholder="john deo" id="card_name"  >
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" id="card_number" >
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="123" >
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" name="submit_order" class="submit-btn" onclick="save(event)" >

    </form>

</div>    

<script>
    function save(event) {
    event.preventDefault(); // Prevent form submission

    var user_id = document.getElementById("u_id").value;
    var c_num = document.getElementById("card_number").value;
    var total = document.getElementById("price").value;

    console.log(user_id , c_num , total);

    $.ajax(
    {
        type: "POST",
        url: "receipt_save.php", 
        data: {u_id: user_id , card_num : c_num , total_price: total }, 
        success: function (response) 
        {
            console.log("done");
        },
    });
}
</script>
    
</body>
</html>