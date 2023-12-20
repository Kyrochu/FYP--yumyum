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
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link href="css/test.css" rel="stylesheet">

    <link href="css/popup.css" rel="stylesheet">

    <!-- java script for pass var to php -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>



        <!-- Menu Start -->
        <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>

        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <?php
            $sql = "SELECT * FROM category";
            $result = mysqli_query($connect, $sql);
            $resultcheck = mysqli_num_rows($result);

            if ($resultcheck > 0) {
            ?>
                <div class="nav-wrapper">
                    <nav class="nav nav-pills justify-content-start border-bottom mb-5 overflow-auto" id="myTabs" role="tablist">
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <a class="nav-item nav-link <?php echo ($i === 1) ? 'active' : ''; ?>" data-bs-toggle="pill" href="#tab-<?php echo $row['cat_type'] ?>" role="tab">
                                <?php echo $row['cat_name'] ?>
                            </a>
                        <?php
                            $i++;
                        }
                        ?>
                    </nav>
                </div>

                <div class="tab-content">
                    <?php
                    // Reset the result set pointer to the beginning
                    mysqli_data_seek($result, 0);

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="tab-pane fade" id="tab-<?php echo $row['cat_type'] ?>">
                            <div class="row g-4">
                                <?php
                                // Modify the SQL query based on your database structure
                                $menuSql = ($row['cat_type'] == 'all') ? "SELECT * FROM menu" : "SELECT * FROM menu WHERE food_type = '{$row['cat_type']}'";
                                $menuResult = mysqli_query($connect, $menuSql);

                                while ($menuItem = mysqli_fetch_assoc($menuResult)) {
                                ?>
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" style="width: 80px;" src="./img/<?php echo $menuItem['food_img']; ?>">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $menuItem['food_id']; ?>">
                                                        <input type="hidden" name="name" value="<?php echo $menuItem['food_name']; ?>">
                                                        <input type="hidden" name="price" value="<?php echo $menuItem['food_price']; ?>">
                                                        <span><?php echo $menuItem['food_name']; ?></span>
                                                        <span class="text-primary">RM <?php echo $menuItem['food_price'] ?></span>
                                                    </h5>
                                                    <small class="fst-italic"><?php echo $menuItem['food_description']; ?></small>

                                                    <button type="button" class="btn btn-outline-primary shadow py-2 px-4" name="atc" onclick="pop(<?php echo $menuItem['food_id']; ?>)">Add to cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
        <!-- Menu End -->

    <!-- JavaScript Libraries -->
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/popup.js"></script>

    <script>

        $(document).ready(function() {

            $('#myTabs li:first-child a').tab('show');
        });
    </script>
</body>
</html>