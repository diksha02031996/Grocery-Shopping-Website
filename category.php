 <?php
session_start();
require_once("connect.php");
$db_handle =  mysqli_connect($url,$username,$password);
if (! empty($_GET['action'])){
  switch($_GET['action']){
    case "add" :
          if(! empty($_POST['quantity'])){
            $productByCode = $db_handle==runQuery("SELECT * FROM product WHERE c_id='". $_GET['c_id']."'");
            $itemArray = array(
              $productByCode[0]["code"] => array(
                    'name' => $productByCode[0]["name"],
                    'code' => $productByCode[0]["code"],
                    'quantity' => $_POST["quantity"],
                    'price' => $productByCode[0]["price"],
                    'img' => $productByCode[0]["img"]
              )
            );
            if (! empty($_SESSION["cart_item"])) {
                   if(in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                      foreach($_SESSION["cart_item"] as $k => $v) {
                         if($productByCode[0]["code"] == $k) {
                            if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                              $_SESSION["cart_item"][$k]["quantity"] = 0;
                            }
                            $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }

                  } else{
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                  }

            } else {
              $_SESSION["cart_item"] = $itemArray;
            } 
          }
          break;
      }
    }
?>
<!DOCTYPE html>
<html>
<?php
include("connect.php");
error_reporting(0); // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
	<title>Grocery store</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="mainstyle.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="bootstrap-4.4.1-dist/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
 <header>
         <nav class="navbar fixed-top navbar-expand-md bg-dark navbar-dark bg-light p-3">
       <!-- Brand -->


       <!-- Toggler/collapsibe Button -->
       <button class="navbar-toggler text-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
         <span class="navbar-toggler-icon"></span>
       </button>

       <!-- Navbar links -->
       <div class="collapse navbar-collapse" id="collapsibleNavbar">
         <ul class="navbar-nav ml-auto">
           <li class="nav-item">
             <a class="nav-link text-light" href="mainpage.php">Home</a>
           </li>



           <li class="nav-item">
             <a class="nav-link text-light" href="Contactus.php">Contact</a>
           </li>
           <li class="nav-item">
             <a class="nav-link text-light" href="aboutus.php">About us</a>
           </li>
		 <li class="nav-item"><p>
	
        <a href="#">
          <span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
      </p></li>

           							<?php
           						if(empty($_SESSION["user_id"])) // if user is not login
           							{
           								echo '<li class="nav-item">
                            <a class="nav-link text-light" href="login.php">Login</a></li>';
                            echo '<li class="nav-item">
                              <a class="nav-link text-light" href="register.php">Register</a></li>';
           							}
           						else
           							{
           									//if user is login

           									echo  '<li class="nav-item">
                              <a class="nav-link text-light" href="logout.php"> Logout</a>
                            </li>';

           							}

           						?>
		
         </ul>
       </div>
     </nav>
       </header>
<br />
<br />
<br />
<br />
<br />
<div class="row" style="margin-right:12%;margin-left:12%;margin-top:5%;margin-bottom:9%;">
<?php
$query="select * from product where c_id='$_GET[c_id]'";
$result = mysqli_query($conn,$query);
// echo $_GET[c_id]; //1
                ?>
                <?php
                if (mysqli_num_rows($result) > 0) {
                ?>
                        <?php

                while($row = mysqli_fetch_array($result)) {
                  echo' <div class="col-sm-12 col-md-6 col-lg-4">

                     <div >
                     <img src="data:image/jpg;base64,'.base64_encode( $row['img'] ).'" width="100%" height="220px" /><hr>

                       <h5><a style="color:darkslategray;font-size:20px;margin:1%;" href="index.php?p_id='.$row['p_id'].'" >'.$row['name'].'</a></h5>
					
                      <h6 style="color:red;font-size:17px;margin:1%;" href="#" >'.$row['price'].'/-</h6>
					  <div class="input-group"><input type="button" value="-" class="qtyminus" field="quantity"><input type="text" class="product-quantity" name="quantity" value="1" size="2" style="text-align:center;" /><input type="button" value="+" class="qtyplus" field="quantity"> </br>
					  <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-primary" /></div>

					 
			
                     </div>

                   </div>

                   ';
                    }
                ?>  <?php
                }
                else{
                    echo "No result found";
                }
                ?>
				
				
				
</div>
<footer class="bg-dark p-4">
       <div class="row">
         <div class="col-md-4">
          <h4 class="text-light"></h4>
         <ul>
            </ul>
         </div>

         <div class="col-md-4">
           <h4 class="text-light">USEFUL LINKS</h4>
           <ul>
              <a href="aboutus.php" class="nav-link text-light">ABOUT US</a>
          </ul>
         </div>

       </div>
       <hr width="100%" style="background: white">
       <p class="text-light">Data Protection Policy |
     Terms Of Use |
     Terms & Conditions
     </p>
     <p class="text-light">© Copyright 2020. Commonwealth Travel Service Corporation Pte Ltd. All Rights Reserved. Best viewed with Internet Explorer 9 and above, Mozilla Firefox, Google Chrome and Safari.</p>

      <a href="login1.php">Admin Panel</a>
     </footer>

    </body>
    </html>
	
	
	
	        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/JavaScript">
$('.qtyplus').click(function () {
		if ($(this).prev().val() < 10) {
    	$(this).prev().val(+$(this).prev().val() + 1);
		}
});
$('.qtyminus').click(function () {
		if ($(this).next().val() >= 1) {
    	if ($(this).next().val() >= 1) $(this).next().val(+$(this).next().val() - 1);
		}
});
</script>