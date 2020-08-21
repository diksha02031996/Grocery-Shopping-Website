<style>

<!--input.qtyplus { width:25px; height:25px; color:red; }
input.qtyminus { width:25px; height:25px; color: green; }
input.qty { width:30px; height:25px;}-->

.input-group {
  clear: both;
  margin: 15px 0;
  position: relative;
  width: 100%;
}
.input-group input[type='button'] {
  background-color: #eeeeee;
  min-width: 38px;
  width: auto;
  transition: all 300ms ease;
}
.input-group .qtyminus,
.input-group .qtyplus {
  font-weight: bold;
  height: 38px;
  padding: 0;
  width: 100%;
  position: relative;
}
.input-group .qty{
  position: relative;
  height: 38px;
  left: -6px;
  text-align: center;
  width: 62px;
  display: inline-block;
  font-size: 13px;
  margin: 0 0 5px;
  resize: vertical;
}
.qtyplus {
  left: -13px;
  width: 100%;
}
</style>
<?php
error_reporting(E_ERROR | E_PARSE);
$url='127.0.0.1:3307 ';
$username='root';
$password='123';
$db='finalgrocery';
$conn=mysqli_connect($url,$username,$password,$db);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
$query="SELECT * FROM category";
$result = mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
$qry="SELECT * FROM offers";
$rslt = mysqli_query($conn,$qry);
$cnt=mysqli_num_rows($rslt);
?>
<!DOCTYPE html>
<html>
<?php
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
<section style="margin-top:67px;">
       	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
         <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
       </ol>
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img class="d-block w-100" src="img/1.jpg" alt="First slide" width="100%" height="400">
           <div class="carousel-caption d-none d-md-block">
            <h5 class="heading">Welcome to your one stop grocery store!!</h5>
            <a class="btn btn-primary extra" href="aboutus.php" style="border-color:white;border-width:5px;width:180px;"><b>About us!</b></a>
      </div>
         </div>
         <div class="carousel-item">
           <img class="d-block w-100" src="img/2.jpg" alt="Second slide" width="100%" height="400">
             <div class="carousel-caption d-none d-md-block">
        <h5 class="heading">Join us! Become a member.</h5>
        <a class="btn btn-primary extra" href="" style="border-color:white;border-width:5px;width:180px;"><b>Login!</b></a>
      </div>
         </div>
         <div class="carousel-item">
           <img class="d-block w-100" src="img/3.jpg" alt="Third slide" width="100%" height="400">
             <div class="carousel-caption d-none d-md-block">
        <h5 class="heading">Explore the categories!</h5>
        <a class="btn btn-primary extra" style="border-color:white;border-width:5px;width:180px;" href="#cat"><b>View Categories!</b></a>
      </div>
         </div>
         <div class="carousel-item">
           <img class="d-block w-100" src="img/4.jpg" alt="Fourth slide" width="100%" height="400">
             <div class="carousel-caption d-none d-md-block">
        <h5 class="heading">Avail top offers!</h5>
        <a class="btn btn-primary extra" style="border-color:white;border-width:5px;width:180px;" href="#offers"><b>View offers!</b></a>
      </div>
         </div>
       </div>
       <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
       </a>
     </div>
    </section>
    <section style="margin-top:20px;background:linear-gradient(blanchedalmond, cornflowerblue);margin-right:7%;margin-left:7%">
        <h4 style="color:aliceblue;padding-bottom:15px;padding-left:10px;padding-top:15px;background-color:darkslategray;" align="center">GROCERIES IN 3 SIMPLE STEPS!</h4>
        <div class="row" style="margin-top:20px;">
            <img class="col-md-4" src="img/11.png" data-toggle="tooltip" data-placement="bottom" title="Choose veggies & fruits" style="width:33%;height:30%;">
            <img class="col-md-4" src="img/12.png" data-toggle="tooltip" data-placement="bottom" title="Choose Daily essentials" style="width:33%;height:30%;">
            <img class="col-md-4" src="img/13.png" data-toggle="tooltip" data-placement="bottom" title="Delivered to doorstep!" style="width:33%;height:30%">
        <hr>
        </div>
        <div class="row">
            <div id="cat" class="col-md-3" style="padding-top:10px;">
                <h4 style="color:aliceblue;padding-bottom:15px;padding-top:15px;background-color:darkslategray;" align="center">CATEGORIES</h4>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                            <?php
                    while($row = mysqli_fetch_array($result)) {
                      echo' <div class="col-sm-12 col-md-6 col-lg-4 text-xs-center text-sm-left">


                         <!-- end:Logo -->
                         <div class="entry-dscr">
                           <h5><a href="category.php?c_id='.$row['c_id'].'" >'.$row['cat_name'].'</a></h5> <span> <a href="#"></a></span>

                         </div>
                         <!-- end:Entry description -->
                       </div>

                       ';
                        }
                    ?>




                    <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
            </div>
            <div id="offers" class="col-md-9" style="padding-top:10px;">
                <h4 style="color:aliceblue;padding-bottom:15px;padding-top:15px;background-color:darkslategray;" align="center">GRAB TOP OFFERS!</h4>
                <div class="row" style="padding:10px;">
                <?php
                    if (mysqli_num_rows($rslt) > 0) {
                    ?>
                            <?php
                    while($row = mysqli_fetch_array($rslt)) {
                    ?>
                    <div class="col-md-4 col-sm-6 card" style="width: 18rem;padding:2px;">
                     <center><a class="card-img-top"><?php
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'" width="270px" height="170px" />';?></a></center>
                     <div class="card-body">
                     <h5 class="card-title"><?php echo $row["title"];?></h5>
                     <p><b style="color:darkslategrey;text-decoration:line-through;"><?php echo $row["oprice"];?>/-</b>&nbsp;<b style="color:red"><?php echo $row["price"];?>/-</b></p>
                     <p class="card-text">Offer valid till stock lasts!</p>
                     <div class="input-group">
                            <input type='button' value='-' class='qtyminus' field='quantity'>
							<input type='text' name='quantity' value='0' class='qty' style="text-align: center;">
							<input type='button' value='+' class='qtyplus' field='quantity'><br><br>
							</div>
                     <a href="#" class="btn btn-primary">Order now!</a>
                    </div>
                 </div>
                    <?php
                        }
                    ?>
                    <?php
                    }
                    else{
                        echo "No result found";
                    }
                    ?>
                   </div>
            </div>
        </div>
    </section>
    <center>
        <section style="background-image:url(img/1111.jpg);margin-bottom:-8px;background-size:100%100%">
            <center>
                <h1 style="padding-top:90px;padding-bottom:30px;">Shop with us today! Register!!</h1>
                <a class="btn btn-primary" href="form_process1.php" style="border-color:black;border-width:5px;background-color:transparent;margin-bottom:90px;font-size:20px;"><b style="color:black">Register & Explore</b></a>
            </center>
        </section>
    <section style="background-color:black;">
        <h1 style="color:aliceblue;padding-top:20px;">WATCH OUR STORY!</h1>
        <a id="showmore" style="float:right;color:aliceblue;padding-right:30px;cursor:pointer;font-size:15px;">Show more</a><br>
    <iframe width="32%" height="300" src="https://www.youtube.com/embed/TKx-F4AKteE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="32%" height="300" src="https://www.youtube.com/embed/_p9i3oZLZlI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="32%" height="300" src="https://www.youtube.com/embed/pJTULzwZvSg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <form id="showingmore">
         <iframe width="32%" height="300" src="https://www.youtube.com/embed/4lI0Dqg7OHY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="32%" height="300" src="https://www.youtube.com/embed/1IXDsUmL7go" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <iframe width="32%" height="300" src="https://www.youtube.com/embed/f7fKdN0uwA0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </form>
    </section>
        <script>
                $(document).ready(function() {
                      $("#showmore").click(function() {
                        $("#showingmore").toggle();
                      });
                    });
            $("#showmore").click(function(){
                $(this).text(function(i,text){
                    return text === "Show more" ? "Show less" : "Show more";
                });
            });
        </script>
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
    </center>
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
