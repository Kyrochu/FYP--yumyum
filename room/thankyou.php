<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 40px;
            background:goldenrod;  
            overflow-x: hidden;
          }
        h1 {
            color: black;
            font-size: 50px;
        }
        p {
            color: black;
            margin-bottom: 20px;
            font-size: 30px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .thank-you-img {
            max-width: 200px;
            margin-bottom: 20px;
            width: 300px;
            height: 350px;
        }
    .header {
      background: goldenrod;
      padding: 15px 0;
      color: black;
      width: 100%;
      padding-right: 200px;
      
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
    </style>
</head>
<body>
        <header class="header">
            <div class="container">
            <nav class="navbar flex1">
                <ul class="nav-menu">
                <li> <a href="Homepage_UserLogin.php">HOME</a> </li>
     
                </ul>
            </nav>
            </div>
        </header>
    <div class="container">
        <img class="logo" src="royal logo.jpg" alt="Your Logo">
       
        <p>Your message has been received.</p>
        <img class="thank-you-img" src="thankyou.png" alt="Thank You Image">
        <p>We appreciate your feedback and will get back to you as soon as possible.</p>
    </div>
    
</body>
</html>
