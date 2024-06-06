<?php 
    include('part/manu.php');
?>
<?php
    include('connection.php');
?>

        <!---main contant start----->
        <div class="main_content">
            <div class="wrapper">
                <h1>Manage Order</h1>
                <?php
                        if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; // Display the session message if set
                        unset($_SESSION['update']);
                    } 
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload']; // Display the session message if set
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; // Display the session message if set
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['undelete']))
                    {
                        echo $_SESSION['undelete']; // Display the session message if set
                        unset($_SESSION['undelete']);
                    }
                ?>
                <table class="tblfull">
                    <tr>
                        <th>Order ID</th>
                        
                        <th>U_Name</th>
                        <th>U_Number</th>
                        <th>U_Email</th>
                        <th>U_Address</th>
                        
                        <th>Total</th>
                        
                        <th>Method</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                    <?php
                        // Create a SQL Query to get all the food
                        $sql = "SELECT * FROM orders";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        if($count > 0)
                        {
                            // We have food in Database
                            // Get the foods from Database and Display
                            while($row = mysqli_fetch_assoc($res))
                            {
                                $orderID = $row['orderID'];
                                
                                $u_name = $row['u_name'];
                                $u_number = $row["u_number"];
                                $u_email = $row["u_email"];
                                $u_address = $row["u_address"];
                                
                                $Total = $row["total"];
                                $method=$row["method"];
                                $time=$row["time"];
                                $status=$row["status"];
                                

                                
                                // Output each row of data within the loop
                                echo "<tr>";
                                echo "<td>".$sn++."</td>";
                                
                                echo "<td>".$u_name."</td>";
                                echo "<td>".$u_number."</td>";
                                echo "<td>".$u_email."</td>";
                                echo "<td>".$u_address."</td>";
                                
                                echo "<td>".$Total."</td>";
                                
                                echo "<td>".$method."</td>";
                                echo "<td>".$time."</td>";
                                echo "<td style='color:red'>".$status."</td>";
                                echo "<td>";
                                echo "<a href='update_order.php?orderID=".$orderID."' class='btn-secondary'>Update_order</a><br><br>";
                                echo "<a href='delete_order.php?orderID=".$orderID."' class='btn-danger'>Delete_order</a>";
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
            <div class="clearflex">

            </div>
        </div>
        
        <!---main contant close----->

<?php
    include('part/footer.php');
?>