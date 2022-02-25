<?php
if(isset($_GET['id']) && !empty($_GET['id']))
{
   
    // $app_sql = "select * from user where id = $view_id";
    // $app_op = mysqli_query($con,$app_sql);
    // $app_data = mysqli_fetch_assoc($app_op);

        $view_id = $_GET['id'];
        $approved_sql = "update orders set order_status='Ordered_Finished' where order_status = 'pending' and  user_id= $view_id";
        $Orderop = mysqli_query($con,$approved_sql);
        if($Orderop){
            header("Location: previous_order.php?id=$view_id");
        }
}
else
{
    header("Location: index.php");
}

// if(isset($_GET['view_id']) && !empty($_GET['view_id']))
// {
//     $view_id = $_GET['view_id'];
//     $stmt_edit = $DB_con->prepare('SELECT * FROM users WHERE user_id=:user_id');
//     $stmt_edit->execute(array(':user_id'=>$view_id));
//     $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
//     extract($edit_row);
//     if(isset($_GET['action']) && $_GET['action'] =='finished'){
//         $stmt_update = $DB_con->prepare("UPDATE orderdetails set order_status='Ordered_Finished' WHERE order_status = 'Ordered' and  user_id=:user_id");
//         $stmt_update->execute(array(':user_id'=>$view_id));
//         if($stmt_update){
//             header("Location: previous_orders.php?previous_id=".$view_id);
//         }
//     }
// }
// else
// {
//     header("Location: customers.php");
// }
?>