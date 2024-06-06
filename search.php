<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "restaurant_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get search query from URL parameter
$searchQuery = $_GET['q'];

// Query to search for items in the food table
$sql = "SELECT * FROM food WHERE itemName LIKE '%$searchQuery%'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display search results
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row["itemName"] . "</p>";
        echo "<p>" . "Rs" . $row["Price"] . "</p>";

        echo "<p>" . $row["description"] . "</p>";
        // Add more fields as needed
    }
} else {
    echo "No results found.";
}

mysqli_close($conn);
?>
