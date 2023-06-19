<?php
   include('Data_Connection.php');
?>

<!DOCTYPE html>

<html lang ="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOKING HOTEL</title>
  <style>
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
      background: goldenrod;
      padding: 30px 0;
      color: black;
      width: 100%;
      
    }

    body {
      background:goldenrod;
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

    .grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      grid-gap: 55px;
      margin-left: 250px;
    }
    .room-name {
        font-weight: bold;
        font-size: 20px;
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
      color: #ffffff;
      font-size: 20px;
      text-align: left;
      padding: 10px;
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

    .image-size{
      width: 300px;
      height: 300px;
    }

    #wishlist-container .row .image-size{
          width: 400px;
          height: 250px;
      }

    .content{
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
    <div class="container">
      <nav class="navbar flex1">
        <ul class="nav-menu">
          <li> <a href="#home">HOME</a> </li>
          <li> <a href="#about us">ABOUT</a> </li>
          <li> <a href="#room">ROOM</a> </li>
          <li> <a href="#shop">SHOP</a> </li>
          <li> <a href="#sign in">SIGN IN</a> </li>
        </ul>
      </nav>
    </div>
  </header>

  <section>
    <div class="home" id="home">
      <h1 class="H1">Our Room</h1>

      <div class="content grid">
        <div class="box">
          <span>CEHCK IN</span> <br>
          <input type="date" name="arrival-date" id="arrival-date-input" placeholder="29/20/2021">
        </div>
        
        <div class="box">
          <span>CHECK OUT </span> <br>
          <input type="date" name="departure-date" id="departure-date-input" placeholder="29/20/2021">
        </div>
        
        <div class="box">
          <span>ADULTS</span> <br>
          <input type="number" name="adults" id="adults-input" placeholder="01">
        </div>
        
        <div class="box">
          <span>ROOM TYPE</span> <br>
          <select name="room-type" id="room-type-select">
            <option value="single">Single</option>
            <option value="double">Double</option>
            <option value="deluxe">Deluxe</option>
            <option value="suite">Suite</option>
          </select>
        </div>
      </div>  
    </div>
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

    
    
       
  </section> 

</body>
</html>

<script>
  window.addEventListener("scroll", function() {
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0)
  })
</script>

<script>
  function book_now_button() {
    // 获取输入框和下拉菜单的值
    var arrivalDate = document.getElementById("arrival-date-input").value;
    var departureDate = document.getElementById("departure-date-input").value;
    var adults = document.getElementById("adults-input").value;
    var roomType = document.getElementById("room-type-select").value;

    // 将值存储在本地存储中，以便在booking.html中访问
    localStorage.setItem("arrivalDate", arrivalDate);
    localStorage.setItem("departureDate", departureDate);
    localStorage.setItem("adults", adults);
    localStorage.setItem("roomType", roomType);



  }
 </script>