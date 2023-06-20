<!DOCTYPE html>
<html>
    
<head> 
    <title> Royal Hotel </title>   
    
    <link rel="stylesheet" href="HPstyle.css">
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
</head>

<body>

    <?php include("customer_comment.php"); ?>    

    <!-- Header of Homepage -->
    <header> 
    
        
    <!-- <h1 class="Welcome" style="background-color:dimgrey;"> <span class="W">W</span>elcome to <span class="F">F</span>antastos <span class="H">H</span>otel </h1> -->

        <div class="navbar" style="background-color:black;padding-bottom:30px;"> 

            <img src="Pictures/royal logo.jpg" alt="No Image">
            
            <ul style="margin-left:700px;">
                <li> <a href="Homepage.php"> Home </a> </li>
                <li> <a href="AboutUs.html"> About us </a> </li>
                <li> <a href="login.php"> Rooms </a> </li>
                <li> <a href="login.php"> Register/Log in </a> </li>
            </ul>
            
        </div>

    </header>

    <!-- Homepage Section -->

    <section class="home">

        <div class="content">

            <h3> Welcome to A global icon of luxury </h3>
            <p> Discover new places with us, luxury awaits </p>

        </div>

        <!-- <div class="controls">

            <span class="vid-btn active" data-src="Pictures/2 Minutes on The Most Beautiful Beach [4K].mp4"> </span>
            <span class="vid-btn" data-src="Pictures/GUADELOUPE in less than 2 MINUTES! in 4K!"> </span>

        </div> -->

        <div class="video-container">

            <video src="Pictures/2 Minutes on The Most Beautiful Beach [4K].mp4" id="video-slider" loop autoplay muted> </video>
   
        </div>

    </section>

    <!-- Homepage Section End -->

    <!-- Intro Section -->

    <section class="intro">

        <h1 class="Heading">

            <span>F</span>
            <span>E</span>
            <span>A</span>
            <span>T</span>
            <span>U</span>
            <span>R</span>
            <span>E</span>
            <span>S</span>

        </h1>

        <div class="box-container">

            <div class="box">
                <img src="Pictures/double.jpg" alt="No Image">

                <div class="content">

                   <h3> <i class="fas fa-map-marker-alt"> </i> DOUBLE ROOM </h3> 
                   <br>
                   <p style="color:goldenrod"> >> ROOMS THAT IS SUITABLE FOR COUPLE,GROUPS OF FRIENDS OR BUSINESS TRAVELERS </p>
                   <br>
                   <div class="star">

                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                   </div> 

                </div>
            </div>

            <div class="box">
                <img src="Pictures/family room.jpg" alt="No Image">

                <div class="content">

                   <h3> <i class="fas fa-map-marker-alt"> </i> FAMILY ROOM </h3> 
                   <br>
                   <p style="color:goldenrod"> >> ROOMS THAT IS SUITABLE FOR FAMILIES </p>
                   <br>
                   <br>
                   <div class="star">

                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                   </div>
                 

                </div>
            </div>

        </div>

    </section>
    <!-- Intro Section End -->

    <!-- Comment Section -->
    
    <section class="cmtNcont">
        
        <h1 class="Heading">

            <span>C</span>
            <span>O</span>
            <span>M</span>
            <span>M</span>
            <span>E</span>
            <span>N</span>
            <span>T</span>
            <span>S</span>

        </h1>

        <div class="row">
            
            <div class="BoyGirlimg">
                <img src="Pictures/BoyNGirl.jpg" alt="No Image">
            </div>

            <form name="Comment" method="POST">

                <div class="inputBox">
                    <p>
                        <h3>Name:</h3><input type="text" placeholder="Your Name" name="username" style="font-size:15px;color:black"> 
                    </p>

                    <p>
                        <h3>Email:</h3><input type="email" placeholder="Your Email" name="useremail" style="font-size:15px;color:black"> 
                    </p>

                    <p>
                        <h3>Comment Box:</h3> <textarea placeholder="Leave your comments here" name="comment" cols="30" rows="20" style="font-size:15px;padding-left:8px;padding-top:5px;"></textarea>
                    </p>

                </div>

                <input type="submit" class="Subbtn" name ="btn" value="SUBMIT">

            </form>
        
        </div>

    </section>

    <!-- Comment Section End-->

    <!-- Footer of Homepage -->

    <footer>

        <div class="box-container">

            <div class="box">

                <h3> About US</h3>
                <p> WE ARE FROM GROUP 09 AND THIS IS OUR HOTEL BOOKING MANAGEMENT WEBSITE</p>
                <br>
                <p> 1211205395 BRIAN LEE CHONG MING </p>
                <p> 1211205392 CHU WEI WANG </p>
                <p> 1211205394 JAMES LEW MING REN</p>

            </div>
            
            <div class="box">

                <h3> Branch Locations </h3>
                <p> Shah Alam,Kuala Lumpur </p>
                <p> Melaka </p>
                <p> Penang </p>
                <p> Johor </p>

            </div>

            <div class="box">

                <h3> Quick Links </h3>
                <a href="Homepage.php"> Home </a>
                <a href="roomroom.php"> Rooms </a>

            </div>

            <div class="box">

                <h3> Follow us </h3>
                <a href="https://www.facebook.com/" target="_blank"> Facebook </a>
                <a href="https://www.instagram.com/" target="_blank"> Instagram </a>
                <a href="https://twitter.com/?lang=en-my" target="_blank"> Twitter </a>

            </div>

        </div>

    </footer>

    <!-- Footer of Homepage End-->
        
</body>


</html>