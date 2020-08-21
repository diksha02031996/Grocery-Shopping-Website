<!DOCTYPE html>
<?php
  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed
include("connect.php");
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>CTC</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/design.css">
     </head>
     <body style="background: url(p.jpg) no-repeat;">
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
                   <a class="nav-link text-light" href="contactus.php">Contact</a>
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
  <center>
    <h2>Login</h2>
</center>
<?php


if(isset($_POST['submit']))   // if button is submit
{
	$email = $_POST['email'];  //fetch records from login form
	$password = $_POST['password'];

	if(!empty($_POST["submit"]))   // if records were not empty
     {
	$loginquery ="SELECT * FROM users WHERE email='$email' && password='$password'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
  echo $email;
  echo $password;
  if(is_array($row))  // if matching records in the array & if everything is right
								{
                    echo "hello";
                                    	$_SESSION["user_id"] = $row['user_id'];
                                      echo "Logged in"; // put user id into temp session
										                  header("refresh:0.5;url:/mainpage.php"); // redirect to index.php page
	                            }
							else
							    {
                                      	echo "Wrong password"; // throw error
                                }
	 }


}
?>


<!-- Form Module-->
<center>

<div >
  <div class="login-box"  class="form">
    <h1 style="color:white">Login to your account</h1>

    <form action="" method="post">
      <input class="textbox" type="email" placeholder="Email"  name="email"/>
      <br />
      <br />
      <input class="textbox" type="password" placeholder="Password" name="password"/>
      <br />
      <br />
      <input type="submit" id="buttn" name="submit" value="Login" />
    </form>
  </div>


</div>
<br />
<br />

</center>

	   <footer class="bg-dark p-4">
       <div class="container">
       <div class="row">
         <div class="col-md-4">

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
     </div>

      <a href="admin_panel.php">Admin Panel</a>
     </footer>
  </body>
</html>
