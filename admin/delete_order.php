<?php

    include('connection.php');
    //1. get the ID of admin to be deleted
    
    $orderID = $_GET['orderID'];
    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM orders WHERE orderID='$orderID'";

    //execut the Query
    $res = mysqli_query($conn,$sql);

    //check whether the Query executed successfully or not
    if ($res==TRUE) {
        //echo "Delete Successfully";
        $_SESSION['delete'] = "<div class='success'>order Deleted Successfully</div>";
        header("location: http://localhost/rest/admin/manage_order.php");
    }else{
        //echo "Delete Failed";
        $_SESSION['delete'] = "<div class='error'>order Deleted Failed</div>";
        header("location: http://localhost/rest/admin/manage_order.php");
    }

    //3.Redirect to manage Admin Page with message(success/error)




?>

