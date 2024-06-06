<?php
    include('connection.php');

    if(isset($_POST['submit']))
    {
        //Process for login

        //1.Get the Data from Login form
       
        $email = $_POST["email"];
        $password = ($_POST["password"]);

        //2.SQL to check whether the email and password exists or not
        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";

        //3.Execute the Query
        $res = mysqli_query($conn,$sql);
        //4.count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);


        if($count==1)
        {
            //User Available and login success
            $_SESSION['login']="<div>Login Successfully</div>";
            header("location: http://localhost/rest/admin/admindash.php");
        }
        else
        {
            $_SESSION['login']="<div>Login Failed</div>";
            header("location: http://localhost/rest/admin/admin.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
        <div class="login">
            <h1>Admin Login</h1>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <form class="admin" method="post" action="">
                <input type="email" name="email" placeholder="Your Email" ><br><br>
                <input type="password" name="password" placeholder="Your Password" ><br><br>
                <input type="submit" name="submit" value="login">
            </form>
        </div>
        <a href="http://localhost/rest/index.html"><img src="http://localhost/rest/image/back.png" width="40px"></a>
    </body>
</html>
