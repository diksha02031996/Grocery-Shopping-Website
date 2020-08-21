
<!DOCTYPE html>
<html>
<?php
include("connect.php");
error_reporting(0); // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed
include_once 'product-action.php';
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

                <div class="breadcrumb">
                    <div class="container">

                    </div>
                </div>
                <div class="container m-t-30">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                             <div class="widget widget-cart">
                                    <div class="widget-heading">
                                        <h3 class="widget-title text-dark">
                                     Your Shopping Cart
                                  </h3>


                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="order-row bg-white">
                                        <div class="widget-body">


                                          <?php

                                        $item_total = 0;

                                        foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
                                        {
                                        ?>  <div class="title-row">
                                        										<?php echo $item["title"]; ?><a href="product.php?p_id=<?php echo $_GET['p_id']; ?>&action=remove&id=<?php echo $item["p_id"]; ?>" >
                                        										<i class="fa fa-trash pull-right"></i></a>
                                        										</div>

                                                                                <div class="form-group row no-gutter">
                                                                                    <div class="col-xs-8">
                                                                                         <input type="text" class="form-control b-r-0" value=<?php echo "$".$item["price"]; ?> readonly id="exampleSelect1">

                                                                                    </div>
                                                                                    <div class="col-xs-4">
                                                                                       <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input"> </div>

                                        									  </div>

                                        	<?php
                                        $item_total += ($item["price"]*$item["quantity"]); // calculating current price into cart
                                        }
                                        ?>




                                        </div>
                                    </div>

                                    <!-- end:Order row -->

                                    <div class="widget-body">
                                        <div class="price-wrap text-xs-center">
                                            <p>TOTAL</p>
                                            <h3 class="value"><strong><?php echo "$".$item_total; ?></strong></h3>
                                            <p>Free Shipping</p>
                                            <a href="checkout.php?p_id=<?php echo $_GET['p_id'];?>&action=check"  class="btn theme-btn btn-lg">Checkout</a>
                                        </div>
                                    </div>




                                </div>
                        </div>

                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">

                            <!-- end:Widget menu -->
                            <div class="menu-widget" id="2">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                  POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                  <i class="fa fa-angle-right pull-right"></i>
                                  <i class="fa fa-angle-down pull-right"></i>
                                  </a>
                               </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="collapse in" id="popular2">

                                  <?php
                                  $query="select * from product where p_id='$_GET[p_id]'";
                                  $result = mysqli_query($conn,$query);
                                  // echo $_GET[c_id]; //1
                                                  ?>
                                                  <?php
                                                  if (mysqli_num_rows($result) > 0) {


                                                  while($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                   <div class="col-sm-12 col-md-6 col-lg-4">

                                                     <form method="post" action='product.php?p_id=<?php echo $_GET['p_id'];?>&action=add&id=<?php echo $row['p_id']; ?>'>

                                                                              <!-- end:Logo -->
                                                                              <div >
                                                                                   <img src="data:image/jpg;base64,'<?php.base64_encode(  $row['img']).?> '" width="100%" height="100px" />
                                                                                  <h6><a href="#"><?php echo $row['prod_name']; ?></a></h6>

                                                                              </div>
                                                                              <!-- end:Description -->
                                                                          </div>
                                                                          <!-- end:col -->
                                                                          <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                                                     <span class="price pull-left" ><?php echo $row['price']; ?>/-</span>
                                                       <input class="b-r-0" type="text" name="quantity"  style="margin-left:30px;" value="1" size="2" />
                                                       <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Add to cart" />
                                                     </div>
                                                     </form>
                                                     </div>

                                                  <?php
                                                      }

                                                  }
                                                  else{
                                                      echo "No result found";
                                                  }
                                                  ?>



                                </div>
                                <!-- end:Collapse -->
                            </div>
                            <!-- end:Widget menu -->

                        </div>
                        <!-- end:Bar -->

                        <!-- end:Right Sidebar -->
                    </div>
                    <!-- end:row -->
                </div>
                <!-- end:Container -->

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

    </body></html>
