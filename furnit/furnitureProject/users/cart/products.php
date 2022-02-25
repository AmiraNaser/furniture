<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    unset($_SESSION['qty_array']);
    $sql = "select * from product";
    $op  = mysqli_query($con, $sql);
        
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
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <style>
        .product_image{
            height:200px;
        }
        .product_name{
            height:80px; 
            padding-left:20px; 
            padding-right:20px;
        }
        .product_footer{
            padding-left:20px; 
            padding-right:20px;
        }
    </style>
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
							<li> <a href="index.html">Home</a> </li>
							<li> <a href="category.php">Products</a> </li>
							<li> <a href="about.html">About</a> </li>
						</ul>
					</div>
					<ul class="ulLarge">
						<li> <a href="index.html">Home</a> </li>
						<li> <a href="category.php">Products</a> </li>
						<li> <a href="about.html">About</a> </li>
					</ul>
				</div>
				<div class="logo">
					<p>comfy</p>
				</div>
				<div class="nav-card">
					<i class="fas fa-shopping-cart" id="cardicon"><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> <span class="glyphicon glyphicon-shopping-cart"></span></a></i>
			  </div>
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
      <h1>Home / Products</h1>
    </div>
  </section>
<!------------------------------------------------------------->
  <section class="sec2">
		<div class="container">
      <aside class="sec2-aside">
        <div class="sec2-inpt">
          <form class=""  method="post">
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

      <div class="prod-fig">
        <figure class="">
            <?php
            $inc = 4;
                while($result = mysqli_fetch_assoc($op)) {
                    $inc = ($inc == 4) ? 1 : $inc + 1; 
                    if($inc == 1) echo "<div class='row text-center'>"; 
            ?>  
            <div class="figimg2">
                <img src="./admin/products/uploads/<?php echo $result['image'];?>" alt="">
            </div>
            <p>Armchairs</p>
            <br>
            <div class="info-fig">
                <h6><?php echo $result['title'];?></h6>
                <h6><?php echo $result['price'];?></h6>
            </div>
                <a href='add_cart.php?id=<?php echo $result['id'];?>'> <button type="submit">Add To Cart</button> </a>
             <?php } 
                     if($inc == 1) echo "<div></div><div></div><div></div></div>"; 
                     if($inc == 2) echo "<div></div><div></div></div>"; 
                     if($inc == 3) echo "<div></div></div>";
             ?>
            </figure>
        
      </div>
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