<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>


            <center><h1>Menu</h1><br></center>


            <div class="container-fluid">
                <div class="container">
                <form id="searchForm">
                <div class="search">
                    <input type="text" name="" id="find" placeholder="Search here....">
                    <button type="submit">Search</button>
                </div>
                </form>
                <div id="searchResults"></div>
                    <div class="product-list">
                        <?php
                        // Connect to the database
                        $connection = mysqli_connect("localhost", "root", "", "restaurant_db");

                        if (!$connection) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Query to select all food items
                        $query = "SELECT * FROM food";
                        $result = mysqli_query($connection, $query);

                        if (mysqli_num_rows($result) > 0) {
                            // Loop through each row in the result set
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Output HTML for each food item
                                echo "<div class='product'>";
                                echo "<div class='card'>";
                                echo "<img src='http://localhost/rest/image/food/{$row['imageURL']}' width='100%'>";
                                echo "<div class='card-content'>";
                                echo "<h2>{$row['itemName']}</h2>";
                                echo "<p>{$row['description']}</p>";
                                
                                echo "</div>"; // Close card-content
                                echo "</div>"; // Close card
                                echo "</div>"; // Close product
                            }
                        } else {
                            echo "No food items found.";
                        }

                        // Close the database connection
                        mysqli_close($connection);
                        ?>
                    </div> <!-- Close product-list -->
                </div> <!-- Close container -->
            </div> <!-- Close container-fluid -->
            <a href="http://localhost/rest/index.html"><img src="http://localhost/rest/image/back.png" width="40px"></a>
            <script src="script.js"></script>
        </body>
</html>