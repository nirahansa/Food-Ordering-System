<?php
    //start Session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    //create constants to store non-repeating values
    
    
    $conn = mysqli_connect('localhost','root','') or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn,'restaurant_db') or die(mysqli_error()); //selecting database
        
?>








