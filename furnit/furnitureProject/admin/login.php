<?php 

require 'helpers/dbConnection.php';
require 'helpers/functions.php';


     if($_SERVER['REQUEST_METHOD'] == "POST"){


        $password = Clean($_POST['password'], 1);
        $email    = Clean($_POST['email']);
    
    
        # Validate ...... 
    
        $errors = [];
    
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


    # Check ...... 
    if (count($errors) > 0) {
        // print errors .... 

        foreach ($errors as $key => $value) {
          $_SESSION['Message'] = $errors;
        }
    }else{



        # Login code ...... 
  
        $password = md5($password); 

        $sql = "select * from user where email = '$email' and password = '$password'";

        $result  = mysqli_query($con,$sql); 

          
     
        if( mysqli_num_rows($result) == 1){

          $data = mysqli_fetch_assoc($result); 

          $_SESSION['User'] = $data; 
          if ($_SESSION['User']['id'] == 1) {
          header("location: index.php");
          }else{
          header("location: ../category.php");            
          }

        }else{
            $_SESSION['Message'] = ['Error In Email || Password Try Again  '];
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
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']);?>"   method="POST">
                  <div class="form-group">
                    <label>Email *</label>
                    <input type="text" class="form-control p_input" name="email">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" name="password">
                  </div>
                  <!-- <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div> -->
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
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