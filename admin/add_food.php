<?php
    include('part/manu.php');
    include('connection.php');
?>

<div class="main_content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <?php
            if(isset($_POST['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Item Name</td>
                    <td><input type="text" name="itemName" placeholder="Item Name"/></td><br><br>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="" cols="30" rows="10"></textarea></td><br><br>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" /></td><br><br>
                </tr>
                <tr>
                    <td>Image URL</td>
                    <td><input type="file" name="imageURL"></td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            if (isset($_POST['submit'])) {
                $itemName = $_POST["itemName"];
                $description = $_POST["description"];
                $price = $_POST["price"];
                $featured = isset($_POST['featured']) ? $_POST['featured'] : 'no';

                // Upload the image if selected
                if(isset($_FILES["imageURL"]['name'])) {
                    $image_name = $_FILES["imageURL"]['name'];
                    if($image_name != "") {
                        $ext = pathinfo($image_name, PATHINFO_EXTENSION);
                        $image_new_name = "Food-Name" . rand(0000,9999) . "." . $ext;
                        $src = $_FILES["imageURL"]['tmp_name'];
                        $dst = "../image/".$itemName;
                        $upload = move_uploaded_file($src, $dst);
                        if($upload == FALSE) {
                            $_SESSION['upload']="<div class='error'>Failed to upload Image</div>";
                            header("location: http://localhost/rest/admin/add_food.php");
                            die();
                        }
                    }
                } 
                else 
                {
                    $image_name = "";
                }

                // Insert into database
                $sql = "INSERT INTO food SET
                        itemName='$itemName',
                        description='$description',
                        price='$price',
                        imageURL='$image_name',
                        featured='$featured'";
                $res2 = mysqli_query($conn, $sql);

                if($res2 == TRUE) {
                    $_SESSION['add']="<div class='success'>Food Added Successfully</div>";
                    header("location: http://localhost/rest/admin/manage_food.php");
                } else {
                    $_SESSION['add']="<div class='error'>Food Added Failed</div>";
                    header("location: http://localhost/rest/admin/manage_food.php");
                }
            }
        ?>
    </div>
</div>

<?php 
    include('part/footer.php');
?>  
