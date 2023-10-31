<?php include("dataconnection.php"); ?>

<html>
<head>

</head>
<body>
		<?php
		    if(isset($_GET["edit"]))
			{
		   
				$pcode = $_GET["code"];

				$result = mysqli_query($connect, "SELECT * FROM product WHERE product_code='$pcode' ");
				$row = mysqli_fetch_assoc($result);
			}
		?>
		
		<h1>Update Product Detail</h1>

		<form name="updatefrm" method="post" action="">

			<p>Code:<input type="text" name="prod_code"  value="<?php echo $row['product_code'];  ?>"  disabled>
			<p>Name:<input type="text" name="prod_name"  value="<?php echo $row['product_name']; ?>">
			
			<p>Chocolate Size:<select name="product_size">
								<option value="small" <?php if($row['product_size']=="small")
														echo "selected";
  									                   ?> > small </option>
								<option value="big" <?php if($row['product_size'] == "big" )
													  echo "selected"; //try your own
								                     ?> >big </option>
			                  </select>
			<p>Price:<input type="text" name="prod_price" value="<?php echo $row['product_price']; ?>">
			<p>Stock:<input type="text" name="prod_stock"  value="<?php echo $row['product_stock'];  ?>">
	
					
			<p><input type="submit" name="savebtn" value="Update Product">

		</form>
	

</body>
</html>

<?php

if (isset($_POST["savebtn"]))	
{
	$pname = $_POST['prod_name'];  	
	$pprice = $_POST['prod_price'];
	$psize = $_POST['prod_size'];
	$pstock = $_POST['prod_stock'];
	
	mysqli_query($connect,"UPDATE product SET product_name='$pname',product_price='$pprice',product_size='$psize',product_stock='$pstock' WHERE product_code='$pcode' ");
	?>
	<script>
		alert("Record is updated!");
	</script>

	<?php

		header("refresh:0.5 url=productlist.php"); //redirect user back to productlist.php
	
}

?>

