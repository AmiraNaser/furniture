<?php
require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';


//////////////////////////////////////////////////

$sql = "select * from category";
$op  = mysqli_query($con, $sql);


require '../layouts/header.php';
require '../layouts/sidenav.php';
require '../layouts/nav.php';
?>


        <div class="container">
            <div class="page-header">
                <h1>Display Tasks</h1>
                <br>
                <?php
                // echo 'Welcome, ' . $_SESSION['user']['name'] . '<br>';
                // if(isset($_SESSION['Mesage'])) {
                //     echo $_SESSION['Message'];
                //     unset($_SESSION['Message']);
                // }
                ?>
                    <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <?php
            displayMessages('Dashboard/Display Categories');

            ?>
        </ol>
            </div>
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>       
                </tr>
                <?php
                while($result = mysqli_fetch_assoc($op)) {
                ?>    
                    <tr>
                        <td><?php echo $result['id'];?></td>
                        <td><?php echo $result['name'];?></td>
                        <td><img src="./uploads/<?php echo $result['image'];?>" alt="" height="50" width="50"></td>
                        <td>
                           <a href='edit.php?id=<?php echo $result['id'];  ?>' class='btn btn-primary m-r-1em'>Edit</a>
                           <a href='delete.php?id=<?php  echo $result['id'];  ?>' class='btn btn-danger m-r-1em'>Delete</a>
                       </td>
                    </tr>
                <?php } ?>
                
            </table>
        </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Latest compiled and minified Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php
mysqli_close($con);
?>
<?php
//require '../layouts/footer.php';
?>