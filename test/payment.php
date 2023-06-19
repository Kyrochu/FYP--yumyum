<?php
    include('Data_Connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Credit Card | Payment</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        *{
            font-family: 'Roboto', sans-serif;
            margin:0; padding:0;
            box-sizing: border-box;
            outline: none; border: none;
            text-decoration: none;
            text-transform: uppercase;
        
        }
       
    .header {
      background: goldenrod;
      padding: 15px 0;
      color: black;
      width: 100%;
      
    }

   .header body {
      background: goldenrod;
      overflow-x: hidden;
    }

   .header li {
      list-style: none;
    }

   .header a {
      text-decoration: none;
      transition: 0.5s;
    }



   .header .navbar {
      display: flex;
      align-items: center;
    }

   .header .nav-menu {
      display: flex;
      justify-content: space-between;
    }

    header ul {
      padding: 0 20px 0 0;
      margin-left: 1000px;
    }

    header li {
      margin-right: 30px;
    }

    header ul li a {
      font-size: 15px;
      color: black;
      text-transform: uppercase;
      font-weight: 500;
      transition: 0.5s;
    }

    header ul li a:hover {
      text-decoration: underline;
    }

    header.sticky {
      z-index: 9999;
      position: fixed;
      width: 100%;
      background: black;
      transition: background 0.3s;
      height: 10vh;
      top: 0;
      padding: 30px 0 0 0;
    }

    header.sticky ul li a {
      color: white;
    }

        #creditcard .container{
            min-height: 100vh;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column;
            padding-bottom: 60px;
        }

        #creditcard form{
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 10px 15px rgba(0,0,0,.1);
            padding: 20px;
            width: 600px;
            padding-top: 160px;
        }

        #creditcard form .inputBox{
            margin-top: 20px;
        }

        #creditcard form .inputBox span{
            display: block;
            color:#999;
            padding-bottom: 5px;
        }

        #creditcard form .inputBox input,
        #creditcard form .inputBox select{
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border:1px solid rgba(0,0,0,.3);
            color:#444;
        }

        #creditcard form .flexbox{
            display: flex;
            gap:15px;
        }

        #creditcard form .flexbox .inputBox{
            flex:1 1 150px;
        }

        #creditcard form .submit-btn, .back-btn{
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            font-size: 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s linear;
            text-transform: uppercase;
            background-color: rgb(203, 203, 203);
            color: black;
            font-weight: bold;
        }

        #creditcard form .submit-btn:hover{
            background-color: black;
            color: white;
        }

        #creditcard form .back-btn{
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            font-size: 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s linear;
            text-transform: uppercase;
            background-color: rgb(203, 203, 203);
            color: black;
            font-weight: bold;
        }

        #creditcard form .back-btn:hover{
            background-color: black;
            color: white;
        }


        #creditcard .card-container{
            margin-bottom: -150px;
            margin-right: 20px;
            position: relative;
            height: 250px;
            width: 400px;
        }

        #creditcard .card-container .front{
            position: absolute;
            height: 100%;
            width: 110%;
            top: 0; left: 0;
            background: rgb(2,0,36);
            background: linear-gradient(45deg, black, goldenrod);
            box-shadow: 0 15px 25px rgba(0,0,0,.2);
            border-radius: 20px;
            backface-visibility: hidden;
            padding:20px;
            transform:perspective(1000px) rotateY(0deg);
            transition:transform .4s ease-out;
        }

        #creditcard .card-container .front .image{
            display: flex;
            align-items:center;
            justify-content: space-between;
            padding-top: 10px;
        }

        #creditcard .card-container .front .image img{
            height: 50px;
        }

        #creditcard .card-container .front .card-number-box{
            padding:33px 0;
            font-size: 22px;
            color:#fff;
        }

        #creditcard .card-container .front .flexbox{
            display: flex;
        }

        #creditcard .card-container .front .flexbox .box:nth-child(1){
            margin-right: auto;
        }

        #creditcard .card-container .front .flexbox .box{
            font-size: 15px;
            color:#fff;
        }

        #creditcard .card-container .back{
            position: absolute;
            top:0; left: 0;
            height: 100%;
            width: 110%;
            background: rgb(2,0,36);
            background: linear-gradient(45deg, black, goldenrod);
            box-shadow: 0 15px 25px rgba(0,0,0,.2);
            border-radius: 20px;
            padding: 20px 0;
            text-align: right;
            backface-visibility: hidden;
            transform:perspective(1000px) rotateY(180deg);
            transition:transform .4s ease-out;
        }

        #creditcard .card-container .back .stripe{
            background: #000;
            width: 100%;
            margin: 10px 0;
            height: 50px;
        }

        #creditcard .card-container .back .box{
            padding: 0 20px;
        }

        #creditcard .card-container .back .box span{
            color:#fff;
            font-size: 15px;
        }

        #creditcard .card-container .back .box .cvv-box{
            height: 50px;
            padding: 10px;
            margin-top: 5px;
            color:#333;
            background: #fff;
            border-radius: 5px;
            width: 100%;
        }

        #creditcard .card-container .back .box img{
            margin-top: 30px;
            height: 30px;
        }
    </style>
