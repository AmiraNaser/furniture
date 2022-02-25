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
					<i class="fas fa-shopping-cart" id="cardicon"><span>0</span></i>
			  </div> -->
			</nav>

		</div>
	</header>

	<!----------------------Card aside--------------------------------------->

	<section class="card-aside">

		<i class="fas fa-times" id="iconclosebag"></i>

		<h2>Your Bag</h2>

		<div class="card-aside-last">

			<p>Total : $ <span> 0.00 </span> </p>
			<button type="button" name="button">CHECKOUT</button>

		</div>

	</section>





<!---------------------- sec1111 --------------------------------------->

  <section class="sec1">
    <div class="container">
      <h1>Home / </h1>
    </div>
  </section>

<!---------------------- sec222 --------------------------------------->

  <main>

    <div class="container">

      <aside class="main-aside">
        <img src="images\b1.jpg" alt="jk" id="prod-img">
      </aside>

      <article class="main-artcl">

        <h2 id="prod-name"> High-back Bench </h2>

        <p id="prod-type"> By IKEA </p>

        <p id="prod-price"> $9.99 </p>

        <p id="prod-desc">Cloud bread VHS hell of banjo bicycle rights jianbing umami mumblecore etsy 8-bit pok pok +1 wolf. Vexillologist yr dreamcatcher waistcoat, authentic chillwave trust fund. Viral typewriter fingerstache pinterest pork belly narwhal. Schlitz venmo everyday carry kitsch pitchfork chillwave iPhone taiyaki trust fund hashtag kinfolk microdosing gochujang live-edge</p>

        <button type="button" name="button">ADD TO CART</button>

      </article>

    </div>

  </main>















	<script src="js/jquery-3.6.0.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
	<script src="js/main.js"></script>

</body>
</html>