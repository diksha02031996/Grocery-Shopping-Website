<!DOCTYPE html>
<html lang="en">
<?php
include("connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{


												foreach ($_SESSION["cart_item"] as $item)
												{

												$item_total += ($item["price"]*$item["quantity"]);

													if($_POST['submit'])
													{

													$SQL="insert into users_orders(user_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";

														mysqli_query($db,$SQL);

														$success = "Thankyou! Your Order Placed successfully!";



													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Hungry Me</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="site-wrapper">
        <!--header starts-->
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
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">

                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>

                <div class="container">

					   <span style="color:green;">
								<?php echo $success; ?>
										</span>

                </div>




            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">

                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> </div>
                                        <div class="cart-totals-fields">

                                            <table class="table">
											<tbody>



                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "$".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping &amp; Handling</td>
                                                        <td>free shipping</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "$".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>




                                            </table>
                                        </div>
                                    </div>
                                    <!--cart summary-->
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Payment on delivery</span>
                                                    <br> <span>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p>
                                    </div>
									</form>
                                </div>
                            </div>

                    </div>
                </div>
				 </form>
            </div>

            <!-- start: FOOTER -->
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
            <!-- end:Footer -->
        </div>
        <!-- end:page wrapper -->
         </div>
    </div>
    <!--/end:Site wrapper -->
     <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>

<?php
}
?>