</head>
<body>
        <header class="header">
            <div class="container">
                <nav class="navbar flex1">
                    <ul class="nav-menu">
                    <li> <a href="Homepage_UserLogin.php">HOME</a> </li>
                    <li> <a href="AboutUs_UserLogin.html">ABOUT</a> </li>
                    <li> <a href="roomroom.php">ROOM</a> </li>
                    </ul>
                </nav>
            </div>
        </header>
    <div id="creditcard">
        <div class="container">
            <div class="card-container">
                <div class="front">
                    <div class="image">
                        <span id="Icon"></span>
                        <span><img src="\FYP\product_picture\visa.png" alt=""></span>
                    </div>
                    <div class="card-number-box">################</div>
                    <div class="flexbox">
                        <div class="box">
                            <span>card holder</span>
                            <div class="card-holder-name">full name</div>
                        </div>
                        <div class="box">
                            <span>expires</span>
                            <div class="expiration">
                                <span class="exp-month">mm</span>
                                /
                                <span class="exp-year">yy</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="stripe"></div>
                    <div class="box">
                        <span>cvv</span>
                        <div class="cvv-box"></div>
                        <img src="image/visa.png" alt="">
                    </div>
                </div>

            </div>

            <form action="payment.php" method="post" name="carddetail">
                <div class="inputBox">
                    <span>card number<span id="cardIcon"></span></span>
                    <style>
                        #cardIcon{
                            float: right;
                        }
                    </style>
                    <input type="text" id="cardNumber" maxlength="16" class="card-number-input" name="card_number" pattern="[0-9]*">
                    <span id="error_message1" style="color: red;"></span>
                </div>

                <script>
                    document.querySelector('.card-number-input').addEventListener('input', function() {
                        var cardNumber = this.value.trim();
                        var icon = document.getElementById('Icon');
                        icon.innerHTML = "";
                        if (cardNumber.startsWith('4')) {
                            icon.innerHTML = '<img src="visa.png" alt="Visa">';
                        } 
                        else if (cardNumber.startsWith('5')) {
                            icon.innerHTML = '<img src="master.png" alt="Mastercard" style="height: 55px; width: 110px;">';
                        }
                    });
                </script>
                <script>
                    document.getElementById("cardNumber").addEventListener("input", function() {
                        var cardNumber = this.value.trim();
                        var cardIcon = document.getElementById("cardIcon");

                        cardIcon.innerHTML = "";

                        if (cardNumber.startsWith("4")) {
                        cardIcon.innerHTML = "<img src='https://img.icons8.com/color/36/000000/visa.png' alt='Visa' style='height: 40px; width: 40px;'>"; // Add Visa icon
                        } 
                        else if (cardNumber.startsWith("5")) {
                        cardIcon.innerHTML = "<img src='https://img.icons8.com/color/36/000000/mastercard.png' alt='Mastercard' style='height: 40px; width: 40px;'>"; // Add Mastercard icon
                        }
                    });
                </script>

                <div class="inputBox">
                    <span>card holder</span>
                    <input type="text" maxlength="30" class="card-holder-input" id="credit-card-holder-name" name="card_holder_name" pattern="^[a-zA-Z\s]+$">
                    <span id="error_message2" style="color: red;"></span>
                </div>
                <div class="flexbox">
                    <div class="inputBox">
                        <span>expiration yy</span>
                        <select name="year" id="year" class="year-input">
                            <option value="" selected disabled>year</option>
                        </select>
                        <script>
                            let dateDropdown = document.getElementById('year'); 
                            let currentYear = new Date().getFullYear();    
                            let lateYear = new Date().getFullYear() + 10;     
                            while (currentYear <= lateYear) {      
                                let dateOption = document.createElement('option');          
                                dateOption.text = currentYear;      
                                dateOption.value = currentYear;        
                                dateDropdown.add(dateOption);      
                                currentYear += 1;    
                            }
                        </script>
                            <span id="error_message4" style="color: red;"></span>
                    </div>
                    <div class="inputBox">
                        <span>expiration mm</span>
                        <select name="month" id="month" class="month-input">
                            <option value="" selected disabled>month</option>
                        </select>

                        <script>
                            const months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
                            const selectMonth = document.getElementById('month');
                            const yearDropdown = document.getElementById('year');

                            function updateMonthOptions() {
                                const currentYear = new Date().getFullYear();
                                const selectedYear = parseInt(yearDropdown.value);

                                selectMonth.innerHTML = ''; // Clear existing options

                                const option = document.createElement('option');
                                option.value = '';
                                option.disabled = true;
                                option.selected = true;
                                option.text = 'month';
                                selectMonth.add(option);

                                if (selectedYear === currentYear) {
                                    const currentMonth = new Date().getMonth();
                                    for (let i = currentMonth; i < months.length; i++) {
                                        const option = document.createElement('option');
                                        option.value = i + 1;
                                        option.text = months[i];
                                        selectMonth.add(option);
                                    }
                                } else {
                                    for (let i = 0; i < months.length; i++) {
                                        const option = document.createElement('option');
                                        option.value = i + 1;
                                        option.text = months[i];
                                        selectMonth.add(option);
                                    }
                                }
                            }

                            yearDropdown.addEventListener('change', updateMonthOptions);
                            updateMonthOptions();
                        </script>

                        <span id="error_message3" style="color: red;"></span>
                    </div>
                    
                    <div class="inputBox">
                        <span>cvv</span>
                        <input type="text" maxlength="3" name="cvv" class="cvv-input" id="cvv">
                        <span id="error_message5" style="color: red;"></span>
                    </div>
                </div>
                <input type="submit" value="submit" name="card2_validate" class="submit-btn" onclick="return validate()">
                <input type="button" value="back" class="back-btn" onclick="return backpage()">
            </form>
        </div>
    </div>        
