<?php
   include('Data_Connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOKING HOTEL</title>
  <style>
    @font-face {
      font-family: myFont;
      src: url(Mysterio.ttf);
    }
    @font-face {
      font-family: Youfont;
      src: url(Super\ Comic.ttf);
    }
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body{
      margin: 0;
    }
    .H1 {
      text-align: center;
      font-size: 500%;
      font-weight: bold;
      color: white;
      font-style: italic;
    }

    .header {
      background: black;
      padding: 30px 0;
      color: black;
      width: 100%;
      position: relative; 
    }

    .logo {
      position: absolute;
      top: 10px;
      left: 10px;
    }

    .logo img {
      width: 90px; 
      height: 50px; 
    }

    .font{
      font-weight: bold;
    }

    body {
      background:white;
      overflow-x: hidden;
    }

    li {
      list-style: none;
    }

    a {
      text-decoration: none;
      transition: 0.5s;
    }

    .head {
      height: 10vh;
      line-height: 10vh;
      top: 0;
    }

    .navbar {
      display: flex;
      align-items: center;
    }

    .nav-menu {
      display: flex;
      justify-content: space-between;
    }

    header ul {
      padding: 0 20px 0 0;
      margin-left: 1250px;
    }

    header li {
      margin-right: 30px;
    }

    header ul li a {
      font-size: 15px;
      color: goldenrod;
      text-transform: uppercase;
      font-weight: 500;
      transition: 0.5s;
    }

    header ul li a:hover {
      text-decoration: underline;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      grid-gap: 55px;
      margin-left: 250px;
    }

    .room-name {
      font-weight: bold;
      font-size: 20px;
      color: goldenrod;
      font-family: Youfont;
    }

    .book-now-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: black;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
      margin-left: 5em;
      margin-top: 100px;
      margin-right: 100px;
    }

    .caption {
      color: black;
      font-size: 20px;
      text-align: justify;
      padding: 10px;
      font-family: myFont ;
    }

    .home {
      background-image: url("ho.jpeg");
      height: 100vh;
      padding: 1%;
      margin: -10px -10px;
      background-position: sticky;
      background-repeat: no-repeat;
      background-size: cover;
      text-align: center;
    }

    .home .content {
      text-align: left;
      color: black;
      margin-top: 25%;
    }

    .home .box {
      margin-top: 55px;
      width: 200px;
      padding: 10px;
      border: 1px solid black;
      text-align: center;
      background-color: goldenrod;
    }

    .home input {
      margin-top: 10px;
    }

    input {
      border: none;
      outline: none;
    }

    .text {
      flex: 1;
      margin-left: 100px;
    }

    .book-now-button:hover {
      background-color: #5c4701;
    }

    .wrapper {
      width: 100%;
      overflow: hidden;
      margin-top: 100px;
    }

    .image-section {
      width: 30%;
      float: left;
      position: relative;
      overflow: hidden;
    }

    .image-size {
      width: 300px;
      height: 300px;
    }

    #wishlist-container .row .image-size {
      width: 400px;
      height: 250px;
    }

    .content {
      float: right;
    }

    #wishlist-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding-left: 25px;
      width: 100%;
    }

    .row {
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .wishlist-item {
      width: 30%;
      padding-top: 50px;
      margin: 10px;
    }

    .wishlist-item img {
      width: 100%;
      height: auto;
    }
    
  </style>
</head>
<body>
  <header class="header">
    <div class="logo">
      <img src="royal logo.jpg" alt="Logo">
    </div>
    <div class="container">
      <nav class="navbar flex1">
        <ul class="nav-menu">
          <li><a href="Homepage_UserLogin.php" class="font">HOME</a></li>
          <li><a href="AboutUs_UserLogin.html" class="font">ABOUT</a></li>
          <li><a href="roomroom.php" class="font">ROOM</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div id="wishlist-container">
    <?php
    $room_sql = "SELECT * FROM room";
    $room_result = mysqli_query($connect, $room_sql);
    $room_row = mysqli_num_rows($room_result);

    if ($room_row == 0) {
      mysqli_close($connect);
    } else {
        $counter = 0; // Counter to keep track of rooms in each row
           while ($room_row = mysqli_fetch_array($room_result)) {

            $room_name = $room_row['room_name'];
            $room_price = $room_row['room_price'];
            $room_image = $room_row['room_image'];
            $room_description = $room_row['room_description'];

        if ($counter % 3 == 0) {
          echo '<div class="row">';
        }

        echo '<div class="wishlist-item">';
        echo '<img src="' . $room_image . '" class="image-size" alt="luxury">';
        echo '<p class="room-name">' . $room_name . '</p>';
        echo '<p class="caption">' . $room_description . '</p>';
        echo '<span>'. "RM ". $room_price . '</span>';
        echo '<a href="payment.php" class="book-now-button">Book Now</a>';
        echo '</div>';

        $counter++;

        if ($counter % 3 == 0) {
          echo '</div>'; // Close the row after displaying three rooms
        }
      }

      // Close the row if the number of rooms is not divisible by 3
      if ($counter % 3 != 0) {
        echo '</div>';
      }
    }
    ?>
  </div> 
</body>
</html>
