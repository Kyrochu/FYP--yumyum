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

    <link rel="stylesheet" href="css/popup.css">

    <!-- java script for pass var to php -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    <?php
        $sql = "SELECT * FROM menu WHERE food_type = 'meal';";
        $result = mysqli_query($connect, $sql);
        $resultcheck = mysqli_num_rows($result);

        if ($resultcheck > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
        ?>
                <div class="col-lg-6">
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 img-fluid rounded" style="width: 80px;" src="./img/<?php echo $row['food_img']; ?>">
                        <div class="w-100 d-flex flex-column text-start ps-4">
                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['food_id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $row['food_name']; ?>">
                                    <input type="hidden" name="price" value="<?php echo $row['food_price']; ?>">
                                    <span><?php echo $row['food_name']; ?></span>
                                    <span class="text-primary">RM <?php echo $row['food_price'] ?></span>
                                </h5>
                                <small class="fst-italic"><?php echo $row['food_description']; ?></small>
                                <button type="button" class="btn btn-outline-primary shadow py-2 px-4" name="atc" onclick="pop(<?php echo $row['food_id']; ?>)">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
    ?>

    <div id="overlay" class="overlay"></div>
    <div id="popup" class="popup">
        
        <button type="button" onclick="submitForm()">Submit</button>
        <button type="button" onclick="closePopup()">Close</button>
    </div>

    <!-- Your script includes go here -->
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
    <script>
        function pop(id) 
        {
            var fdid = id;

            $.ajax({
                type: "GET",
                data: { food_id: fdid },
                url: "script_pass.php",
                success: function (response) 
                {
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
                                <input type="checkbox" name="checkboxGroup[]" value="${option.add_id}">
                                ${option.add_name} (+RM ${option.add_price})<br>
                            `;
                        });

                        document.getElementById('popup').innerHTML += '</div>';
                    }

                    // Add buttons and other HTML as needed
                    document.getElementById('popup').innerHTML += `
                        <button type="button" onclick="submitForm()">Submit</button>
                        <button type="button" onclick="closePopup()">close</button>
                    `;

                    // Show the popup
                    document.getElementById('overlay').style.display = 'block';
                    document.getElementById('popup').style.display = 'block';

                    setTimeout(function () {
                        document.getElementById('popup').classList.add('visible');
                    }, 10);
                }
            });
        }

        function closePopup() 
        {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').classList.remove('visible');

            setTimeout(function () 
            {
                document.getElementById('popup').style.display = 'none';
            }, 500);
        }

        function submitForm() 
        {
            // Implement your form submission logic here
        }
    </script>
</body>
</html>