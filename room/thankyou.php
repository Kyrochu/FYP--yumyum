<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        @font-face {
            font-family: myFont;
            src: url(Mysterio.ttf);
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 40px;
            background: linear-gradient(to bottom, #fe4365, #fc9d9a, #f9cdad, #c8c8a9,#83af9b);
         
        }
        p {
            color: white;
            margin-bottom: 10px;
            font-size: 30px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .logo {
            max-width: 150px;
            margin-top: 20px;
        }

        .thank-you-img {      
            width: 300px;
            height: 350px;
        }

        .home-button {
            padding: 10px 20px;
            font-size: 15px;
            background-color: goldenrod;
            color: black;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 60px;
            font-weight: bold;
        }
        .p{
            color: black;
            font-size: 30px;
            text-align: center;
            font-family: myFont ;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="royal logo.jpg" alt="Your Logo">
        <p class="p">Your message has been received.</p>
        <img class="thank-you-img" src="thankyou.png" alt="Thank You Image">
        <p class="p">We appreciate your feedback and will get back to you as soon as possible.</p>
        <br>
        <a href="Homepage_UserLogin.php"> Home </a>
    </div>
</body>
</html>
