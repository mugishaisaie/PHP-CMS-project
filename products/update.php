<?php
        include '../connection.php';
        $id= $_GET['update'];
          if(isset($_POST['add_product'])){
            $productname = $_POST['productname'];
            $product_quantity = $_POST['product_quantity'];
            $unit_price = $_POST['unit_price'];
            $total_price =$product_quantity * $unit_price;

            $up_prod= mysqli_query($conn," UPDATE `products` SET `productname`='$productname',`product_quantity`='$product_quantity',`unit_price`='$unit_price',`total_price`='$total_price'  WHERE productcode='$id'");
            if($up_prod){
                echo"<script>alert('Wow Product Updated SuccessFully')</script>";
                header("location:product.php");
            }else{
                echo"<strong>FAiled Try Again</strong>";
            }

          }
                ?>
                <?php

$display_pro= mysqli_query($conn,"SELECT `productcode`, `productname`, `product_quantity`, `unit_price`, `total_price` FROM `products`");
            if(mysqli_num_rows($display_pro)> 0){
     $fetch= mysqli_fetch_assoc($display_pro);
     $productcode= $fetch['productcode'];
     $productname= $fetch['productname'];
     $product_quantity= $fetch['product_quantity'];
     $unit_price= $fetch['unit_price'];
     $total_price= $fetch['total_price'];
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products Page</title>

</head>
<body>

<div class="container">
    <form action="" method="post">
        <h3>Update Products</h3>
        
        <div class="form">
            <label for="">productname:</label>
            <input type="text" name="productname" value="<?php echo $productname ?>">
        </div>
        <div class="form">
            <label for="">product_quantity:</label>
            <input type="number" name="product_quantity" value="<?php echo $product_quantity ?>">
        </div>
        <div class="form">
            <label for="">unit_price:</label>
            <input type="number" name="unit_price" value="<?php echo $unit_price ?>">
        </div>
        <button type="submit" name="add_product">add_product</button>
       
    </form>

    <div class="table">
        <table>
            <tr>
                <th>productcode</th>
                <th>productname</th>
                <th>product_quantity</th>
                <th>unit_price</th>
                <th>total_price</th>
                <th>Operation</th>
            </tr>

            <?php
            $display_pro= mysqli_query($conn,"SELECT `productcode`, `productname`, `product_quantity`, `unit_price`, `total_price` FROM `products`");
            if(mysqli_num_rows($display_pro)> 0){
                while($fetch= mysqli_fetch_assoc($display_pro)){
                    $productcode= $fetch['productcode'];
                    $productname= $fetch['productname'];
                    $product_quantity= $fetch['product_quantity'];
                    $unit_price= $fetch['unit_price'];
                    $total_price= $fetch['total_price'];

                    echo"
                    <tr>
                        <td>$productcode</td>
                        <td>$productname</td>
                        <td>$product_quantity</td>
                        <td>$unit_price</td>
                        <td>$total_price</td>
                        <td>
                        <a href='update.php?update=$productcode'>Update</a>
                        <a href='delete.php?delete=$productcode'>Delete</a>
                        </td>
                    </tr>
                    
                    ";
                }
            }
            
            ?>
        </table>
        

       
    </div>
</div>
    
</body>
</html>