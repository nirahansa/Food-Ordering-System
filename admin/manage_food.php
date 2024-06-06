<?php 
    
    include('part/manu.php');
?>
<?php
    
    include('connection.php');
?>

<div class="main_content">
    <div class="wrapper">
        <h1>Food Item</h1><br/><br/><br/>
        <?php  
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; // Display the session message if set
                unset($_SESSION['add']);
            } 
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete']; // Display the session message if set
                unset($_SESSION['delete']);
            } 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; // Display the session message if set
                unset($_SESSION['upload']);
            } 
            if(isset($_SESSION['undelete']))
            {
                echo $_SESSION['undelete']; // Display the session message if set
                unset($_SESSION['undelete']);
            } 
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update']; // Display the session message if set
                unset($_SESSION['update']);
            } 

        ?>
        <a href="add_food.php" class="btn-primary">Add Food</a><br/><br/><br/>
        <table class="tblfull">
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Image URL</th>
                <th>Featured</th>
                <th>Action</th>
            </tr>
            <?php
                // Create a SQL Query to get all the food
                $sql = "SELECT * FROM food";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                $sn = 1;
                if($count > 0)
                {
                    // We have food in Database
                    // Get the foods from Database and Display
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $item_id = $row['itemID'];
                        $itemName = $row["itemName"];
                        $price = $row['Price'];
                        $image_name = $row["imageURL"];
                        $featured = $row["featured"];
                        
                        // Output each row of data within the loop
                        echo "<tr>";
                        echo "<td>".$sn++."</td>";
                        echo "<td>".$itemName."</td>";
                        echo "<td>".$price."</td>";
                        echo "<td>".$image_name."</td>";
                        echo "<td>".$featured."</td>";
                        echo "<td>";
                        echo "<a href='update_food.php?itemID=".$item_id."' class='btn-secondary'>Update Food</a>";
                        echo "<a href='delete_food.php?itemID=".$item_id."' class='btn-danger'>Delete Food</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                else
                {
                    // No food items found
                    echo "<tr><td colspan='6' class='error'>Food not Added yet</td></tr>";
                }
            ?>
        </table>
    </div> 
    <div class="clearflex"></div>
</div>

<?php
    include('part/footer.php');
?>
