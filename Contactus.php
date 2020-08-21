<?php
error_reporting(E_ERROR | E_PARSE);
$cname = $_POST['cname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$url = "127.0.0.1:3307"; //server
$username = "root"; //username
$password = "123"; //password


$conn=mysqli_connect($url,$username,$password,"grocery");


$sql = mysqli_query($conn, "INSERT INTO contactus (customer_id,cname,email,phone,message) VALUES ('','$cname','$email', '$phone', '$message')");
if($sql){
    echo " ";

}
else{
    echo " ";
}



?>








<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
   
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



    <link rel="stylesheet" href="css/design.css">
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
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>




<div class="container">
    <div><h1>Contact Us</h1></div>
    <br />
    <div class="row">
        <div class="col-md-6">
            <div id="googlemap" style="width:100%; height:350px;"></div>
        </div>
        <br />
        <div class="col-md-6">
            <form class="my-form" method="post" action="">
                <div class="form-group">
                    <label for="form-name">Name</label>
                    <input type="text" class="form-control" name="cname" placeholder="Name" value="">
                </div>
                <div class="form-group">
                    <label for="form-email">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" value="">
                </div>
                <div class="form-group">
                    <label for="form-subject">Telephone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Subject" value="">
                </div>
                <div class="form-group">
                    <label for="form-message">Email your Message</label>
                    <textarea class="form-control" name="message" placeholder="Message" ></textarea>
                </div>
                <button class="btn btn-default" type="submit" value="Contact Us">Contact Us</button>                
            </form>
        </div>
    </div>
</div>

<style>
    .my-form {
        color: #305896;
    }
    .my-form .btn-default {
        background-color: #305896;
        color: #fff;
        border-radius: 0;
    }
    .my-form .btn-default:hover {
        background-color: #4498C6;
        color: #fff;
    }
    .my-form .form-control {
        border-radius: 0;
    }
</style>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        // Google Maps setup
        var googlemap = new google.maps.Map(
            document.getElementById('googlemap'),
            {
                center: new google.maps.LatLng(44.5403, -78.5463),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
        );
    });
</script>

<!-- Contact-Us Form With A Map - END -->

</div>
<br>
<br>
<br>
<br>


<!--Footer Section-->

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