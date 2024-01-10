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
</head>

<?php
  $sql = "SELECT *, (food_total_price * num_food) AS food_total_price FROM cart JOIN menu ON cart.food_id = menu.food_id WHERE cart_food_delete = '1' AND cus_id = '0'";
  $result = mysqli_query($connect, $sql);
  $resultcheck = mysqli_num_rows($result);

  if ($resultcheck > 0) 
  {
      $totalPrice = 0.0; 

      while ($row = mysqli_fetch_assoc($result)) 
      {
        $totalPrice += $row['food_total_price'];
      }
      
      $fd_price_total = number_format($totalPrice, 2);
      $tax = $fd_price_total * 0.1;
      $total = $fd_price_total + $tax;
  }
?>

<?php
    session_start();
    var_dump($total);
    $_SESSION['dataFromPage1'] = $total;
    $_SESSION['data'] = "15";
?>

<body>
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
                            <a href="log_index.php" class="nav-item nav-link">Home</a>
                            <a href="log_about.php" class="nav-item nav-link">About</a>
                            <a href="log_service.php" class="nav-item nav-link">Service</a>
                            <a href="log_menu.php" class="nav-item nav-link ">Menu</a>
                            <a href="log_contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <a href="" class="btn btn-primary py-2 px-4">Check Out</a>
                    </div>
                </nav>

                <div class="container-xxl py-5 bg-dark hero-header mb-5">
                    <div class="container text-center my-5 pt-5 pb-4">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center text-uppercase">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        <!-- Navbar & Hero End -->


        
<section class="bg-light my-5">
    <div class="container">
        <div class="row">
            <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Your shopping cart</h4>

                            <?php
                                    $sql = " SELECT * FROM cart JOIN menu ON cart.food_id = menu.food_id WHERE cart_food_delete = '1' AND cus_id = '0' ";
                                    $result = mysqli_query($connect , $sql);
                                    $resultcheck = mysqli_num_rows($result);

                                    if($resultcheck > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                          echo '<form method="POST" class="delete-item-form" id="cart_item_' . $row['cart_id'] . '">';
                                          echo '  <input name="cart_id" value="'. $row['cart_id'].'" style="display: none;">  </input>';
                                          echo '    <div class="row gy-3">';
                                          echo '        <div class="col-lg-5">';
                                          echo '            <div class="me-lg-5">';
                                          echo '                <div class="d-flex">';
                                          echo '                    <img src="./img/' . $row['food_img'] . '" class="border rounded me-3" style="width: 96px; height: 96px;" />';
                                          echo '                    <div class="">';
                                          echo '                        <a href="#" class="nav-link">' . $row['food_name'] . '</a>';
                                          echo '                        <p class="text-muted">XL size, Jeans, Blue</p>';
                                          echo '                    </div>';
                                          echo '                </div>';
                                          echo '            </div>';
                                          echo '        </div>';
                                          echo '        <div class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">';
                                          echo '            <div class="me-4">';
                                          echo '                  <button class="btn btn-sm btn-primary decrement" data-food-id="' . $row['cart_id'] . '">-</button>';
                                          echo '                  <span id="numFood_' . $row['cart_id'] . '">' . $row['num_food'] . '</span>';
                                          echo '                  <button class="btn btn-sm btn-primary increment" data-food-id="' . $row['cart_id'] . '">+</button>';
                                          echo '            </div>';
                                          echo '            <div class="">';
                                          echo '                <text class="h6">RM '. $row['food_total_price'] .' </text> <br />';
                                          echo '                <small class="text-muted text-nowrap">RM' . $row['food_price'] . ' / per item</small>';
                                          echo '            </div>';
                                          echo '        </div>';
                                          echo '        <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">';
                                          echo '            <div class="float-md-end">';
                                          echo '                 <input type="submit" value="Remove" name="delete_item" class="btn btn-danger border text-light icon-hover-danger" onclick="remove(' . $row['cart_id'] . ')" ></input>';
                                          echo '            </div>';
                                          echo '        </div>';
                                          echo '    </div>';
                                          echo '</form> ';

                                        }
                                    }

                                    

                                ?>

                            
                            
                        </div>

                            <div class="border-top pt-4 mx-4 mb-4">

                            </div>
                    </div>
                </div>
            <!-- cart -->

            <!-- summary -->
            <div class="col-lg-3">
                <div class="card mb-3 border shadow-0">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label class="form-label">Have coupon?</label>
                                <div class="input-group">
                                <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                                <button class="btn btn-light border">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                

                  <div class="card shadow-0 border">
                              <div class="card-body">
                                  <div class="d-flex justify-content-between">
                                      <p class="mb-2">Total price:</p>
                                      <p class="mb-2">RM <?php echo $fd_price_total?></p>
                                  </div>
                                  <div class="d-flex justify-content-between">
                                      <p class="mb-2">Discount:</p>
                                      <p class="mb-2 text-success">- RM 0.00</p>
                                  </div>
                                  <div class="d-flex justify-content-between">
                                      <p class="mb-2">TAX:</p>
                                      <p class="mb-2">RM <?php echo $tax?></p>
                                  </div>
                                  <hr />
                                  <div class="d-flex justify-content-between">
                                      <p class="mb-2">Total price:</p>
                                      <p class="mb-2 fw-bold">RM <?php echo $total?></p>
                                  </div>

                                  <div class="mt-3">
                                      <a href="log_payment.php" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                                      <a href="log_menu.php" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                                  </div>
                              </div>
                          </div>

            </div>
            <!-- summary -->
        </div>
    </div>
</section>

<!-- cart + summary -->
  <section>
      <div class="container my-5">
        <header class="mb-4">
          <h3>Recommended items</h3>
        </header>

        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
              <div class="mask px-2" style="height: 50px;">
                <div class="d-flex justify-content-between">
                  <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
                  <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                </div>
              </div>
              <a href="#" class="">
                <img src="" class="card-img-top rounded-2" />
              </a>
              <div class="card-body d-flex flex-column pt-3 border-top">
                <a href="#" class="nav-link">Gaming Headset with Mic</a>
                <div class="price-wrap mb-2">
                  <strong class="">$18.95</strong>
                  <del class="">$24.99</del>
                </div>
                <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                  <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
  </section>
        

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
    
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
                        // Update the displayed num_food value
                        $('#numFood_' + foodId).text(JSON.parse(response).numFood);

                        if (parseInt(parsedResponse.numFood) === 0) {

                                remove(foodId);

                                setTimeout(function() {
                                    window.location.reload();
                                }, 200);
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