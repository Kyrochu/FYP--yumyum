<?php include ("connection_sql.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link href="css/test.css" rel="stylesheet">

    <link href="css/popup.css" rel="stylesheet">

    <!-- java script for pass var to php -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

<?php
    $uid = isset($_GET['userID']) ? $_GET['userID'] : null;

    $sql = "SELECT COUNT(*) AS totalRows FROM cart WHERE cart.user_id = '$uid' AND cart_food_delete = '1'";
    $result = mysqli_query($connect, $sql);


    if ($result) 
    {
  
        $row = mysqli_fetch_assoc($result);
        $totalRows = $row['totalRows'];
    }

    $user = "SELECT * FROM users WHERE id = '$uid'";
    $user_result = mysqli_query($connect, $user);
    $row_user = mysqli_fetch_assoc($user_result);


?>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <a href="" class="nav-item nav-link " onclick="login()">Menu</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <a href="about.html" class="nav-item nav-link  ">About</a>
                    </div>
                        <a href="login/login.php" class="btn btn-primary py-2 px-4"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" id="checkoutBtn">Login/Register</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">The emperor was noble, but at the same time, he was chosen by fate. Pain endured, pain spoken. Some loved him, some hated him. There was love and hate, and they existed. Chosen was the place, and lorem sat there. But, standing firm, lorem remained. The chosen duo, just and noble, endured pain.</p>
                        </div>
                        <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                            <img class="img-fluid" src="img/hero.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Master Chefs</h5>
                                <p>Our chef have 5 years work experience</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Quality Food</h5>
                                <p>Our food will make sure the taste good</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                <h5>Online Order</h5>
                                <p>We will make sure your delivery food when arive on ur hand will be perfect</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                <h5>24/7 Service</h5>
                                <p>On the shop opening time we will make sure give u a service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                        <p class="mb-4">The time was noble, the matter at hand was chosen. Painful, but pain itself. Some loved, some hated, and they were chosen, spoke and sat, but lorem remained standing.</p>
                        <p class="mb-4">The time was noble, the matter chosen. Pain was itself, pain itself. Some loved, some hated, and them. Chosen was the place, and lorem and sit, but lorem remained sitting, chosen, just, great pain was.</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">40</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">Foods</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->




        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonial</h5>
                    <h1 class="mb-5">Our Clients Say</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Good teste</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">John</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Nice teste</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Mei</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Nice teste</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Jonathan</h5>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Nice teste</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Ali</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Reservation</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+6012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>yumyumdeliveryfood@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Welcome to our Restaurant. </p>
                        
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- cart start -->
    <div class="cartfile">
        <div class="contian">
            <div class="carttab">
                <div class="cart-list_container">
                    <h1 class="">Shopping Cart</h1>
                    <button class="closex btn-close " aria-label="Close"></button>
                    <?php

                    //$sql = "SELECT * FROM cart JOIN menu ON cart.food_id = menu.food_id WHERE cart.userID = '$uid'";

                    $sql = "SELECT * FROM cart
                            JOIN menu ON cart.food_id = menu.food_id
                            WHERE cart.user_id = '$uid' AND cart.cart_food_delete = '1'";

                    $result = mysqli_query($connect, $sql);
                    $resultcheck = mysqli_num_rows($result);

                    if ($resultcheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="listcart">
                                <div class="item border shadow text-black p-3 " style="border-radius: 10px;" >
                                    <img src="./img/<?php echo $row['food_img']; ?>" alt="">
                                    <div class="name">
                                        <?php echo $row['food_name'] ?><br>
                                        <span class="badge "><?php echo $row['add_on_name'] ?></span>
                                    </div>
                                    <div class="price">RM <?php echo number_format($row['food_total_price'], 2); ?></div>
                                    
                                    <div class="qty">
                                        <span class="minus decrement"  data-food-id="<?php echo $row['cart_id'] ?>">-</span>
                                        <span class=""style="color: black;" id="numFood_<?php echo $row['cart_id'] ?>"><?php echo $row['num_food'] ?></span>
                                        <span class="plus increment" data-food-id="<?php echo $row['cart_id'] ?>">+</span>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="btn_ck">
                    <a class="btn btn-primary shadow" href="log_cart.php?userID=<?php echo $uid; ?>">check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- cart end-->

    <!-- popup start -->

    <div id="overlay" class="overlay"></div>
    <div id="popup" class="popup ">

    </div>

    <!-- popup end -->

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/popup.js"></script>

    <script>
    function login()
    {
        alert("Please Login or Register to view more.")
    }

    function pop(id) {
        var fdid = id;

        $.ajax({
            type: "GET",
            data: {
                food_id: fdid
            },
            url: "script_pass.php",
            success: function(response) {
                var data = JSON.parse(response);

                // Display the basic food details
                document.getElementById('popup').innerHTML =
                    `
                        <img class="flex-shrink-0 img-fluid rounded" style="width: 80px;" src="./img/${data.food_img}">
                        <input type="hidden" name="id" value="${data.food_id}">
                        <input type="hidden" name="name" value="${data.food_name}">
                        <input type="hidden" name="price" value="${data.food_price}">
                        <span>${data.food_name}</span>
                    `;

                // Display checkboxes for additional options
                if (data.options.length > 0) {
                    document.getElementById('popup').innerHTML += '<div class="checkbox-group">';

                    data.options.forEach(option => {
                        document.getElementById('popup').innerHTML += `
                                <input type="checkbox" name="checkboxGroup[]" value="${option.add_price}">
                                ${option.add_name} (+RM ${option.add_price})<br>
                            `;
                    });

                    document.getElementById('popup').innerHTML += '</div>';
                }

                // Add buttons and other HTML as needed
                document.getElementById('popup').innerHTML += 
                    `
                        <button type="button" onclick="submitForm(<?php echo $uid; ?>, ${fdid})">Submit</button>
                        <button type="button" onclick="closePopup()">close</button>
                    `;

                // Show the popup
                document.getElementById('overlay').style.display = 'block';
                document.getElementById('popup').style.display = 'block';

                setTimeout(function() {
                    document.getElementById('popup').classList.add('visible');
                }, 10);
            }
        });
    }


    function submitForm(userid , id) {
        var fdid = id;

        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup').classList.remove('visible');

        setTimeout(function() {
            document.getElementById('popup').style.display = 'none';
        }, 500);

        var checkboxes = document.querySelectorAll('input[name="checkboxGroup[]"]:checked');

        // Calculate the total price
        var addPrice = 0;
        checkboxes.forEach(function(checkbox) {
            addPrice += parseFloat(checkbox.value);
        });

        $.ajax({
            type: "GET",
            data: {
                food_id: fdid,
                add_on: addPrice,
                uid: userid
            },
            url: "add_to_cart.php",
            success: function(response) {
                console.log("Data added to cart successfully");
            }
        });

        // window.location.reload();
        
        setTimeout(function() {
            window.location.reload();
        }, 300);
        
    }

    $('.increment, .decrement').on('click', function() 
            {
              var foodId = $(this).data('food-id');
              var action = $(this).hasClass('increment') ? 'increment' : 'decrement';
              console.log($('#numFood_' + foodId))

                $.ajax(
                  {
                    url: 'update_num_food.php',
                    type: 'POST',
                    data: { foodId: foodId, action: action },
                    success: function(response) 
                    {
                            var parsedResponse = JSON.parse(response);
                            // Process the parsed response
                            $('#numFood_' + foodId).text(parsedResponse.numFood);
                            
                            if (parseInt(parsedResponse.numFood) === 0) {

                                remove(foodId);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 50);
                            }
                    }
                });
            }
          );


          function remove(ct_id)
          {
              var cartId = ct_id;

              $.ajax(
                  {
                    type: "POST",
                    url: "delete_food.php", 
                    data: { delete_item: true, cart_id: cartId }, 
                    success: function (response) 
                    {
                        $("#cart_item_" + cartId).remove();
                    },
                });
          }
    </script>
</body>

</html>