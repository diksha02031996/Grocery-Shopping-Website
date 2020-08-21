<?php
session_start();
include 'db.php';
$res = mysqli_query($conn,"SELECT * FROM offers");

if(isset($_POST["add_offer"]))
		{
           

			$title = $_POST['title'];
			$oprice = $_POST['oprice'];
			$price = $_POST['price'];
			
			$img = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));
			$query="INSERT INTO offer(title, oprice, price, pic) VALUES ('$title','$oprice','$price','$img')";
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
	if (mysqli_num_rows($res) > 0) {
	?>
		  <tr>
			<th>Title</th>
			<th>Image</th>
			<th>Offer price</th>
			<th>Price</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>
		<?php
	$i=0;
	while($row = mysqli_fetch_array($res)) {
	?>
		  <tr>
			<td><?php echo $row["title"]; ?></td>
			<td><?php
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'" width="200px" height="100px"  />';
				?></td>
			<td><?php echo $row["price"]; ?></td>
			<td><?php echo $row["oprice"]; ?></td>
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

			
			  <label for="title" style="margin-left:50px;"><b>Title : </b></label>
			  <input type="text" placeholder="Enter title" name="title" required><br>
			  
			  
				<label for="price" style="margin-left:50px;"><b>Price : </b></label>
			  <input type="number" placeholder="Enter price" name="price" required><br>
			  
			  <label for="oprice" style="margin-left:50px;"><b>Offer Price : </b></label>
			  <input type="number" placeholder="Enter offer price" name="oprice" required><br>
			  
			  <label for="img" style="margin-left:50px;"><b>Upload Image : </b></label>
			  <input type="file" class="record" name="img" id="image"><br>

			   <button type="submit" name="add_offer" style="margin-left:200px;margin-bottom:50px;">ADD</button>
			  
			</div>

			
		</form>
	</div>
	
	
</body>
</html>
	