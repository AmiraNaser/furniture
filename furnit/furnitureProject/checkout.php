<?php 
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

$id = $_GET['order_id'];

// $sql = "select image from product where id = $id";
// $op  = mysqli_query($con,$sql);
// $orderData = mysqli_fetch_assoc($op);

// $order_sql = "UPDATE orders SET order_status='Ordered' WHERE order_status='Pending' and user_id =$id";
// $order_op  = mysqli_query($con,$order_sql);

// if($op){
//     echo "<script>alert('Item/s successfully ordered!')</script>";
// }else{
//     $message = ["Error Try Again"];
// }
//    $_SESSION['Message'] = $message;
//    header("location: cart_items.php"); 
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
	<link href="css/checkout.css" rel="stylesheet" type="text/css">

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
				<!-- <div class="logo">
					<p>comfy</p>
				</div>
				<div class="nav-card">
					<i class="fas fa-shopping-cart" id="cardicon"><span>0</span></i>
			  </div> -->
			</nav>

		</div>
	</header>


<!------------------------------------------------------------->

  <section class="sec1">
    <div class="container">
      <h1> Home / CheckOut </h1>
    </div>
  </section>

<!------------------------------------------------------------->

    <section class="sec2">

        <div class="container">

            <section class="checkbig">
    
                <form action="" method="post">
    
                    <div class="flname">
                        <div>
                            <label for="">First Name</label><br>
                            <input type="text" name="fname">
                        </div>
        
                        <div>
                            <label for="">Last Name</label><br>
                            <input type="text" name="lname">
                        </div>
                    </div>
    
                    <div>
                        <label for="">Country</label><br>
                        <input type="text" name="country">
                    </div>
                    <div>
                        <label for="">City</label><br>
                        <input type="text" name="city">
                    </div>
                    <div>
                        <label for="">Address</label><br>
                        <input type="text" name="address">
                    </div>
    
                    <div class="phemail">
                        <div>
                            <label for="">Phone</label><br>
                            <input type="text" name="phone">
                        </div>
        
                        <div>
                            <label for="">Email adress</label><br>
                            <input type="text" name="email">
                        </div>
                    </div>
                    <a href="order.php?id=$_SESSION['User']['id']"> <button type="button">CkeckOut</button> </a>
    
                </form>
    
                <aside>
                    <div class="sec2-head">
                        <h5>Cart Total</h5>
                    </div>
    
                    <div>
                        <h5>Subtotal</h5>
                        <h5> <span>$</span>1500.00 </h5>
                    </div>
    
                    <div>
                        <h5>Shipping</h5>
                        <h5> <span>$</span>1500.00 </h5>
                    </div>
    
                    <div>
                        <h5>Total</h5>
                        <h5> <span>$</span>1500.00 </h5>
                    </div>
                </aside>
    
    
            </section>
    
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
