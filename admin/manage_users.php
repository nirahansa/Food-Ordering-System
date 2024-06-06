<?php 
    include('part/manu.php');
?>


        <!---main contant start----->
        <div class="main_content">
            <div class="wrapper">
                <h1>Manage Users</h1>
                
                <?php
                   
                    if (isset($_SESSION['delete']))
                    {
                       echo $_SESSION['delete'];//Display Session Message
                       unset($_SESSION['delete']);//Removing Session Message
                    }
                    
                    
                ?><br/><br/>
                <!---Add admin----->
                
                <table class="tblfull">
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        //Query to Get all Admin
                        $sql ="SELECT * FROM users";
                        //Execute the Query
                        $res = mysqli_query($conn,$sql);

                        //check whether the Executed of not
                        if ($res==TRUE) 
                        {
                           //count Rows to check whether we have data in database or not
                           $count = mysqli_num_rows($res);//function to get all the rows in the database

                           $Sn =1;
                           
                           //check the num_of rows
                           if($count>0)
                           {
                            //We have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using while loop to get all the data from database.
                                    //And while loop will run as long as we have data in database.

                                    //Get individual data
                                    $userID=$rows['userID'];
                                    $fname=$rows['first_name'];
                                    $lname=$rows['last_name'];
                                    $email = $rows['email'];
                                    

                                    //Display the values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $Sn++; ?></td>
                                        <td><?php echo $fname; ?></td>
                                        <td><?php echo $lname; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td>
                                            
                                            <a href="delete_users.php?userID=<?php echo $userID; ?>" class="btn-danger">Delete user</a>

                                        </td>
                                    </tr>    

                                    <?php
                                }
                           }else{
                            //We have data in database
                           }
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