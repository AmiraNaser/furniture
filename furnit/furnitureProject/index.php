<?php

require "./admin/helpers/dbConnection.php"

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/all.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/animate.min.css" rel="stylesheet" type="text/css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>Document</title>
	<!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body>

	<header>

		<div class="container">

			<nav>
				<div class="drop-list">
					<i class="fas fa-bars" id="iconList"></i>
					<div class="listt">
						<i class="fas fa-times" id="iconcloselist"></i>
						<ul>
							<li> <a href="#">Home</a> </li>
							<li> <a href="category.php">Products</a> </li>
							<li> <a href="about.php">About</a> </li>
							<li> <a href="register.php">register</a> </li>
							<li> <a href="admin/login.php">Log In</a> </li>
						</ul>
					</div>
					<ul class="ulLarge">
						<li> <a href="#">Home</a> </li>
						<li> <a href="category.php">Products</a> </li>
						<li> <a href="about.php">About</a> </li>
						<li> <a href="register.php">register</a> </li>
						<li> <a href="admin/login.php">Log In</a> </li>

					</ul>
				</div>
				<div class="logo">
					<p>comfy</p>
				</div>
				<!-- <div class="nav-card">
					<i class="fas fa-shopping-cart" id="cardicon"><span>0</span></i>
			  </div> -->
			</nav>

			<article>
				<h1>Rest, Relax, Unwind</h1>
				<p>Embrace your choices - we do</p>
				<button type="button">SHOW NOW</button>
			</article>

		</div>
	</header>

	<!----------------------Card aside--------------------------------------->

	<section class="card-aside">

		<i class="fas fa-times" id="iconclosebag"></i>

		<h2>Your Bag</h2>


		<?php
	     	$sql = "select * from product";
			 $op = mysqli_query($con , $sql);
			 if ( mysqli_num_rows($op) > 0 )
			 {
				 while( $data = mysqli_fetch_assoc($op) )
				 {
        ?>
		
		<figure style="display: flex;justify-content: space-between;">
			<img style="width: 20%;" src="http://localhost/materphp/furnitureProject/admin/products/uploads<?php echo $data['image']?>" alt="">
			<h6><?php  echo $data['title']?></h6>
			<h6><?php  echo $data['price']?></h6>
		</figure>

		<?php }} ?>


		
		<div class="card-aside-last">
			<p>Total : $ <span> 0.00 </span> </p>
			<button type="button" name="button">CHECKOUT</button>

		</div>

	</section>

<!------------------------------------------------------------->

  <section class="sec2">
		<div class="container">

			<h1>Featured</h1>

			<div class="feat-figs">

				<figure>
					<div class="fig-img">
						<img src="images\b1.jpg">
						<div class="fig-inside fig-inside-show" >
							<a href="aboutproduct.html"><i class="fas fa-search" data-id="0"></i></a>
							<i class="fas fa-shopping-cart"></i>
						</div>
					</div>
					<h6>high-back bench</h6>
					<p> $9.99 </p>
				</figure>
				<figure>
					<div class="fig-img">
						<img src="images\b2.jpg">
						<div class="fig-inside fig-inside-show">
							<a href="aboutproduct.html"><i class="fas fa-search" data-id="1"></i></a>
							<i class="fas fa-shopping-cart"></i>
						</div>
					</div>
					<h6>utopia sofa</h6>
					<p> $39.95 </p>
				</figure>
				<figure>
					<div class="fig-img">
						<img src="images\b3.jpg">
						<div class="fig-inside fig-inside-show">
							<a href="aboutproduct.html"><i class="fas fa-search" data-id="2"></i></a>
							<i class="fas fa-shopping-cart"></i>
						</div>
					</div>
					<h6>entertainment center</h6>
					<p> $29.98 </p>
				</figure>

			</div>

			<button type="button"> <a href="category.php">ALL Products</a> </button>

		</div>
	</section>












	<script src="js/jquery-3.6.0.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
	<script src="js/main.js"></script>

</body>
</html>