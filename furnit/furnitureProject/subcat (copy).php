<?php

require './admin/helpers/dbConnection.php';

# Fetch Data ... 
$sql = "select * from subcategory";
// "select blogs.* , users.name , users.image as userImage, categories.title as CatTitle from blogs 
// join users on blogs.added_by = users.id  join categories on blogs.cat_id = categories.id ";

$op = mysqli_query($con,$sql);


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
	<link href="css/products.css" rel="stylesheet" type="text/css">
	<title>Comfy Store</title>
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
							<li> <a href="index.php">Home</a> </li>
							<li> <a href="category.php">Products</a> </li>
							<li> <a href="about.php">About</a> </li>
						</ul>
					</div>
					<ul class="ulLarge">
						<li> <a href="index.php">Home</a> </li>
						<li> <a href="category.php">Products</a> </li>
						<li> <a href="about.php">About</a> </li>
					</ul>
				</div>
				<div class="logo">
					<p>comfy</p>
				</div>
				<!-- <div class="nav-card">
					<i class="fas fa-shopping-cart" id="cardicon" ><span></span></i>
			  </div> -->
			</nav>

		</div>
	</header>

	<!----------------------Card aside--------------------------------------->

	<!-- <section class="card-aside">

		<i class="fas fa-times" id="iconclosebag"></i>

		<h2>Your Bag</h2>

		<div class="card-aside-last">

			<p>Total : $ <span> 0.00 </span> </p>
			<button type="button" name="button">CHECKOUT</button>

		</div>

	</section> -->





<!------------------------------------------------------------->

  <section class="sec1">
    <div class="container">
      <h1>Home / SubCategory</h1>
    </div>
  </section>

<!------------------------------------------------------------->

  <section class="sec2">
		<div class="container">

      <aside class="sec2-aside">

        <div class="sec2-inpt">
          <form class="" action="index.php" method="post">
            <input type="text" name="search" value="" placeholder="search...">
          </form>
        </div>

        <div class="sec2-choic">
          <h6>Company</h6>
          <ul>
            <li>All</li>
            <li>Ikea</li>
            <li>Marcos</li>
            <li>Caressa</li>
            <li>Liddy</li>
          </ul>
        </div>

        <div class="sec2-rng">
          <h6>Price</h6>
          <input type="range" name="range" value="80" max="80">
          <p>Value : <span>$80</span></p>
        </div>

      </aside>

      <!----------------------------------------------------->

      <div class="feat-figs">


	  <?php 
   
      while($data = mysqli_fetch_assoc($op)){
   
      ?>

      <a href="http://localhost/furnit/furnitureProject/products.php?id=<?php  echo $data['id'];?>">
        <figure class="living-room">
          <h5> <?php echo $data['title']?> </h5>
          <div class="figimg">
            <img  src="./admin/subcategory/uploads/<?php echo $data['image']?>" alt="">
          </div>
        </figure>
	</a>

		<?php } ?>


        
      <div style="clear: both;"></div>




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