<?php

include('AdminModule/DataConnect.php');



$id = isset($_GET['id'])?$_GET['id']:NULL;
$orderDate = isset($_GET['orderDate']) ? urldecode($_GET['orderDate']) : null;
$uid = isset($_GET['uid']) ? urldecode($_GET['uid']) : null;
$orderTime = isset($_GET['orderTime']) ? urldecode($_GET['orderTime']) : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Customer Receipt </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="AdminModule/PrintReceiptStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<?php

                        $select_order_query = "SELECT * FROM order_history WHERE order_date = '$orderDate $orderTime'";
                        $result_order_query = mysqli_query($connect, $select_order_query);
                        
                        $orderSummary = [];
                        $totalPrice = 0;
                        
                        while ($row_order_data = mysqli_fetch_assoc($result_order_query)) 
                        {

                            // Gather order details
                            $UID = $row_order_data['user_id'];
                            $pay_by = $row_order_data["pay_by"];

                            $select_username_query = "SELECT * FROM users WHERE id = '$UID'";
                            $result_username_query = mysqli_query($connect, $select_username_query);
                            $row_username_data = mysqli_fetch_assoc($result_username_query);

                            $name = $row_username_data['name'];
                            $contact = $row_username_data['contact_number'];
                            $email = $row_username_data['email'];
                            $address = $row_username_data['address'];
                            $city = $row_username_data['city'];
                            $state = $row_username_data['state'];
                            $postcode = $row_username_data['postcode'];


                            $foodName = $row_order_data['food_name'];
                            $addOnName = $row_order_data['add_on_name'];
                            $price = $row_order_data['price'];
                            $addon_price = $row_order_data['add_on_price'];

                            
                            if ($addOnName == null) 
                            {
                                // No add-on found
                                $addOnName = "No AddOn";
                                $addon_price = 0;
                            }

                            $quantity = $row_order_data['quantity'];

                            $order_sec = date('s', strtotime($orderTime));
                        
                            // Calculate total for each item
                            $itemTotal = $price * $quantity + $addon_price;
                        
                            // Accumulate total price
                            $totalPrice += $itemTotal;
                        
                            // Store details in an array
                            $orderSummary[] = [
                                'foodName' => $foodName,
                                'addOnName' => $addOnName,
                                'price' => $price,
                                'add_on_price' => $addon_price,
                                'quantity' => $quantity,
                                'itemTotal' => $itemTotal,
                            ];
                        }
                        
                    ?>


<div class="container">
<div class="row">
    
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                <div class="col-sm-6">
                        <div class="text-muted">
                            <h5 class="font-size-15 mb-2"><i class="fa fa-utensils me-3"></i>Yum Yum Restaurant</h5>
                            <!-- Rest of the address information -->
                        </div>
                </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-15 mb-2"> <?php echo $name ?> </h5>
                                <p class="mb-1"> <?php echo $address ?>,</p>
                                <p class="mb-1"> <?php echo $city ?>,</p>
                                <p class="mb-1"> <?php echo $state ?>,</p>
                                <p class="mb-1"> <?php echo $postcode ?>,</p>
                                <p class="mb-1"> <?php echo $email ?> </p>
                                <p> <?php echo $contact ?> </p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-15 mb-1">Receipt No:</h5>
                                    <p>#OPR<?php echo $UID ; echo $order_sec ?> </p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Receipt Date:</h5>
                                    <p> <?php echo $orderDate ?> </p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Receipt Time:</h5>
                                    <p> <?php echo $orderTime ?> </p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Payment Method:</h5>
                                    <p> <?php echo $pay_by ?> </p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>

                    
                    <div class="py-2">
                        <h5 class="font-size-15">Order Summary</h5>


                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Item</th>
                                        <th>Price(RM)</th>
                                        <th>Add On Price(RM)</th>
                                        <th>Quantity</th>
                                        <th class="text-end" style="width: 120px;">Total(RM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orderSummary as $index => $item) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $item['foodName'] ?> - <?= $item['addOnName'] ?></td>
                                            <td><?= number_format($item['price'],2) ?></td>
                                            <td><?= number_format($item['add_on_price'],2) ?></td>
                                            <td><?= $item['quantity'] ?></td>
                                            <td class="text-end"><?= number_format($item['itemTotal'],2) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                        <tr>
                                            <th scope="row" colspan="5" class="border-0 text-end">Grand Total</th>
                                            <td class="text-end"><?= number_format($totalPrice,2) ?></td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-print-none mt-3">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                <a href="user_receipt.php?userID=<?php echo $uid; ?>" class="btn btn-secondary mb-10"><i class="fas fa-arrow-left"></i> Back to History</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

?>
    
</body>
</html>