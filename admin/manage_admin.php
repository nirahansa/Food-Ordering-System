<?php 
    include('part/manu.php');
?>


        <!---main contant start----->
        <div class="main_content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br/><br/><br/>
                <?php
                    if (isset($_SESSION['add']))
                    {
                       echo $_SESSION['add'];//Display Session Message
                       unset($_SESSION['add']);//Removing Session Message
                    }
                    if (isset($_SESSION['delete']))
                    {
                       echo $_SESSION['delete'];//Display Session Message
                       unset($_SESSION['delete']);//Removing Session Message
                    }
                    if (isset($_SESSION['update']))
                    {
                       echo $_SESSION['update'];//Display Session Message
                       unset($_SESSION['update']);//Removing Session Message
                    }
                    if (isset($_SESSION['user-not-found']))
                    {
                       echo $_SESSION['user-not-found'];//Display Session Message
                       unset($_SESSION['user-not-found']);//Removing Session Message
                    }
                    if (isset($_SESSION['pwd-not-match']))
                    {
                       echo $_SESSION['pwd-not-match'];//Display Session Message
                       unset($_SESSION['pwd-not-match']);//Removing Session Message
                    }
                    if (isset($_SESSION['change_password']))
                    {
                       echo $_SESSION['change_password'];//Display Session Message
                       unset($_SESSION['change_password']);//Removing Session Message
                    }
                ?><br/><br/><br/>
                <!---Add admin----->
                <a href="add_admin.php" class="btn-primary">Add Admin</a><br/><br/><br/>
                <table class="tblfull">
                    <tr>
                        <th>Admin ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                        //Query to Get all Admin
                        $sql ="SELECT * FROM admin";
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
                                    $adminID=$rows['adminID'];
                                    $name=$rows['name'];
                                    $email = $rows['email'];
                                    

                                    //Display the values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $Sn++; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td>
                                            <a href="update_password.php?adminID=<?php echo $adminID; ?>" class="btn-primary">Change Password</a>
                                            <a href="update_admin.php?adminID=<?php echo $adminID; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="delete_admin.php?adminID=<?php echo $adminID; ?>" class="btn-danger">Delete Admin</a>

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