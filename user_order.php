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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">


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


    $sql = "SELECT COUNT(*) AS totalRows FROM cart WHERE cart.user_id = '$uid'";
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
                            <a href="log_index.php?userID=<?php echo $uid; ?>" class="nav-item nav-link">Home</a>
                            <a href="log_about.php?userID=<?php echo $uid; ?>" class="nav-item nav-link">About</a>
                            <a href="log_service.php?userID=<?php echo $uid; ?>" class="nav-item nav-link">Service</a>
                            <a href="log_menu.php?userID=<?php echo $uid; ?>" class="nav-item nav-link ">Menu</a>
                            <a href="log_contact.php?userID=<?php echo $uid; ?>" class="nav-item nav-link ">Contact</a>
                            <a href="login/p_profile.php?userID=<?php echo $uid?>" class="nav-item nav-link ">WELCOME, <?php echo $row_user["name"]; ?></a>
                            <img class="carticon btn py-2 px-4" src="img/cart-icon h.png" alt=""><span
                                style="position: fixed; display: flex; width: 20px;  height: 20px; background-color: red; justify-content: center; align-items: center; color: white;border-radius: 50%; position: absolute; top: 60%; right: 240px; "><?php echo $totalRows ?></span>
                        </div>
                        <a href="index.html" class="btn btn-primary py-2 px-4"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" id="checkoutBtn">LogOut</a>                    </div>
                </nav>

                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        <!-- Navbar & Hero End -->


        <!-- table start -->

        <div class="container-fluid bg-secondary">
            <br>
            <h2 class="text-primary" style="text-align: center;">Your Order List</h2>

            <div class="row justify-content-start">
                <!-- card start -->
                <?php
                $order = "SELECT * FROM `order` WHERE user_id = ?";
                $order_stmt = $connect->prepare($order);
                $order_stmt->bind_param("s", $uid);
                $order_stmt->execute();
                $order_result = $order_stmt->get_result();

                $grouped_orders = [];

                while ($row_order = mysqli_fetch_assoc($order_result)) {
                    $time = $row_order["or_time"];
                    $fid = $row_order["food_id"];
                    $n_food = $row_order["num_food"];

                    $menu = "SELECT * FROM menu WHERE food_id = ?";
                    $menu_stmt = $connect->prepare($menu);
                    $menu_stmt->bind_param("i", $fid);
                    $menu_stmt->execute();
                    $menu_result = $menu_stmt->get_result();

                    if ($menu_result->num_rows > 0) {
                        $row_menu = mysqli_fetch_assoc($menu_result);

                        $order_group_key = $row_order["or_time"];

                        if (!isset($grouped_orders[$order_group_key])) {
                            $grouped_orders[$order_group_key] = [
                                'name' => $row_user["name"],
                                'time' => $row_order["or_time"],
                                'foods' => []
                            ];
                        }

                        $grouped_orders[$order_group_key]['foods'][] = [
                            'food_name' => $row_menu["food_name"],
                            'food_price' => $row_menu["food_price"],
                            'food_num' => $row_order["num_food"],
                            // Add other fields you want to display
                        ];
                    } else {
                        echo "No menu items found for food_id: $fid";
                    }
                }

                $order_stmt->close();
                $menu_stmt->close();

                // Display the grouped orders
                foreach ($grouped_orders as $group) {
                ?>
                    <div class="col-md-4" style="padding-left: 3rem;">
                        <div class="card mb-3 m-3 border-warning" style="max-width: 20rem; max-height: 20rem; border-radius: 10px;">
                            <div class="card-header shadow bg-warning" style="border-radius: 8px;">Panding Order</div>
                            <div class="card-body" style="overflow-y: auto;">
                                <p class="card-text">Name: <?php echo $group['name']; ?></p>
                                <p class="card-text">Time: <?php echo $group['time']; ?></p>
                                <div class="card-text">Food Ordered:
                                    <div class="card-body ">
                                        <?php
                                        // Loop to display all ordered foods
                                        foreach ($group['foods'] as $food) {
                                        ?>
                                            <p class="card-text"><?php echo $food["food_name"]; ?> - Add on</p>
                                            <p class="card-text"> Quantity: <?php echo $food["food_num"]; ?> -  Price: <?php echo $food["food_price"]; ?></p>
                                        <?php

                                        $total += $food["food_price"];


                                        }          
                                    ?>
                                </div>
                            </div>
                            <p class="card-text">Total Price: RM<?php echo $total ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- card start -->
            </div>
            <br>
        </div>

        <!-- table end -->


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
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
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
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
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


                    $sql = "SELECT * FROM cart JOIN menu ON cart.food_id = menu.food_id WHERE cart.user_id = '$uid'";
                    $result = mysqli_query($connect, $sql);
                    $resultcheck = mysqli_num_rows($result);

                    if ($resultcheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="listcart">
                                <div class="item border shadow text-black p-3 " style="border-radius: 10px;" >
                                    <img src="./img/<?php echo $row['food_img']; ?>" alt="">
                                    <div class="name"><?php echo $row['food_name'] ?></div>
                                    <div class="price">RM <?php echo $row['food_total_price'] ?></div>
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