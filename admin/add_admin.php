<?php
    include('part/manu.php');
?>
<?php
    include('connection.php');
?>
        <div class="main_content">
            <div class="wrapper">
                <h1>Add Admin</h1>
                <br/><br/><br/>
                <?php
                    if (isset($_SESSION['add'])) //Checking whether the session is set of Not
                    {
                        echo $_SESSION['add'];//Display the session message if set
                        unset($_SESSION['add']);//Remove session Message
                    }

                ?>
                <form  method="POST">
                    <table class="tbl-30">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" placeholder="Enter Your Name"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Your Email" >
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" name="password" placeholder="Enter Your password" >
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add admin" class="btn-secondary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<?php include('part/footer.php'); ?>

<?php
    // Check if the form is submitted
    if(isset($_POST['submit']))
     {
        //1.Get the data from form
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password=$_POST['password'];

       //2. SQL query to save the data into database
        $sql = "INSERT INTO admin SET
            name='$name',
            email='$email',
            password='$password'";
        
        //3.Excuting Query and Saving data into database
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        //4.check whether the (query is Executed) data is inserted or not and display masseage
        if ($res==TRUE) {
            //data inserted
            //echo "Data Inserted";
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            //redirect page
            header("location: http://localhost/rest/admin/manage_admin.php");
        } else {
            //echo "Failed to Insert Data";
            $_SESSION['add'] = "Added Failed";
            //redirect page
            header("location: http://localhost/rest/admin/add_admin.php");

        }
    }
?>
