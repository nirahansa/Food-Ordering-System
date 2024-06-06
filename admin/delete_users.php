<?php

    include('connection.php');
    //1. get the ID of admin to be deleted
    
    $userID = $_GET['userID'];
    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM users WHERE userID='$userID'";

    //execut the Query
    $res = mysqli_query($conn,$sql);

    //check whether the Query executed successfully or not
    if ($res==TRUE) {
        //echo "Delete Successfully";
        $_SESSION['delete'] = "<div class='success'>user Deleted Successfully</div>";
        header("location: http://localhost/rest/admin/manage_users.php");
    }else{
        //echo "Delete Failed";
        $_SESSION['delete'] = "<div class='error'>user Deleted Failed</div>";
        header("location: http://localhost/rest/admin/manage_users.php");
    }

    //3.Redirect to manage Admin Page with message(success/error)




?>