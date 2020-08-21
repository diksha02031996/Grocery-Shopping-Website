<?php
session_start();
include 'db.php';
$res1 = mysqli_query($conn,"SELECT * FROM category");
$res2 = mysqli_query($conn,"SELECT * FROM product");
$res3 = mysqli_query($conn,"SELECT * FROM offers");
$res4 = mysqli_query($conn,"SELECT * FROM contactus");


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


<div class="row">
  <div class="column">
    <a href="cat.php"><button class="card">
      <h3>CATEGORIES</h3>
      <p>Add new category</p>
    </button></a>
  </div>

  <div class="column">
    <a href="prod.php"><button class="card">
      <h3>PRODUCT</h3>
      <p>Add new product</p>
      
    </button></a>
  </div>
 </div>
 <br><br>
 <div class="row"> 
  <div class="column">
    <a href="offers.php"><button class="card">
      <h3>OFFERS</h3>
      <p>Add new offer</p>
      
    </button></a>
  </div>
  
  <div class="column">
    <button class="card"  onclick="document.getElementById('id04').style.display='block'">
      <h3>FEEDBACKS</h3>
      <p>See the people contacting you...</p>
     </button>
  </div>
</div><br>

<a href="logout.php"><h1 class="lo">Logout</h1></a>

	

	
</body>
</html>