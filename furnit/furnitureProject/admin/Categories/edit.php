<?php

require '../helpers/dbConnection.php';
require '../helpers/functions.php';
require '../helpers/checkLogin.php';


//////////////////////////////////////

$id = $_GET['id']; 

$sql = "select * from category where id = $id"; 
$op  = mysqli_query($con,$sql);
$catData = mysqli_fetch_assoc($op);

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



    ##############################3
    $sql = "update category  set name =  '$title' , image = '$image' where id = $id";
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

 require '../layouts/header.php';
 require '../layouts/sidenav.php';
 require '../layouts/nav.php';
?>




<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>

        <ol class="breadcrumb mb-4">         
            <?php 
              
               displayMessages('Dashboard/Edit Category');
            ?>
        </ol>
        <div class="container">


            <form action="edit.php?id=<?php echo  $catData['id']; ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputName">Title</label>
                    <input type="text" class="form-control"  id="exampleInputName" aria-describedby="" name="title" value = "<?php echo $catData['name'];?>" placeholder="Enter catTitle">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword">Image</label>
                    <input type="file" name="image">
                </div>

                <br>
                <img src="./uploads/<?php echo $catData['image']; ?>" height="50" width="50" alt="">
                <br>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>




    </div>
</main>


<?php

require '../layouts/footer.php';

?>