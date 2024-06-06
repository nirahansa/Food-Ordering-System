<?php
    include('part/manu.php');
    include('connection.php');

    if(isset($_GET["itemID"])) {
        $itemID = $_GET["itemID"];

        $sql = "SELECT * FROM food WHERE itemID='$itemID'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $itemName = $row['itemName'];
            $description = $row['description'];
            $price = $row['Price'];
            $current_image = $row['imageURL'];
            $featured = $row['featured'];
        } else {
            header("location: http://localhost/rest/admin/manage_food.php");
            exit();
        }
    } else {
        header("location: http://localhost/rest/admin/manage_food.php");
        exit();
    }
?>

<div class="main_content">
    <div class="wrapper">
        <h1>Update Food</h1><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="itemID" value="<?php echo $itemID; ?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
            <table class="tbl-30">
                <tr>
                    <td>Item Name</td>
                    <td><input type="text" name="itemName" value="<?php echo $itemName;?>"/></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="30" rows="10"><?php echo $description; ?></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" value="<?php echo $price; ?>"/></td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php
                            if($current_image == "") {
                                echo "<div class='error'>Image not available</div>";
                            } else {
                        ?>
                        <img src="http://localhost/rest/image/food/<?php echo $current_image; ?>" alt="<?php echo $itemName; ?>" width="80px">
                        <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Image URL</td>
                    <td><input type="file" name="imageURL"></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured == "yes") { echo "checked"; } ?> type="radio" name="featured" value="yes">Yes
                        <input <?php if($featured == "no") { echo "checked"; } ?> type="radio" name="featured" value="no">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Food">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST["submit"])) {
                $itemID = $_POST["itemID"];
                $itemName = $_POST['itemName'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];

                if(isset($_FILES["	imageURL"]['name'])) {
                    $image_name = $_FILES["	imageURL"]['name'];
                    if($image_name != "") {
                        $ext = end(explode(".", $image_name));
                        $image_name = "itemName" . rand(0000, 9999) . "." . $ext;
                        $src_path = $_FILES["	imageURL"]['tmp_name'];
                        $dest_path = "../image/food/" . $image_name;

                        $upload = move_uploaded_file($src_path, $dest_path);
                        if(!$upload) {
                            $_SESSION['upload'] = "<div class='error'>Failed to upload file</div>";
                            header("location: http://localhost/rest/admin/manage_food.php");
                            exit();
                        }
                        if($current_image != "") {
                            $remove_path = "../image/" . $current_image;
                            $remove = unlink($remove_path);

                            if (!$remove) {
                                $_SESSION['remove_failed'] = "<div class='error'>Failed</div>";
                                header("location: http://localhost/rest/admin/manage_food.php");
                                exit();
                            }
                        }
                    }
                } else {
                    $image_name = $current_image;
                }

                $sql3 = "UPDATE food SET
                    itemName='$itemName',
                    description='$description',
                    Price='$price',
                    imageURL='$image_name',
                    featured='$featured'
                    WHERE itemID='$itemID'";

                $res3 = mysqli_query($conn, $sql3);

                if($res3) {
                    $_SESSION['update'] = "<div class='success'>Food updated successfully</div>";
                    header("location: http://localhost/rest/admin/manage_food.php");
                    exit();
                } else {
                    $_SESSION['update'] = "<div class='error'>Food update failed</div>";
                    header("location: http://localhost/rest/admin/manage_food.php");
                    exit();
                }
            }
        ?>
    </div>
</div>
<?php
    include('part/footer.php');
?> 
