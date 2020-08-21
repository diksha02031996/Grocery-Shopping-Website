<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
 //include connection file
error_reporting(0);  // using to hide undefine undex errors
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
    <title>CTC</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/design.css">
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
    <link rel="stylesheet" href="css/Loginstyle.css">
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
                 <a class="nav-link text-light" href="main.php">Home</a>
               </li>



               <li class="nav-item">
                 <a class="nav-link text-light" href="#">Contact</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link text-light" href="#">About us</a>
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
           <center>

               <h1>Register Here!</h1>

           <form method="post">
            Full Name:<input type="text" name="fullname"/>
            <br />
            <br />
            <br />

            Email : <input type="email" name="email" />
            <br />
            <br />
            <br />
            Password: <input type="password" name="pass" />
            <br />
            <br />
            <br />
            Phone:<input name="phone"/>
            <br />
            <br />
            <br />
           <input type="submit" value="Create Account"  name="submit" class="btn-success"/>
           </form>

   </center>
   <br />
   <br />

 <?php

 error_reporting(E_ERROR | E_PARSE);

 $host="127.0.0.1:3307 ";
 $user="root";
 $password="123";
 $db="groceryn";
 $fullname= $_POST['fullname'];
 $phone= $_POST['phone'];

 $email= $_POST['email'];
 $pass= $_POST['pass'];


 $url='127.0.0.1:3307 ';
 $username='root';
 $password='123';
 $conn=mysqli_connect($url,$username,$password,"grocery");

 $submit= $_POST['submit'];


 if(isset($_POST['submit'])){

 $sql = mysqli_query($conn, "INSERT into `user`(username,phone,email,password) VALUES ('$fullname','$phone','$email','$pass')");
 if($sql){
 	echo "Data inserted";

 }
 else{
 	echo "failed";
 }


}
 ?>

</div>
</div>
<footer class="bg-dark p-4">
  <div class="container">
  <div class="row">
    <div class="col-md-4">

    <ul>
       <a href="Categories.php" class="nav-link text-light">Categories</a>


       </ul>
    </div>

    <div class="col-md-4">

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
