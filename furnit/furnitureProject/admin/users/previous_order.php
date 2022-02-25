<?php

require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';
require '../helpers/checkAdmin.php';

$user_id = $_GET['id'];
$sql = "select orders.*, product.id as productID, product.title, product.price, product.image  from orders join product on orders.product_id = product.id where  order_status='Ordered_Finished' and user_id='$user_id'";
$op = mysqli_query($con,$sql);

require '../layouts/header.php';
require '../layouts/sidenav.php';
require '../layouts/nav.php';
?>




<main>
    <div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <?php

           
            displayMessages('Dashboard/Display Users');

            ?>
        </ol>





        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item Image</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Date Ordered</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>ID</th>
                            <th>Item Image</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Date Ordered</th>
                            </tr>
                        </tfoot>

                        <tbody>

                            <?php

                            while ($data = mysqli_fetch_assoc($op)) {

                            ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td> <img src="../products/uploads/<?php echo $data['image']; ?>" height="50" width="50"> </td>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['price']; ?></td>
                                    <td><?php echo $data['quantity']; ?></td>
                                    <td><?php echo $data['total']; ?></td>
                                    <td><?php echo $data['order_date']; ?></td>
                                </tr>
 
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


<?php

require '../layouts/footer.php';

?>