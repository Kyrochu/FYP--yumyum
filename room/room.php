<!DOCTYPE html>

<html lang ="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOOKING HOTEL</title>
  <style>
    *{
      
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
      padding: 15px 0;
      color: black;
      width: 100%;
      
    }

    body {
      background: goldenrod;
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

    footer {
      background-color: black;
      width: 100%;
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
      width: 40em;
      height: 40em;
    }

    .image-section img {
      width: 100%;
      height: auto;
      transition: transform 0.5s; /* Add transition property for image */
    }

    .image-section .overlay {
      position: absolute;
      bottom: -100%; /* Move the overlay below the image initially */
      left: 0;
      width: 100%;
      height: 80%;
      background-color: rgba(59, 59, 59, 0.8); /* Lighten the color */
      color: #000; /* Set text color to black */
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0; /* Hide the overlay initially */
      transition: bottom 0.5s, opacity 0.5s; /* Add transition properties */
    }

    .image-section:hover .overlay {
      bottom: 0; /* Slide the overlay up */
      opacity: 1; /* Show the overlay */
    }

    .image-section::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* 这里的最后一个参数 0.5 控制透明度 */
      opacity: 0; /* 初始时设置为透明 */
      transition: opacity 0.5s; /* 添加过渡效果 */
    }

    .image-section:hover::after {
      opacity: 1; /* 鼠标悬停时显示黑色版 */
    }


    .content{
      float: right;
    } 
    footer .contact-info{
      margin-left: 50px;
      padding-top: 50px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, auto));
      gap: 3rem;
      padding-bottom: 30px;
    }
    
    footer .first-info .companyname{
      color: white;
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
    }
    
    footer .first-info .companyaddress{
      color: white;
      font-size: 15px;
    }
    
    footer .first-info a{
      color: white;
      font-weight: bold;
      cursor: pointer;
      
    }
    
    footer .first-info a:hover{
      color: goldenrod;
      text-decoration: underline;
    }
    
    footer .second-info a{
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    
    footer .second-info a:hover{
      color: goldenrod;
      text-decoration: underline;
    }
    
    footer .third-info a{
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    
    footer .third-info a:hover{
      color: goldenrod;
      text-decoration: underline;
    }
    
    footer .fourth-info a{
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    
    footer .fourth-info a:hover{
      color: goldenrod;
      text-decoration: underline;
    }
    
    footer .social-icon img{
      cursor: pointer;
      background-color: white;
    }
    
    footer .social-icon img:hover{
      background-color: goldenrod;
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
    <div class="wrapper">
      <div class="row">
        <div class="image-section">
          <img src="luxury room.jpg"  class="image-size" alt="luxury">
          <div class="overlay">
            <p class="caption">Lavish bathrooms with upscale features such as heated floors and soaking tubs. High-end, lush linens and towels. Deluxe pillows and mattresses so your sleeping hours are as blissful as your waking ones. Beautiful views in every direction – inside and out</p>
          </div>
        </div>
        <div class="content">
          <a href="booking.html" class="book-now-button" >Book Now</a>  
        </div>
      </div>
    </div>
    <div class="wrapper">
      <div class="row">
        <div class="image-section">
          <img src="double room.png"  class="image-size" alt="luxury">
          <div class="overlay">
            <p class="caption">A double room is a type of hotel or accommodation option that is designed to accommodate two people. It typically features a larger bed compared to a single room, providing more space and comfort for two occupants.</p>
          </div>
        </div>
        <div class="content">
          <a href="payment.php" class="book-now-button" >Book Now</a>  
        </div>
      </div>
      <style>
        .row{
          margin: 90px;
        }
      </style>
    </div>
       
  </section> 

  <footer style="margin-top: 40px;">
    <div class="contact-info">
      <div class="first-info">
          <img src="FT.png" alt="heart" style="height: 66px; width: 80px;">
          <p class="companyname">company name</p>
          <p class="companyaddress">Aeon Bandaraya Melaka Shopping Centre</p>
          <p class="companyaddress">F59/60/61,First Floor,AEON Bandaraya Melaka Shopping Centre </p>
          <p class="companyaddress">,No.2, Jalan Legenda, Taman 1-Legenda,MELAKA,75400,Melaka</p>
          <br>
          <p><a href="tel:0127978456">0127978456</a></p>
          <p><a href="mailto:ali@student.mmu.edu.my">ali@student.mmu.edu.my</a></p>

          
      </div>

      <div class="second-info">
          <h4 style="font-weight: bold; font-size: 20px; color: white;">Branch locations</h4>
          <br>
          <p><a href="https://www.google.com/">Shah Alam, Kuala Lumpur</a></p>
          <p><a href="https://www.google.com/">Melaka</a></p>
          <p><a href="maps.html">Penang</a></p>
          <p><a href="maps.html">Johor</a></p>
      </div>

      <div class="third-info">
          <h4 style="font-weight: bold; font-size: 20px; color: white;">Quick Links</h4>
          <br>
          <p><a href="Homepage.html"> Home </a></p>
          <p><a href="  "> Rooms </a></p>
          <p><a href="  "> Cart </a></p>
          <br>
      </div>

      <div class="fourth-info social-icon">
        <h4 style="font-weight: bold; font-size: 20px;">Follow us</h4>
        <a href="#"><img src="user-solid-24.png" title="User Login"></a>
        <a href="#"><img src="help-circle-solid-24.png" title="Help"></a>
        <a href="#"><img src="cart-solid-24.png" title="Cart"></a>
        <a href="mailto:121128894@student.mmu.edu.my"><img src="gmail-logo-24.png" title="Mail Us"></a>
        <a href="tel:0167979789"><img src="phone-regular-24.png" title="Phone Us"></a>  
      </div>
     
  </div>
  </footer>
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