<?php
    session_start();
    $db_name = "restaurant_db";
    $connection = mysqli_connect("localhost","root","",$db_name);

    if(isset($_POST["add"])){
        if(isset($_SESSION["shopping_cart"])){
            $item_array_id = array_column($_SESSION["shopping_cart"],"itemID");
            if(!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'product_id' => $_GET["itemID"],
                    'product_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'product_quantity' => $_POST["quantity"],
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
                echo '<script>window.location="cart.php"</script>';
            }else{
                echo '<script>alert("Product is already in  the cart")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["itemID"],
                'product_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'product_quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    if(isset($_GET["action"])){
        if($_GET["action"] == "delete"){
            foreach($_SESSION["shopping_cart"] as $keys => $value){
                if($value["item"] == $_GET["id"]){
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Product has been removed")</script>';
                    echo '<script>window.location="cart.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: rgb(231, 202, 202);
        }
        .product{
            border: 1px solid #eaeaec;
            margin: 2px 2px 8px 2px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table,th,tr{
              text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
        .name1{
            text-align: center;
            margin: 10px auto;
            width: 967px;
            height: auto;
            background-color: rgb(228, 39, 39);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }



        nav{background-color: red;
            overflow: hidden;
            text-align:right;
        }
        nav ul{
            list-style: none;
            margin: 0px;
            padding: 0px;
            overflow: hidden;
            display: inline-block;
        }

        nav ul li {
            float: left;
            display: inline;
        }

        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 18px;
        }
        nav a:hover{
            color: rgb(223, 223, 235);
            text-decoration: underline;
            text-underline-position: under;
        }
        
    </style>
</head>
<body>
    <div class="name">   
            <nav>
                <ul>
                    <li><a href="home.html">Home</a></li>
                    
                    <li><a href="cart.php">Order</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                    
                    <li><a href="contactus.html">Contact Us</a></li>
                    <li><a href="user_logout.php">Logout</a></li>
                </ul>
            </nav>
    </div>
    <br>
    <div class="container" style="width: 65%">
        <h2>Order Now</h2>
        <?php
            $query = "SELECT * FROM food ORDER BY itemID DESC";

            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="col-md-3" style="float: left;">
                        <form method="post" action="cart.php?action=add&itemID=<?php echo $row["itemID"];?>">
                            <div class="product">
                            <img src="http://localhost/rest/image/food/<?php echo $row["imageURL"]; ?>" alt="<?php echo $row["itemName"]; ?>" width="80px">
                                <h5 class="text-info"><?php echo $row["itemName"];?></h5>
                                <h5 class="text-danger"><?php echo "Rs " . $row["Price"]; ?></h5>

                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["itemName"];?>">
                                <input type="hidden" name="hidden_price" value="<?php echo  $row ["Price"];?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to cart">
                            </div>
                        </form>
                    </div>
        <?php
                }
            }
        ?>

        <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart </h3>
        <div class="table-responsive">
            <table class="table table-bordered" action= "">
                <tr>
                
                    <th width="30%">Food Name</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details(Rs)</th>
                    <th width="10%">Total Price(Rs)</th>
                    <th width="17%">Remove Item</th>
            </tr>
            <?php
                if(!empty($_SESSION["shopping_cart"])){
                    $total=0;
                    foreach($_SESSION["shopping_cart"] as $key => $value){
                    ?>
                <tr>
                <tr>
                    <td><?php echo isset($value["product_name"]) ? $value["product_name"] : ""; ?></td>
                    <td><?php echo isset($value["product_quantity"]) ? $value["product_quantity"] : ""; ?></td>
                    <td><?php echo isset($value["product_price"]) ? $value["product_price"] : ""; ?></td>
                    <td><?php echo isset($value["product_quantity"]) && isset($value["product_price"]) ? number_format($value["product_quantity"] * $value["product_price"], 2) : ""; ?></td>
                    <td><a href="cart.php?action=delete&itemID=<?php echo isset($value["itemID"]) ? $value["itemID"] : ""; ?>"><span class="text-danger">Remove Item</span></a></td>
                </tr>
                </tr>
                <?php
                    
                    $total = $total + ($value["product_quantity"]*$value["product_price"]);
                    $_SESSION['total'] = $total;
                    }
                ?>
                <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right"><?php echo number_format($total,2);?></td>
                        <td><a href="checkout.php?total=<?php echo $total; ?>">Proceed to Checkout</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    
</body>
</html>
