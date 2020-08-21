<html>
    <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="bootstrap-4.4.1-dist/bootstrap-4.4.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Piedra&display=swap" rel="stylesheet">
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
     <div style="margin-left:13%;margin-right:13%;margin-top:67px;background-image:url(img/123.jpg);font-size:25px;background-size:100%100%;padding:50px;color:darkslategrey;">
       <div class="breadcrumbs">
	   <div class="container-inner">
			<a href="mainpage.php">Home </a>
			<strong>| Hey you!!</strong>
	   </div>
      </div>
         <br>
    <h3>About Us</h3>
         <hr>
    <p>Grocery Factory is India’s 1st Full Stack DTC (Direct To Consumer) Brand for Grocery Products. Our products are carefully selected, formulated and processed under stringent standards to deliver the perfect product for Indian house-hold. Grocery Factory built on the firm foundation of their promise of providing the products to the customers with honest pricing &amp; the best quality within 24hours to customer door-step 365 days of the year.</p>

    <p>Today you can shop from Grocery Factory home Brands and eliminate the worry of quality, price, freshness and hassles of traffic, parking, and be waiting in queues for billing from the comfort of your home.&nbsp;Under GF, there are several home brands across categories like Buddha, Monkey, Elephant, Rocket, Double Bullet, Sunwin, Pilot, Hulk, etc. GF is a brand which gives access to the customer to buy only essential products without having to worry about impulse purchase during the grocery shopping.</p>

    <p>GF provides end-to-end turkey solution to your unnecessary grocery spending and brings the prices of the grocery purchase to 30% lower compared to any brand by eliminating the middle man and handling the Supply-chain to Order Process to last-mile delivery which enables the significant savings of grocery purchase. Grocery Factory team consist of experienced in retail for over a decade now and adhere to strict quality norms and handling practices. We have invested heavily in developing the technology to help maintain quality standards within our factories and warehouses.</p><br>
    <h2><strong>Vision</strong></h2><hr>
    <p>Set benchmarks in Grocery &amp; FMCG business, driven by exacting standards that deliver the best grocery brand at the best price, across humankind.</p><br>
    <h2><strong>Mission</strong></h2><hr>
    <p>To deliver the best brand at your doorstep with best quality, price &amp; service.</p></div>
    <footer class="bg-dark p-4">
       <div class="row">
         <div class="col-md-4">
          <h4 class="text-light">HOLIDAY TOURS</h4>
         <ul>
            <a href="worldwidetours.php" class="nav-link text-light">WORLDWIDE TOURS</a>
            <a href="2togotours.php" class="nav-link text-light">2 TO GO TOURS</a>
          <a href="royalcaribbean.php" class="nav-link text-light">ROYAL CARIBBEAN</a>
              <a href="selfdrive.php" class="nav-link text-light">SELF DRIVE</a>

            </ul>
         </div>

         <div class="col-md-4">
           <h4 class="text-light">USEFUL LINKS</h4>
           <ul>
              <a href="aboutus.php" class="nav-link text-light">ABOUT US</a>

      <a href="travelvoucher.php" class="nav-link text-light">TRAVEL VOUCHERS</a>
          </ul>
         </div>

       </div>
       <hr width="100%" style="background: white">
       <p class="text-light">Data Protection Policy |
     Terms Of Use |
     Terms & Conditions
     </p>
     <p class="text-light">© Copyright 2020. Commonwealth Travel Service Corporation Pte Ltd. All Rights Reserved. Best viewed with Internet Explorer 9 and above, Mozilla Firefox, Google Chrome and Safari.</p>

      <a href="admin_panel.php">Admin Panel</a>
     </footer>
    </body>
</html>