<?php include ("connection_sql.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yum Yum Restaurant</title>
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
                    <h1 class="text-primary m-0" style="font-size:xx-large;"><i class="fa fa-utensils me-3"></i>Yum Yum Restaurant</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0 pe-4">
                            <a href="log_index.php?userID=<?php echo $uid; ?>" class="nav-item nav-link">Home</a>
                            <a href="log_service.php?userID=<?php echo $uid; ?>" class="nav-item nav-link">Service</a>
                            <a href="log_menu.php?userID=<?php echo $uid; ?>" class="nav-item nav-link ">Menu</a>
                            <a href="log_contact.php?userID=<?php echo $uid; ?>" class="nav-item nav-link active">Contact</a>
                            <a href="log_about.php?userID=<?php echo $uid; ?>" class="nav-item nav-link  ">About</a>
                            <a href="login/p_profile.php?userID=<?php echo $uid?>" class="nav-item nav-link ">WELCOME, <?php echo $row_user["name"]; ?></a>
                            <img class="carticon btn py-2 px-4" src="img/cart-icon h.png" alt=""><span
                                style="position: fixed; display: flex; width: 20px;  height: 20px; background-color: red; justify-content: center; align-items: center; color: white;border-radius: 50%; position: absolute; top: 60%; right: 240px; "><?php echo $totalRows ?></span>
                        </div>
                        <a href="index.php" class="btn btn-primary py-2 px-4"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" id="checkoutBtn">LogOut</a>                    </div>
                </nav>

                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
                        <nav aria-label="breadcrumb">
                            
                        </nav>
                    </div>
                </div>
            </div>
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contact Us</h5>
                    <h1 class="mb-5">Contact For Any Query</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Address</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>Jalan Ayer Keroh Lama, 75450 Bukit Beruang, Melaka</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Phone number</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>012-345 67890</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="section-title ff-secondary fw-normal text-start text-primary">Webside</h5>
                                <p><i class="fa fa-envelope-open text-primary me-2"></i>yumyum.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-18 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7436849193796!2d102.2735386758067!3d2.2494988580221675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e56b9710cf4b%3A0x66b6b12b75469278!2sMultimedia%20University!5e0!3m2!1sen!2smy!4v1700329116938!5m2!1sen!2smy" 
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


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