<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

$user_id = $_SESSION['User']['id'];
$sql = "select orders.*, product.id as productID, product.title, product.price, product.image  from orders join product on orders.product_id = product.id where order_status='Ordered' and user_id='$user_id'";
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
	<link href="css/products2.css" rel="stylesheet" type="text/css">
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
							<li> <a href="#">Products</a> </li>
							<li> <a href="about.html">About</a> </li>
						</ul>
					</div>
					<ul class="ulLarge">
						<li> <a href="index.html">Home</a> </li>
						<li> <a href="#">Products</a> </li>
						<li> <a href="about.html">About</a> </li>
					</ul>
				</div>
				
			</nav>

		</div>
	</header>


<!------------------------------------------------------------->

  <section class="sec1">
    <div class="container">
      <h1>Home / Cart</h1>
    </div>
  </section>

<!------------------------------------------------------------->

    <section class="sec2">
		<div class="container">

            <figure class="headlist">
                <h6>Product</h6>
                <div class="headlistinfo">
                    <h6>Quantity</h6>
                    <h6>Price</h6>
                    <h6>Total</h6>
                </div>
            </figure>
    <?php
    if (mysqli_num_rows($op) > 0) {
        while($data = mysqli_fetch_assoc($op)) {   
    ?>
            <figure class="cartcontent">

                <div class="cartimg">
                    <div> <img src="./admin/products/uploads/<?php echo $data['image']?>" alt=""> </div>
                    <div>
                        <h6><?php echo $data['title']; ?></h6>
                        <p>status : in Stock</p>
                    </div>
                </div>

                <div class="cartinfo">
                    <p> <span></span> <?php echo $data['quantity']; ?></p>
                    <p> <span>$</span> <?php echo $data['price']; ?></p>
                    <p><span>$</span> <?php echo $data['total']; ?></p>
                    <a href='deleteitem.php?id=<?php echo $data['id'];  ?>' > <button type="button"  onclick="return confirm('Are you sure to remove this item?')"> Remove </button> </a>
                </div>
            </figure>
            <hr color="#DDd" width="100%" >
       <?php }

$Osql = "select sum(total) as sumTotal from orders where user_id = $user_id and order_status='Ordered'";
$Orderop = mysqli_query($con,$Osql);
$orderdata = mysqli_fetch_assoc($Orderop);
	    echo '</div>';
        echo '</section>';

    echo '<section class="sec3">';
    echo  '<div class="container">';

           echo '<figure>';

           echo '<div class="sec3-head">';
           echo '<h4>Cart Total</h4>';
           echo '</div>';

           echo '<div>';
           echo '<h5>Subtotal</h5>';
           echo '<h5> <span>$</span>'.$orderdata['sumTotal']. '</h5>';
           echo '</div>';
     }
        else {
            ?>
            <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Item Found ...
            </div>
        </div>
        <?php
        }
    ?>


           </figure>


           </div>
           </section>
   
	<script src="js/jquery-3.6.0.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
	<!-- <script src="js/main.js"></script> -->

</body>
</html>