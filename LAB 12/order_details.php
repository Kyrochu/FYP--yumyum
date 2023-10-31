<?php include("dataconnection.php"); ?>

<html>
<head>

</head>
<body>


		<h1>List of Product Orders</h1>

		<table border="1" width="650px">
			<tr>
				<th>Purchase Id</th>
				<th>Customer Name</th>							
				<th>Product</th>
				<th>Quantity</th>
				<th>Payment (RM)</th>
			</tr>
			
			<?php
			
			$result = mysqli_query($connect, "SELECT * from product,purchase where product_code=purchase_product_code ");	//select attributes from 2 tables
			$count = mysqli_num_rows($result);
			
			if ($count < 1)
			{
			?>
				<tr>
					<td colspan="6">No Records Found</td>
				</tr>
			
			<?php
			}
			else
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$pay = $row["purchase_product_price"] * $row["purchase_quantity"]; //calculate payment for each purchase
								//"purchase_product_price" Based on purchase history not current price
				?>			

				<tr>
					<td> <?php echo $row["purchase_id"]; ?> </td>
					<td> <?php echo $row["purchase_name"]; ?></td>							
					<td> <?php echo $row["product_name"]; ?> </td>
					<td> <?php echo $row["purchase_quantity"]; ?> </td>
					<td> <?php echo number_format($pay,2);?> </td>
				</tr>
				
				<?php
				
				}
			}
			
			?>

		</table>
	
</body>
</html>
