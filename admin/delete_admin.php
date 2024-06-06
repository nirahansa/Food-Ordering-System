<?php

    include('connection.php');
    //1. get the ID of admin to be deleted
    $adminID = $_GET['adminID']; 

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM admin WHERE adminID=$adminID";

    //execut the Query
    $res = mysqli_query($conn,$sql);

    //check whether the Query executed successfully or not
    if ($res==TRUE) {
        //echo "Delete Successfully";
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        header("location: http://localhost/rest/admin/manage_admin.php");
    }else{
        //echo "Delete Failed";
        $_SESSION['delete'] = "<div class='error'>Admin Deleted Failed</div>";
        header("location: http://localhost/rest/admin/manage_admin.php");
    }

    //3.Redirect to manage Admin Page with message(success/error)




?>