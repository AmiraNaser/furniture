<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

$id = $_GET['item_id'];

if(isset($id) && !empty($id))
{
    $sql = "select * from product where id = $id";
    $op = mysqli_query($con,$sql);
}
else
{
    header("Location: products.php");
}

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
					<i class="fas fa-shopping-cart" id="cardicon"><span>0</span></i>
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





<!---------------------- sec1111 --------------------------------------->

  <section class="sec1">
    <div class="container">
      <h1>Home / </h1>
    </div>
  </section>

<!---------------------- sec222 --------------------------------------->

  <main>
   <form role="form" method="post" action="save_items.php">
    <div class="container">
    <?php    
    while($data = mysqli_fetch_assoc($op)){   
   ?>
      <aside class="main-aside">
        <img src="./admin/products/uploads/<?php echo $data['image']?>" alt="jk" id="prod-img">
      </aside>

      <article class="main-artcl">
        <td><input class="form-control" type="hidden" name="product_id" value="<?php echo $data['id']; ?>" /></td>
		<td><input class="form-control" type="hidden" name="order_price" value="<?php echo $data['price']; ?>" /></td>
		<!-- <td><input class="form-control" type="hidden" name="user_id" value="<?php //echo $user_id; ?>" /></td> -->

        <h2 id="prod-name"> <?php echo $data['title']?> </h2>

        <p id="prod-type"> By IKEA </p>

        <p id="prod-price"> $ <?php echo $data['price']?> </p>
        <label class="control-label">Quantity.</label></td>
        <input class="form-control" type="text" placeholder="Quantity" name="order_quantity" value="1" onkeypress="return isNumber(event)" onpaste="return false"  required />
		

        <p id="prod-desc"><?php echo $data['description']?></p>

        <button type="submit" name="save_item">ADD TO CART</button>
    
      </article>
      <?php } ?>
    </div>
    </form>
  </main>

	<script src="js/jquery-3.6.0.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
	<script src="js/main.js"></script>
    <script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
</body>
</html>