</body>
</html>

<script>
    function backpage(){
        window.location.href = "payment_main_page.php";
    }

    function onlyLettersAndSpaces(str) {
        return /^[A-Za-z\s]*$/.test(str);
    }

    function validate(){
        let name, cardnumber, expm, expy, cvv;
        let w1 = false, w2 = false, w3 = false, w4 = false, w5 = false;
                            
        cardnumber = document.getElementById("cardNumber");

        var cardno1 = /^4[0-9]{15}$/;
        var cardno2 = /^5[0-9]{15}$/;

        if(cardnumber.value.match(cardno1) || cardnumber.value.match(cardno2)) {
            document.getElementById("error_message1").innerHTML = "";
            w2 = true;
        }
        else{
            document.getElementById("error_message1").innerHTML = "Please input right value.";
        }

        name = document.getElementById("credit-card-holder-name").value;
        var vname = onlyLettersAndSpaces(name);

        if (name == "") {
            document.getElementById("error_message2").innerHTML = "Please input a value.";
        } 
        else if (vname && name.length >= 5) {
            document.getElementById("error_message2").innerHTML = "";
            w1 = true;
        } 
        else {
            document.getElementById("error_message2").innerHTML = "Please input a valid name.";
        }

        expm = document.getElementById("month").value;
        expy = document.getElementById("year").value;
        var today = new Date();

        const d = new Date();
        let year = d.getFullYear();
        if(expm === ""){
            document.getElementById("error_message3").innerHTML = "Please select a month.";
        }
        else{
            if(expm < (today.getMonth() + 1) && expy <= year){
                document.getElementById("error_message3").innerHTML = "Please select a valid expiration date.";
            }  
            else{
                document.getElementById("error_message3").innerHTML = "";
                w3 = true;
            }
        }
        if(expy < year){
            document.getElementById("error_message4").innerHTML = "Please select a valid year.";
        }
        else{
            document.getElementById("error_message4").innerHTML = "";
            w4 = true;
        }

        cvv = document.getElementById("cvv");
        var cvvpattern = /^[0-9]{3}$/;
        if(cvv.value.match(cvvpattern)){
            document.getElementById("error_message5").innerHTML = "";
            w5 = true;
        }
        else{
            document.getElementById("error_message5").innerHTML = "Please input right value.";
        }

        if(w1 && w2 && w3 && w4 && w5){
            window.location = 'receipt.php';
            return true;    
        }
        return false;
    }
