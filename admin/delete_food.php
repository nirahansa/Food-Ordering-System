<?php
    
    include('connection.php');
    

    if(isset($_GET["itemID"])) 
     {
        $itemID=$_GET["itemID"];
        $itemName=$_GET["itemName"];

        if($imageName!= "") {
            $path = "image/food/".$itemName;
            $remove = unlink($path);
            if($remove == FALSE) {
                $_SESSION['delete'] = "<div class='error'>Failed to remove</div>";
                header("location: http://localhost/rest/admin/manage_food.php");
                
            }
        }

        $sql = "DELETE FROM food WHERE itemID=$itemID";
        $res = mysqli_query($conn,$sql);

        if($res == TRUE) {
            $_SESSION['delete'] = "<div class='success'>Food Delete Successfully</div>";
            header("location: http://localhost/rest/admin/manage_food.php");
            
        } else {
            $_SESSION['delete'] = "<div class='error'>Food Delete Failed</div>";
            header("location: http://localhost/rest/admin/manage_food.php");
            
        }
    } 
    else 
    {
        $_SESSION['undelete'] = "<div class='error'>Unauthorized Access.</div>";
        header("location: http://localhost/rest/admin/manage_food.php");
        
    }
?>
