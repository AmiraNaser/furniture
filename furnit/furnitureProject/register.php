<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $fname     = Clean($_POST['fname']);
  $lname     = Clean($_POST['lname']);
  $email    = Clean($_POST['email']);
  $password = Clean($_POST['password'], 1);
  $phone    = Clean($_POST['phone']);
  $address    = Clean($_POST['address']);


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

    # Check Errors 
    if (count($errors) > 0) {
      $_SESSION['Message'] = $errors;
    }
    else {
      # logic .... 
      $password = md5($password);
      $registerTime = time();
      $image        = 'profile-icon-png-898.png';
      $sql = "insert into user (firstName,lastName,email,password,phone,address,image,registeredDate,role_id)
       values ('$fname' , '$lname', '$email' ,'$password','$phone','$address','$image',$registerTime,5)";
      $op  = mysqli_query($con, $sql);
      if ($op) {
          $message = ["Raw Inserted"];
      } else {
          $message = ["Error Try Again"];
      
      $_SESSION['Message'] = $message;
        
    }    
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="http://localhost/furnit/furnitureProject/admin/design/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="http://localhost/furnit/furnitureProject/admin/design/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="http://localhost/furnit/furnitureProject/admin/design/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="http://localhost/furnit/furnitureProject/admin/design/images/favicon.png" />
    <style>
body {
background-image: url("http://localhost/furnit/furnitureProject/admin/design/images/Login_bg.jpg");
background-repeat: no-repeat;
background-size: cover;
}
 
</style>
  </head>
  <body>
            <?php

            displayMessages();

            ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>"   method="POST">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control p_input" name = "fname">
                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control p_input" name = "lname">
                  </div>                  
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name = "email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name = "password">
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control p_input" name = "phone">
                  </div>  
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control p_input" name = "address">
                  </div>                                      
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col mr-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="#"> Sign In</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="http://localhost/furnit/furnitureProject/admin/design/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="http://localhost/furnit/furnitureProject/admin/design/js/off-canvas.js"></script>
    <script src="http://localhost/furnit/furnitureProject/admin/design/js/hoverable-collapse.js"></script>
    <script src="http://localhost/furnit/furnitureProject/admin/design/js/misc.js"></script>
    <script src="http://localhost/furnit/furnitureProject/admin/design/js/settings.js"></script>
    <script src="http://localhost/furnit/furnitureProject/admin/design/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>