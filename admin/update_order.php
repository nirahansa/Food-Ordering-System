<?php
    include('part/manu.php');
    include('connection.php');

    // Initialize variables to avoid undefined errors
    $u_name = "";
    $u_number = "";
    $email = "";
    $address = "";
    $total = "";
    $method = "";
    $status = "";

    if(isset($_GET["orderID"])) {
        $orderID = $_GET["orderID"];

        $sql = "SELECT * FROM orders WHERE orderID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $orderID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $u_name = $row['u_name'];
            $u_number = $row['u_number'];
            $email = $row['u_email'];
            $address = $row['u_address'];
            $total = $row['total'];
            $method = $row['method'];
        } else {
            header("location: http://localhost/rest/admin/manage_order.php");
            exit();
        }
    } else {
        header("location: http://localhost/rest/admin/manage_order.php");
        exit();
    }
?>

<div class="main_content">
    <div class="wrapper">
        <h1>Update Order</h1><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="orderID" value="<?php echo $orderID; ?>">
            <table class="tbl-30">
                <tr>
                    <td>U_Name</td>
                    <td><input type="text" name="u_name" value="<?php echo $u_name; ?>"></td>
                </tr>
                <tr>
                    <td>U_Number</td>
                    <td><input type="number"  name="u_number" value="<?php echo $u_number; ?>" ></td>
                </tr>
                <tr>
                    <td>U_Email</td>
                    <td><input type="email"  name="u_email" value="<?php echo $email; ?>" ></td>
                </tr>
                <tr>
                    <td>U_Address</td>
                    <td><input type="text" name="u_address" value="<?php echo $address; ?>"></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><input type="number" name="total" value="<?php echo $total; ?>"/></td>
                </tr>
                <tr>
                    <td><span>Payment Method</span></td>
                    <td>
                        <select name="method">
                            <option value="cash on delivery" <?php if($method == "cash on delivery") echo "selected"; ?>>Cash on Delivery</option>
                            <option value="credit cart" <?php if($method == "credit cart") echo "selected"; ?>>Credit Card</option>
                            <option value="paypal" <?php if($method == "paypal") echo "selected"; ?>>Paypal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span>Status</span></td>
                    <td>
                        <select name="status">
                            <option value="Status" selected>Status</option>
                            <option value="Pending">Pending</option>
                            
                            <option value="Ordered">Ordered</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Order">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST["submit"])) {
                $orderID = $_POST["orderID"];
                $u_name = $_POST['u_name'];
                $u_number = $_POST['u_number'];
                $email = $_POST['u_email'];
                $address = $_POST['u_address'];
                $total = $_POST['total'];
                $method = $_POST['method'];
                $status = $_POST['status'];

                $sql3 = "UPDATE orders SET
                            u_name='$u_name',
                            u_number='$u_number',
                            u_email='$email', 
                            u_address='$address',
                            total='$total',
                            method='$method',
                            status='$status'
                            WHERE orderID=?";
                
                $stmt3 = mysqli_prepare($conn, $sql3);
                mysqli_stmt_bind_param($stmt3, "i", $orderID);
                $res3 = mysqli_stmt_execute($stmt3);

                if($res3) {
                    $_SESSION['update'] = "<div class='success'>Order updated successfully</div>";
                    header("location: http://localhost/rest/admin/manage_order.php");
                    exit();
                } else {
                    $_SESSION['update'] = "<div class='error'>Order update failed</div>";
                    header("location: http://localhost/rest/admin/manage_order.php");
                    exit();
                }
            }
        ?>
    </div>
</div>

<?php
    include('part/footer.php');
?>
