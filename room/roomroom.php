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
    .navbar
    {
        width: 100%;
        margin: auto;
        padding:auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .navbar img
    {
        width:200px;  
        padding-left:50px;  
    }



    .navbar ul li
    {
        list-style:none;
        display: inline-block;
        margin: 0 20px;
        position: relative;
    }

    .navbar ul i
    {
        color: white;
        margin: 0 2rem 0 2rem;
        height: 30px;
        width: 30px;

    }


    .navbar ul li a
    {
        text-decoration:none;
        text-transform: uppercase;
        color: aliceblue;
    }

    .navbar ul li::after     /* Underline of "Home","About Us","Rooms".... */
    {
        content:"";
        height:3px;
        width:0%;
        background-color:gold;
        position: absolute;
        left: 0;
        bottom: 0;  /* Position of the line */
        transition: 0.5s;
    }


    .room-name {
      font-weight: bold;
      font-size: 20px;
      color: #EBAE34;
      font-family: Youfont;
      margin-left: 130px;
      margin-bottom: 20px;
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
      margin-right: 100px;
      margin-top: 20px; 
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
      margin-left: 25px;
    }

    #wishlist-container .row .image-size {
      width: 400px;
      height: 250px;
    }

    #wishlist-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding-left: 25px;
      width: 100%;
      margin-top: 630px;

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
      border-radius: 60px;
    }

    .video-container video
    {
        position:absolute;
        top:0;
        left:0;
        z-index:-1;
        height:99%;
        width:100%;
        object-fit: cover;
    }
    .video-container {
      width: 100%;
      height: 100%;
      padding: 20px;
    }
    .title{
      color: black;
      margin-top: 10px;
      margin-left: 550px;
      font-size: 50px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
      font-weight: bold;
      font-style: italic;
    }
    .wishlist-item {
      border-radius: 20px; /* 添加圆角边框属性 */
    }
    .price {
      margin-left: 40px;
      font-weight: bold;
      margin-bottom: 20px; /* 添加下边距 */
    }

  
   
  </style>
</head>
<body>
<header> 
        <div class="navbar" style="background-color:black;padding-bottom:30px;"> 

            <img src="royal logo.jpg" alt="No Image">
            
            <ul style="margin-left:700px;">
                <li> <a href="Homepage.php"> Home </a> </li>
                <li> <a href="AboutUs.html"> About us </a> </li>
                <li> <a href="roomroom.php"> Rooms </a> </li>
            </ul>
            
        </div>

    </header>
  
      <div class="video-container">
              <video src="hotel.mp4" id="video-slider" loop autoplay muted> </video>
        </div>

     
  <div id="wishlist-container">
      <div>
        <p class="title">
            ROOMS WE HAVE
        </p>
      </div>
  <?php
  $room_sql = "SELECT * FROM room";
  $room_result = mysqli_query($connect, $room_sql);
  $room_row = mysqli_num_rows($room_result);

  // Define an array of colors
  $colors = array('#ABEBC6', '#ABEBC6', '#ABEBC6', '#ABEBC6', '#ABEBC6', '#ABEBC6');

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

      // Calculate the index of the color based on the counter
      $color_index = $counter % count($colors);
      $background_color = $colors[$color_index];

      echo '<div class="wishlist-item" style="background-color: ' . $background_color . ';">';
      echo '<img src="' . $room_image . '" class="image-size" alt="luxury">';
      echo '<p class="room-name">' . $room_name . '</p>';
      echo '<p class="caption">' . $room_description . '</p>';
      echo '<span class="price">'. "RM ". $room_price . '</span>';
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
