<?php include("dataconnection.php"); ?>

<html>
<head></head>


<script type="text/javascript">

function confirmation()
{
	var option;
	option=confirm("Do you want to delete this product?");

	return option;
}

</script>


<body>


		<h1>List of Products</h1>

		<table border="1" width="650px">
			<tr>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Product Quantity</th>				
				<th colspan="3">Action</th>
			</tr>

			<?php
			
			$result = mysqli_query($connect, "SELECT * FROM product WHERE product_isDelete=0");	   // 0 in product_isDelete means available
	         while($row = mysqli_fetch_assoc($result))
				{
				
				?>			

				<tr>
					<td><?php echo $row["product_code"];?> </td>
					<td><?php echo $row["product_name"];?> </td>
					<td><?php echo $row["product_stock"];?></td>
					<td><a href="purchase.php?buy&code=<?php echo $row['product_code'];?> ">Buy Now</a></td>
					<td><a href="edit.php?edit&code=<?php echo $row['product_code'];?> ">Edit</a></td>
					<td><a href="productlist.php?del&code=<?php echo $row['product_code'];?> " onclick="return confirmation();">Delete</a></td>
				</tr>
				<?php
				
				}		
			
			?>

			
			
			
		</table>


	

</body>
</html>
<?php
//remove product from product list
if (isset($_GET["del"])) 
{
	$pcode=$_GET["code"];

	//update product table and set product_isDelete to 1
	mysqli_query($connect,"UPDATE product SET product_isDelete=1 WHERE product_code='$pcode' ");

	?>
		<script>
			alert("Product is removed.")
		</script>

	<?php
	header("refresh:0.5;url=productlist.php");
}

?>
