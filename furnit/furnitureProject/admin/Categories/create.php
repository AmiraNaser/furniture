<?php

require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';


////////////////////////////////////////////////

 if($_SERVER['REQUEST_METHOD'] == "POST"){

    // CODE ..... 
    $title = Clean($_POST['title']);
    $errors = [];

    #validate title
    if(!validate($title,1)){
        $errors['Title'] = " Title Required"; 
    }
    #Validate Image ... 
    if (!validate($_FILES['image']['name'], 1)) {
        $errors['Image']  = "Image Required";
    } elseif (!validate($_FILES['image']['name'], 5)) {
        $errors['Image']  = "Image : Invalid Extension";
    }


   if (count($errors) > 0) {
    $_SESSION['Message'] = $errors;
} else {
    $image = uploadFile($_FILES);

    if (empty($image) ) {
        $_SESSION['Message'] = ["Error In Uploading File Try Again"];
    } else {
        $sql = "insert into category (name,image) values ('$title','$image')"; 
       
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

 require '../layouts/header.php';
 require '../layouts/sidenav.php';
 require '../layouts/nav.php';
?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">         
            <?php 
           
               displayMessages('Dashboard/Add Category');

            ?>
        </ol>
        <div class="container">


            <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputName">Title</label>
                    <input type="text" class="form-control"  id="exampleInputName" aria-describedby="" name="title" placeholder="Enter RoleTitle">
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