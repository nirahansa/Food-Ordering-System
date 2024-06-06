<?php
    include('part/manu.php');
?>
<?php
    include('connection.php');
?>
<div class="main_content">
    <div class="wrapper">
        <h1>Update Admin</h1><Br></Br>

        <?php
            
            //1.Get the ID of Selected  Admin
            // Sanitize the adminID input to prevent SQL injection
            $adminID =  $_GET['adminID'];

            // Construct the SQL query with proper escaping and single quotes around $adminID
            $sql = "SELECT * FROM admin WHERE adminID='$adminID'";

            // Execute the Query
            $res = mysqli_query($conn, $sql);


            //check whether the query is executed or not
            if ($res==TRUE) 
            {
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    //Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);
                    $name=$row['name'];
                    $email=$row['email'];

                }
                else
                {
                    //redirect to Manage Admin Page
                    header("location: http://localhost/rest/admin/manage_admin.php");
                }
            }

        ?>
        <form action="" method="post">
            
            <table class="tbl-30">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="email" value="<?php echo $email; ?>" >
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="adminID" value="<?php echo $adminID; ?>">
                                <input type="submit" name="submit" value="Update" class="btn-secondary">
                            </td>
                        </tr>
            </table>
        </form>
    </div>
</div>
<?php
    if(isset($_POST["submit"]))
    {
        //echo "button Clicked"; 
        echo $adminID = $_POST['adminID'];
        echo $name = $_POST['name'];
        echo $email = $_POST['email']; 

        //create a sql Query to update admin
        $sql = "UPDATE admin SET
        name ='$name',
        email = '$email' WHERE adminID='$adminID'";

        //Execute the query
        $res =mysqli_query($conn,$sql);

        if($res==TRUE)
        {
            //Query Executed and admin update
            $_SESSION['upadte']= "<div class='success'>Admin Update Successfully.</div>";
            header("location: http://localhost/rest/admin/manage_admin.php");
        }
        else
        {
            $_SESSION['upadte']= "<div class='error'>Admin Update Failed.</div>";
            header("location: http://localhost/rest/admin/manage_admin.php");
        }
    }

?>


<?php
    include('part/footer.php');
?>