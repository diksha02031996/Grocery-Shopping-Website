<?php
session_start();
include 'db.php';
$res1 = mysqli_query($conn,"SELECT * FROM category");
if(isset($_POST["add_cat"]))
		{
           

			$name = $_POST['cat_name'];
			$query="INSERT INTO category(cat_name) VALUES ('$name')";
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
	if (mysqli_num_rows($res1) > 0) {
	?>
		  <tr>
			<th>Category ID</th>
			<th>Category Name</th>
			<th></th>
			<th></th>
		  </tr>
		</thead>
		<tbody>
		<?php
	$i=0;
	while($row = mysqli_fetch_array($res1)) {
	?>
		  <tr>
			<td><?php echo $row["c_id"]; ?></td>
			<td><?php echo $row["cat_name"]; ?></td>
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

			
			  <label for="cat_name" style="margin-left:50px;"><b>Category Name : </b></label>
			  <input type="text" placeholder="Enter category name" name="cat_name" required><br>

			   <button type="submit" name="add_cat" style="margin-left:200px;margin-bottom:50px;">ADD</button>
			  
			</div>

			
		</form>
	</div>
	
	
</body>
</html>
	