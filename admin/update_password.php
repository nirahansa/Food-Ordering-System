<?php
    include('part/manu.php');
?>
<?php
    include('connection.php');
?>
<div class="main_content">
    <div class="wrapper">
        <h1>Change Password</h1><br><br>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Old Password :</td>
                    <td>
                        <input type="passwoword" name="old_password" placeholder="Old password">
                    </td>
                </tr>
                <tr>
                    <td>New Password :</td>
                    <td>
                        <input type="passwoword" name="new_password" placeholder="New password">
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td>
                        <input type="passwoword" name="confirm_password" placeholder="Confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="adminID" value="<?php echo $adminID; ?>">
                        <input type="submit" name="submit" value="Update Password" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<?php
    //check whether the sumbit button is clicked on  not
    if (isset($_POST['submit'])) {
        //echo "clicked";

        //1.Get the data from form
        $adminID=$_POST["adminID"];
        $old_password=$_POST['old_password'];
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);


        //2.Check whether the user with current ID and old password Exists or not
        $sql = "SELECT * FROM admin WHERE adminID='$adminID' AND password='$old_password'";

        //Execute the Query 
        $res = mysqli_query($conn,$sql);
        if($res==TRUE)
        {
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                //User Exists and password can be change
                //echo "User is find";
                //check whether the new  pw and confirm pw match or not
                if($new_password==$confirm_password)
                {
                    //echo "Password is similar";
                    $sql2 ="UPDATE admin SET
                        password='new_password'
                        WHERE adminID='$adminID'";

                    $res2 = mysqli_query($conn,$sql2);

                    if($res2==TRUE)
                    {
                        $_SESSION['change_password']="<div class='success'>Password correct</div>";
                        header("location: http://localhost/rest/admin/manage_admin.php"); 
                    }
                    else
                    {
                        //Display check
                        $_SESSION['change_password']="<div class='error'>Password incorrect</div>";
                        header("location: http://localhost/rest/admin/manage_admin.php"); 
                    }
                }else{
                    $_SESSION['pwd-not-match']="<div class='error'>Password not</div>";
                    header("location: http://localhost/rest/admin/manage_admin.php");
                }
            }
            else
            {
                $_SESSION['user-not-found']="<div class='error'>Admin Not Found</div>";
                header("location: http://localhost/rest/admin/manage_admin.php");
            }
        }
        //3.check whether the new password
    }
?>




<?php
    include('part/footer.php');
?>