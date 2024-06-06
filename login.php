<?php

    $con = mysqli_connect("localhost", "root", "", "restaurant_db");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $con->query($sql);
    
        if ($result->num_rows > 0) {
            
            $_SESSION["email"] = $email;
            header("Location: home.html");
        } else {
            
            echo "Invalid email or password";
        }
    }
    
    $con->close();
?>
