<?php
require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';
require '../helpers/checkAdmin.php';

$id = $_SESSION['User']['id'];
$pass_sql = "select * from user where id = $id";
$pass_op = mysqli_query($con, $pass_sql);
$UserData = mysqli_fetch_assoc($pass_op);


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $oldPassword = Clean($_POST['oldPassword'], 1);
    $newPassword = Clean($_POST['newPassword'], 1);
    $conPassword = Clean($_POST['conPassword'], 1);

    $errors = [];
    if (!validate($oldPassword, 1)) {
        $errors['Password'] = " Password Required";
    } elseif (!validate($oldPassword, 3)) {
        $errors['Password'] = " Password Length Must be >= 6 Chars";
    }
    if (!validate($newPassword, 1)) {
        $errors['Password'] = " Password Required";
    } elseif (!validate($newPassword, 3)) {
        $errors['Password'] = " Password Length Must be >= 6 Chars";
    }

    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    } else {
        
        $database_password = $UserData['password'];
        $hasholdPass       = md5($oldPassword);
        if ($database_password == $hasholdPass ) {
            if ($newPassword == $conPassword) {
                $setnewPass = md5($newPassword);
                echo $setnewPass;
                $sql = "UPDATE user SET password = '$setnewPass' where id = $id";
                $op  = mysqli_query($con, $sql);

                if ($op) {
                    $message = ["Raw Updated"];
                    $_SESSION['Message'] = $message;
        
                    header("Location: index.php");
                    exit();
                } else {
                    $message = ["Error Try Again"];
                    $_SESSION['Message'] = $message;
                }                
            }
        }
    }
}

require '../layouts/header.php';
require '../layouts/sidenav.php';
require '../layouts/nav.php';
?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <?php
            displayMessages('Dashboard/Edit User');
            ?>
        </ol>
        <div class="container">
            <form  action="editPass.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputPassword">Old Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword" name="oldPassword" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="newPassword" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="conPassword" placeholder="">
                </div>                
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>
</main>
<?php

require '../layouts/footer.php';

?>