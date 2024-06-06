<?php
//Establish a MYSQL Database Connection
$connection = mysqli_connect("localhost","root","","restaurant_db");

if (!$connection){
    die("connection failed: " . mysqli_connect_error());
}

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";
if (mysqli_query($connection, $query)) {
    echo "User added successfully.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}
//close the database connection
mysqli_close($connection);

?>
