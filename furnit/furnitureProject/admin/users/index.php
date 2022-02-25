<?php

require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';
require '../helpers/checkAdmin.php';

# Fetch Data ... 
$sql = "select user.* , roles.userRole from user inner join roles on user.role_id = roles.id";
$op  = mysqli_query($con, $sql);

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
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </tfoot>

                        <tbody>

                            <?php

                            while ($data = mysqli_fetch_assoc($op)) {

                            ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['firstName']; ?></td>
                                    <td><?php echo $data['lastName']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['phone']; ?></td>
                                    <td><?php echo $data['address']; ?></td>
                                    <td><?php echo $data['userRole']; ?></td>
                                    <td> <img src="./uploads/<?php echo $data['image']; ?>" height="50" width="50"> </td>

                                    <td>
                                        <a href='viewOrder.php?id=<?php echo $data['id'];  ?>' class='btn btn-success m-r-1em'>View Orders</a>
                                        <a href='previous_order.php?id=<?php echo $data['id'];  ?>' class='btn btn-primary m-r-1em'>View Previous Orders</a>
                                        <a href='deleteOrder.php?id=<?php echo $data['id'];  ?>' class='btn btn-warning m-r-1em' onclick="return confirm('Are you sure to reset the customer items ordered?')">Reset Orders</a>
                                        <a href='delete.php?id=<?php echo $data['id'];  ?>' class='btn btn-danger m-r-1em' onclick="return confirm('Are you sure to remove this customer?')">Delete</a>
                                        <a href='edit.php?id=<?php echo $data['id'];  ?>' class='btn btn-primary m-r-1em'>Edit</a>

                                    </td>

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