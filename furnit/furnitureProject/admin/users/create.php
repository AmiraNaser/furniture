i<?php

require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';
require '../helpers/checkAdmin.php';

#############################################################################################
$sql = "select * from roles";
$rolesOp  = mysqli_query($con, $sql);

#############################################################################################

// function uploadFile($input){

//     $result = false;

//     $imgName  = $input['image']['name'];
//     $imgTemp  = $input['image']['tmp_name'];

//     $nameArray =  explode('.', $imgName);
//     $imgExtension =  strtolower(end($nameArray));
//     $imgFinalName = time() . rand() . '.' . $imgExtension;

     
//     $disPath = 'uploads/' . $imgFinalName;

//     if (move_uploaded_file($imgTemp, $disPath)) {
//       $result =  $imgFinalName ;
//        }

//       return $result;  
      
  
// }




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

    # Validate Password 
    if (!validate($password, 1)) {
        $errors['Password'] = " Password Required";
    } elseif (!validate($password, 3)) {
        $errors['Password'] = " Password Length Must be >= 6 Chars";
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
    if (!validate($_FILES['image']['name'], 1)) {
        $errors['Image']  = "Image Required";
    } elseif (!validate($_FILES['image']['name'], 5)) {
        $errors['Image']  = "Image : Invalid Extension";
    }



 


    # Check Errors 
    if (count($errors) > 0) {
        $_SESSION['Message'] = $errors;
    }
    else {
        # logic .... 

        $image = uploadFile($_FILES);

        if (empty($image) ) {
            $_SESSION['Message'] = ["Error In Uploading File Try Again"];
        } else {

            $password = md5($password);
            $sql = "insert into user (role_id,firstName,lastName,email,password,phone,address,image)
             values ($role_id,'$fname' , '$lname', '$email' ,'$password','$phone','$address','$image')";
            $op  = mysqli_query($con, $sql);

            if ($op) {
                $message = ["Raw Inserted"];
            } else {
                $message = ["Error Try Again"];
            }

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

            displayMessages('Dashboard/Add User');

            ?>



        </ol>



        <div class="container">


            <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputName">First Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="fname" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Last Name</label>
                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="lname" placeholder="Enter Last Name">
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">Phone</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Phone">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">addres</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Address">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword">Role Type</label>
                    <select class="form-control" name="role_id">

                        <?php
                        while ($Role_data = mysqli_fetch_assoc($rolesOp)) {
                        ?>

                            <option value="<?php echo $Role_data['id']; ?>"><?php echo $Role_data['userRole']; ?></option>

                        <?php }  ?>

                    </select>
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword">Image</label>
                    <input type="file" name="image">
                </div>



                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>




    </div>
</main>


<?php

require '../layouts/footer.php';

?>