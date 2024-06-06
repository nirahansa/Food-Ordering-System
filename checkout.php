<?php
    $conn = mysqli_connect('localhost','root','','restaurant_db') or die('connection failed');

    if(isset($_POST['order_btn'])){
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $method = $_POST['method'];
        $address = $_POST['address'];

        // Retrieve the total from URL parameter
        $total = isset($_GET['total']) ? $_GET['total'] : 0;

        $detail_query = mysqli_query($conn, "INSERT INTO `orders` (`u_name`, `u_number`, `u_email`, `U_address`, `total`, `method`) VALUES ('$name', '$number', '$email', '$address', '$total', '$method')") or die('query failed');

        if($detail_query){
            echo "
            <div class='order-message-container'>
                <div class='message-container'>
                    <h3>thank you for shopping!</h3>
                    <div class='order-detail'>
                        <span>Product Name</span>
                        <span class='total'> Total : Rs" . number_format($total, 2) . "</span>
                    </div>
                    <div class='customer-details'>
                        <p> Your Name : <span>".$name."</span> </p>
                        <p> Your Number : <span>".$number."</span> </p>
                        <p> Your Email : <span>".$email."</span> </p>
                        <p> Your Payment Mode : <span>".$method."</span> </p>
                        <p>(*Pay when product arrives*)</p>
                    </div>
                    <a href='cart.php' class='btn'>Continue Shopping</a>
                </div>
            </div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <style>
        body{
            background-color: rgb(231, 202, 202);
        }
    </style>
</head>
<body>
    <div class="container">
        <section class="checkout-form">
            <h1 class="heading">Complete Your Order</h1>
            <form action="" method="post">
                <div class="display-order">
                    <?php
                        // Retrieve the total from URL parameter
                        $total = isset($_GET['total']) ? $_GET['total'] : 0;
                        echo '<span class="grand-total">Grand Total: Rs' . number_format($total, 2) . '</span><br><br>';
                    ?>
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Your Name</span>
                        <input type="text" placeholder="Enter your name" name="name"  id="inputId"required><br><br>
                    </div>
                    <div class="inputBox">
                        <span>Your Number</span>
                        <input type="number" placeholder="Enter your number" name="number" required><br><br>
                    </div>
                    <div class="inputBox">
                        <span>Your Email</span>
                        <input type="email" placeholder="Enter your email" name="email" required><br><br>
                    </div>
                    <div class="inputBox">
                        <span>Payment Method</span>
                        <select name="method">
                           <option value="cash on delivery" selected>Cash on Delivery</option>
                           <option value="credit card">Credit Card</option>
                           <option value="paypal">Paypal</option>
                        </select>
                    </div><br><br>
                    <div class="inputBox">
                        <span>Address</span>
                        <input type="text" placeholder="E.g. flat no." name="address" required><br><br>
                    </div>
                </div>
                <input type="submit" value="Order Now" name="order_btn" class="btn" onclick="submitForm()">
            </form>
        </section>
    </div>
    <script src="button.js"></script>
</body>
</html>
