<?php include("dataconnection.php"); ?>

<html>
<head>

</head>
<body>


		<h1>Add New Product Detail</h1>

		<form name="addnewfrm" method="post" action="">

			<p>Code:<input type="text" name="prod_code" >
			<p>Chocolate Name:<input type="text" name="prod_name">
			<p>Chocolate Size:<select name="prod_size">
								<option value="small">small </option>
								<option value="big"> big </option>
			                  </select>
			<p>Price:<input type="text" name="prod_price">
			<p>Stock:<input type="text" name="prod_stock">
						
			<p><input type="submit" name="savebtn" value="Save Product">

		</form>

		<input type="button" value="View" onclick="location='productlist.php'">
		<input type="button" value="View Order" onclick="location='order_details.php'">
</body>
</html>

<?php

if (isset($_POST["savebtn"])) 
{
	$pcode=$_POST["prod_code"];
	$pname=$_POST["prod_name"];
	$psize=$_POST["prod_size"];
	$pprice=$_POST["prod_price"];
	$pstock=$_POST["prod_stock"];

	
	
	$result = mysqli_query($connect,"SELECT * FROM product where product_code = '$pcode'" );
	$count=mysqli_num_rows($result);
	
	if ($count != 0)
	{
	?>
		<script>
			alert("The product code is already in use.Please Change! ");
		</script>
	<?php
	}
	else
	{
	
	   //else insert into database
		$sql=mysqli_query($connect,"INSERT INTO product (product_code,product_name,product_size,product_price,product_stock) VALUES ('$pcode','$pname','$psize','$pprice','$pstock')");

		if($sql)
		{
			?>

				<script>
					alert("Record Saved!");
				</script>

			<?php
		}
	
	
	
	}
}

?>

