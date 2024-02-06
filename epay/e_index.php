
<!DOCTYPE html>
<html>
    
    <head>
        <title> YumYum Menu List </title>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> <!-- Link for Icon Style  -->
        
        <!-- JQuery CDN Link -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <!-- Libraries Stylesheet -->
        <link href="../lib/animate/animate.min.css" rel="stylesheet">
        <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- java script for pass var to php -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- Customized Bootstrap Stylesheet -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">   
        <link rel="stylesheet" href="../css/epay.css">  <!-- CSS for Admin Page -->                                                                                         

        <script>

            $(document).ready(function()
            {
                //JQuery for expanding and collapsing the sidebar

                $('.menu-btn').click(function()
                {
                    $('.side-bar').addClass('active');
                    $('.menu-btn').css("visibility","hidden");

                });

                //Closing button

                $('.close-btn').click(function()
                {
                    $('.side-bar').removeClass('active');
                    $('.menu-btn').css("visibility","visible");
                });

                //Toggle Sub-Menu

                $('.sub-btn').click(function()
                {
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });
            })
        </script>

        <!-- Javascript  -->

        <script src="../AdminModule/Date&Time Widget.js" defer> </script>  <!-- defer means script only going to be execute once document is opened --> 
        <script src="AddCategory.js"> </script>

        <script>
            function validateDecimalInput(input) 
            {
                // Remove any non-digit and non-dot characters
                input.value = input.value.replace(/[^0-9.]/g, '');

                // Ensure only one dot is allowed
                input.value = input.value.replace(/(\..*)\./g, '$1');

                // Ensure up to two decimal places without leading zeros
                var parts = input.value.split('.');
                if (parts.length > 1) {
                    parts[1] = parts[1].slice(0, 2); // Take only up to two decimal places
                    input.value = parts.join('.');
                }
            }
        </script>


    </head>

    <body>
        <?php
            if (isset($_GET['uid'])) {
                $uid = $_GET['uid'];

            }
        ?>

            <div class="side-bar">
                <!-- Header Section -->
                <div class="menu">
                    <div class="item"><a href="AdminProfileSuper.php?id=<?php echo $id; ?>"><i class="fab fa-jenkins"></i> <span class="menu-text"> My Profile </span> </a></div>
                    <div class="item"><a href="SuperAdminPanel.php?id=<?php echo $id; ?>"><i class="fas fa-desktop"></i> <span class="menu-text"> Dashboard </span> </a></div>
                    <div class="item"><a class="sub-btn"><i class="fas fa-user"></i> <span class="menu-text"> Accounts </span>                    
                        <!-- Dropdown List (Accounts)-->
                        <i class="fas fa-angle-right dropdown" id="menu-icon"> </i>
                        </a>
                            <div class="sub-menu">
                                <a href="SubUserAccSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> User </span> </a>
                                <a href="SubAdminAccSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Admin </span> </a>
                            </div>               
                    </div>

                    <div class="item"><a class="sub-btn"><i class="fa fa-cutlery"></i> <span class="menu-text"> Manage </span>                    
                        <!-- Dropdown List (Manage)-->
                        <i class="fas fa-angle-right dropdown" id="menu-icon"> </i>
                        </a>
                            <div class="sub-menu">
                                <a href="MenusSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Menu </span> </a>                                                  
                            </div>         
                    </div>

                    <div class="item"><a class="sub-btn"><i class="fas fa-book-reader"></i> <span class="menu-text"> Orders </span>                 
                        <!-- Dropdown List (Orders)-->
                        <i class="fas fa-angle-right dropdown" id="menu-icon"> </i>
                        </a>
                            <div class="sub-menu">
                                <a href="StatusSuper.php?id=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> Status </span></a>
                                <a href="HistorySuper.phpid=<?php echo $id; ?>" class="sub-item"> <span class="menu-text"> History </span> </a>
                            </div>          
                    </div>

                    <div class="item"><a href=""><i class="fa fa-commenting"></i> <span class="menu-text"> Reviews </span> </a></div>                   
                    <div class="item">
                        <div class="logout">
                            <a href="Logout.php"><i class="fas fa-sign-out-alt"> </i> <span class="menu-text"> Logout </span> </a>
                        </div>
                    </div>
                </div>
            </div>  
        
        <!-- Date & Time Widget -->
        
        <div class="datetime border " style="box-shadow: 10px 10px 10px white;">
            <div class="internal">
                <div class="main-content">
                    <div class="header-title">
                        <span> Welcome </span>
                        <h2> User </h2>
                    </div>
                </div>

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
                <br><br><br><br><br>    
                <hr>
            </div>

        </div>    
        <br><br>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6"> <!-- Adjust the column width as needed -->
                    <div class="cardtab card text-bg-light mb-3" style="box-shadow: 10px 10px 10px white;">
                        <div class="card-header"><h5>Wallet</h5></div>
                        <div class="card-body">
                            <h2 class="card-title">Your Debit </h2>
                            <h3 class="card-text">RM 100.00</h3>
                            <?php echo $uid ?>
                            
                        </div>
                        <button type="button" class="btn btn-danger">Top Up</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>                                                           

    </body>

</html>