</script>
<script>
    document.querySelector('.card-number-input').oninput = () => {
        let cardNumber = document.querySelector('.card-number-input').value;
        cardNumber = cardNumber.replace(/(\d{4})(?=\d)/g, '$1 ');
        cardNumber = cardNumber.replace(/([a-zA-Z]{4})(?=[a-zA-Z])/g, '$1 ');
        document.querySelector('.card-number-box').innerText = cardNumber;
    }

    document.querySelector('.card-holder-input').oninput= () =>{
        document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value.toUpperCase();
        document.getElementById('credit-card-holder-name').setCustomValidity('');
    }
        
    document.querySelector('.month-input').oninput= () =>{
        document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
    }

    document.querySelector('.year-input').oninput= () =>{
        const y = document.querySelector('.year-input').value;
        const ltwodigits = y.toString().slice(-2);
        document.querySelector('.exp-year').innerText = ltwodigits;
    }

    document.querySelector('.cvv-input').onmouseenter= () =>{
        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
    }
        
    document.querySelector('.cvv-input').onmouseleave= () =>{
        document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
        document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(-180deg)';
    }

    document.querySelector('.cvv-input').oninput= () =>{
        document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
    }
</script>

<script>
  window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0)
  })
</script>

<?php
    if(isset($_POST['card2_validate'])){
        $card_number = $_POST['card_number'];
        $card_holder_name = $_POST['card_holder_name'];
        $expire_year = $_POST['year'];
        $expire_month = $_POST['month'];
        $cvv = $_POST['cvv'];

        $validate_query_sql = "SELECT * FROM credit_card WHERE card_number = '$card_number' AND card_holder_name = '$card_holder_name' AND expiry_month = '$expire_month' AND expiry_year = '$expire_year' AND cvv = '$cvv'";

        $result = $connect->query($validate_query_sql);

        if($result -> num_rows > 0){
            ?>
                <script>
                    Swal.fire({
                        title: 'Success',
                        text: 'Success!',
                        icon: 'success',
                        showConfirmButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            redirectToPaymentPage();
                        }
                    });

                    function redirectToPaymentPage() {
                        window.location = "thankyou.php";
                    }
                </script>
            <?php
        }
        else{
            ?>
                <script>
                    Swal.fire({
                        title: 'Error',
                        text: 'Invalid card details. Please try again!',
                        icon: 'error'
                    });
                </script>
            <?php
        }
    }
?>