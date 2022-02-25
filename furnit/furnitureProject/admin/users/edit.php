<?php

require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';
require '../helpers/checkAdmin.php';

#############################################################################################

// Fetch User data .... 
$id = $_GET['id'];
$sql = "select * from user where id = $id";
$op = mysqli_query($con, $sql);
$UserData = mysqli_fetch_assoc($op);

##############################################################################################
// Fetch Roles ..... 
$sql = "select * from roles";
$role_op  = mysqli_query($con, $sql);


#############################################################################################


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // CODE ..... 

    $fname     = Clean($_POST['fname']);
    $lname     = Clean($_POST['lname']);
    $email    = Clean($_POST['email']);
    $password = Clean($_POST['password'], 1);
    $phone    = Clean($_POST['phone']);
    $address    = Clean($_POST['address']);
    $role_id  = Clean($_POST['role_id']);

    # Validate Input ... 

    $errors = [];
    # Validate FName ... 
    if (!validate($fname, 1)) {
        $errors['FName'] = " First Name Required";
    }elseif (!validate($fname, 8)) {
        $errors['FName'] = " first name Invalid String  ";
    }
    # Validate LName ... 
    if (!validate($lname, 1)) {
        $errors['LName'] = " Last Name Required";
    }elseif (!validate($lname, 8)) {
        $errors['LName'] = " last name Invalid String  ";
    }


    # Validate Email .... 
    if (!validate($email, 1)) {
        $errors['Email'] = " Email Required";
    } elseif (!validate($email, 2)) {
        $errors['Email'] = " Email Invalid Field";
    }

    #validate Phone 
    if (!validate($phone, 1)) {
        $errors['Phone'] = " Phone Required ";
    }
    elseif((!validate($phone, 9))){
        $errors['Phone'] = "Invalide Phone";
    }

    #validate address 
    if (!validate($address, 1)) {
        $errors['Address'] = " Address Required ";
    }


    # Validate Role_id  ... 
    if (!validate($role_id, 1)) {
        $errors['Role'] = " Role Required";
    } elseif (!validate($role_id, 4)) {
        $errors['Role'] = " Role Invalid";
    }

    #Validate Image ... 
    if (validate($_FILES['image']['name'], 1)) {

        if (!validate($_FILES['image']['name'], 5)) {
            $errors['Image']  = "Image : Invalid Extension";
        }
    }




    # Check Errors 
    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    } else {
        # logic .... 

        if (validate($_FILES['image']['name'], 1)) {

            $image = uploadFile($_FILES);

            if (!empty($image)) {
                unlink('./uploads/' . $UserData['image']);
            }
        } else {
            $image = $UserData['image'];
        }




        $sql = "update user set firstName =  '$fname' ,lastName =  '$lname', email = '$email' ,
         phone = '$phone', address = '$address' ,role_id = $role_id , image = '$image' where id = $id";
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



#############################################################################################
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


            <form action="edit.php?id=<?php echo  $UserData['id']; ?>" method="post" enctype="multipart/form-data"><!--  -->

            <div class="form-group">
                    <label for="exampleInputName">First Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="fname" value="<?php echo $UserData['firstName'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="lname" value="<?php echo $UserData['lastName'] ?>">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $UserData['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">Phone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?php echo $UserData['phone'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">addres</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="<?php echo $UserData['address'] ?>">
                </div>




                <div class="form-group">
                    <label for="exampleInputPassword">Role Type</label>
                    <select class="form-control" name="role_id">

                        <?php
                        while ($Role_data = mysqli_fetch_assoc($role_op)) {
                        ?>

                            <option value="<?php echo $Role_data['id']; ?>" <?php if ($UserData['role_id'] == $Role_data['id']) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $Role_data['userRole']; ?></option>

                        <?php }  ?>

                    </select>
                </div>





                <div class="form-group">
                    <label for="exampleInputPassword">Image</label>
                    <input type="file" name="image">
                </div>
                <br>
                <img src="./uploads/<?php echo $UserData['image']; ?>" height="50" width="50" alt="">
                <br>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>




    </div>
</main>


<?php

require '../layouts/footer.php';

?>