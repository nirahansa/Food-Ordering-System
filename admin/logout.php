<?php  
    include('connection.php');
    //1.Destory the Session
    session_destroy();
    //2.Redirect to login page
    header("location: http://localhost/rest/admin/admin.php");
?>