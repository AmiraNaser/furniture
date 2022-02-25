<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';
$id = $_GET['id'];
$sql = "select product.*, subcategory.id as subCatID from product join subcategory on product.sub_category_id = subcategory.id where sub_category_id = $id";
$op = mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="women.js"></script>
    <link rel="stylesheet" href="./css/product.css">
  </head>
  <body>
        <!--navbar Container-->

<div class="navbar">
  <div class="logo">
  <img src="W_A_S_K-removebg-preview.ico" alt="Avatar" class="avatar">
  <div class= "slogan">
  <p style="padding-top: 20px;"> we deliver your happiness</p>
  </div>
  </div>
  <!-- Load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </div>   
  </div>
  </div>
  <script src="index.js"></script>

      <!-- Slide Show-->
    <div id="maincontainer">
      <div class="imgcontainer">
        <img  class="firstimage" src="https://static.wixstatic.com/media/ad420a_a6fde3feab894f6cae6bf59d119fc863~mv2.jpg/v1/fill/w_1126,h_606,al_c,q_85,usm_0.66_1.00_0.01/ad420a_a6fde3feab894f6cae6bf59d119fc863~mv2.webp" alt="Watches">
        <img  class="secimage" src="https://static.wixstatic.com/media/ca2a5a_4f308b3df1784fa39e4197b23468dd66.jpg/v1/fill/w_956,h_521,al_c,q_85,usm_0.66_1.00_0.01/ca2a5a_4f308b3df1784fa39e4197b23468dd66.webp" alt="bow tie">
        <img  class="thirdimg" src="https://static.wixstatic.com/media/ca2a5a_56f36533cbf449c4a7116ed2e9127011.jpg/v1/fill/w_956,h_248,al_c,q_80,usm_0.66_1.00_0.01/ca2a5a_56f36533cbf449c4a7116ed2e9127011.webp" alt="Sunglasses">
      </div>
    </div>

    <!--Products-->
<div class="wrapper" id="women_acceroies">

  <h1>Products</h1>

  <div class="cols">
  <?php    
    while($data = mysqli_fetch_assoc($op)){   
   ?>
		<div class="col" ontouchstart="this.classList.toggle('hover');">
				<div class="container">
					<div class="front" style="background-image: url(./admin/products/uploads/<?php echo $data['image']?>)">

						<div class="inner">

						</div>
					</div>
					<div class="back">
						<div class="inner">
						  <p><?php echo $data['title']?></p> <br>
              <div class="spanwrapper">
        <span class="firstspa" title="Original price"><?php echo $data['price']?></span>
        <span class="secspan" title="Discount price"><?php //echo $data['discountPercent']?></span>
      </div> <br>
      <form class="formwrapper" action="" method="post">
        <button id="mybutton1"  type="button" name="See More Details" class="detailsbutton" onclick="location.href ='add_to_cart.php?item_id=<?php  echo $data['id'];?>'">See More Details</button>
      </form>
						</div>
					</div>
				</div>
		</div>
		<?php } ?>
  </div>
  
  </div>
</div>

</div>
  </body>
</html>
