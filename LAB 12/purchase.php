<?php include("dataconnection.php"); ?>

<html>
<head>

</head>
<body>


		<?php
		    if(isset($_GET["buy"]))
			{
			$pcode = $_GET["code"];

			$result = mysqli_query($connect, "SELECT * FROM product WHERE product_code='$pcode' ");
			$row = mysqli_fetch_assoc($result);
			}
		?>

		
		<h1>Product Detail</h1>
		
		<p>
		<br>Product Code :  <?php echo $row['product_code'];  ?>
		<br>Product Name :  <?php echo $row['product_name']; ?>
		<br>Product Price : <?php echo $row['product_price']; ?>
		<br>Product Stock : <?php echo $row['product_stock']; ?>

		</p>
		
		<h1>Your Order Detail</h1>

		<form name="purchasefrm" method="post" action="">

			<p>Customer Name:<input type="text" name="cust_name" ></p>
			<p>Quantity:<input type="text" name="cust_qty" ></p>

			<p><input type="submit" name="orderbtn" value="Send Order">

		</form>
	
</body>
</html>

<?php

if (isset($_POST["orderbtn"])) 	
{
	$cname = $_POST["cust_name"]; //retrive value from purchasefrm	
	$cqty = $_POST["cust_qty"];  //retrive value from purchasefrm
	
	$pprice = $row["product_price"];  //get product_price 
	$balance = $row["product_stock"] - $cqty;  
	
	
	if($balance>=0)
	{
		mysqli_query($connect, "INSERT INTO purchase (purchase_name,purchase_quantity,purchase_product_price,purchase_product_code) values ('$cname','$cqty','$pprice','$pcode')");//insert data into purchase table

		mysqli_query($connect,"UPDATE product SET product_stock='$balance' WHERE product_code='$pcode' ");// update product table

		?>
			<script>
				alert("Order is successfully placed!");
			</script>
		<?php

			header("refresh:0.5;url=productlist.php");
		
	}
	else
	{
		//display alert box
		?>
			<script>
				alert("Your quantity is more than the stock we have.Please Change");
			</script>
		<?php
	}
	
}

?>