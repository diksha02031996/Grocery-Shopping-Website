<?php
session_start();
include 'db.php';
$res1 = mysqli_query($conn,"SELECT * FROM category");
$res2 = mysqli_query($conn,"SELECT * FROM product");
if(isset($_POST["add_prod"]))
		{
           

			$name = $_POST['prod_name'];
			$cat = $_POST['cat'];
			$price = $_POST['price'];
			$quantity = $_POST['quantity'];
			$img = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
			$query="INSERT INTO product(prod_name, cat_name, price, quantity, img) VALUES ('$name','$cat','$price','$quantity','$img')";
			if(mysqli_query($conn,$query))
			{
				echo "<script>alert('Data Inserted into Database') </script>";
			}
			else
			{
				echo "Data not Inserted <br>". mysqli_error($conn);
			}
			
			

		}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Admin Panel</title>
</head>
<body>


<h2 class="li"><?php
								if($_SESSION['username'])
								{
									echo "Welcome {$_SESSION['username']}";
								}
								else
								{
									header("location:login.php");
								}
					?></h2><br>





<div class="container">
  
				
	<table class="table table-striped">
    <thead>
	<?php
	if (mysqli_num_rows($res2) > 0) {
	?>
		  <tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Category</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Image</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>
		<?php
	$i=0;
	while($row = mysqli_fetch_array($res2)) {
	?>
		  <tr>
			<td><?php echo $row["p_id"]; ?></td>
			<td><?php echo $row["prod_name"]; ?></td>
			<td><?php echo $row["cat_name"]; ?></td>
			<td><?php echo $row["quantity"]; ?></td>
			<td><?php echo $row["price"]; ?></td>
			<td><?php
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'" width="200px" height="100px"  />';
				?></td>
			<td><a href="#">EDIT</a></td>
			<td><a href="#">DELETE</a></td>
		  </tr>
      
	<?php
	$i++;
	}
	?>
		</tbody>
	  </table>
	  <?php
	}
	else{
		echo "No result found";
	}
	?>
	</div>

			
			  <label for="prod_name" style="margin-left:50px;"><b>Product Name : </b></label>
			  <input type="text" placeholder="Enter product name" name="prod_name" required><br>
			  
			  <label for="category" style="margin-left:50px;"><b>Category : </b></label>
			  <?php
				if (mysqli_num_rows($res1) > 0) {
				?><select><?php
						$i=0;
						while($row = mysqli_fetch_array($res2)) {
						?>
						<option name="cat"><?php echo $row["cat_name"]; ?></option>
						<?php
							$i++;
							}
							?>
				</select>
			   <?php
				}
				else{
					echo "No result found";
				}
				?><br>
				
				<label for="price" style="margin-left:50px;"><b>Price : </b></label>
			  <input type="number" placeholder="Enter price" name="price" required><br>
			  
			  <label for="quantity" style="margin-left:50px;"><b>Quantity : </b></label>
			  <input type="number" placeholder="Enter quantity" name="quantity" required><br>
			  
			  <label for="img" style="margin-left:50px;"><b>Upload Image : </b></label>
			  <input type="file" class="record" name="img" id="image"><br>

			   <button type="submit" name="add_prod" style="margin-left:200px;margin-bottom:50px;">ADD</button>
			  
			</div>

			
		</form>
	</div>
	
	
</body>
</html>
	