<?php
        include '../connection.php';
        $id= $_GET['update'];
          if(isset($_POST['update_order'])){
            $order_number = $_POST['order_number'];
            $order_date = $_POST['order_date'];

            $up_cus= mysqli_query($conn," UPDATE `orders` SET `order_number`='$order_number',`order_date`='$order_date' WHERE order_number='$id' ");
            if($up_cus){
                echo"<script>alert('Wow Product Updated SuccessFully')</script>";
                header("location:order.php");
            }else{
                echo"<strong>FAiled Try Again</strong>";
            }

          }
                ?>
                <?php

    $display_od= mysqli_query($conn," SELECT * FROM `orders`");
if(mysqli_num_rows($display_od)> 0){
    $fetch= mysqli_fetch_assoc($display_od);
        $order_number= $fetch['order_number'];
        $order_date= $fetch['order_date'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Page</title>

</head>
<body>

<div class="container">
    <form action="" method="post">
        <h3>Update Order</h3>
        <p>Manage Your Orders Products Here By Adding, Deleting, Updating your Products</p>
        
        <div class="form">
            <label for="">order_number:</label>
            <input type="number" name="order_number" value="<?php echo $order_number?>">
        </div>
        <div class="form">
            <label for="">order_date:</label>
            <input type="date" name="order_date" value="<?php echo $order_date?>">
        </div>
        
        <button type="submit" name="update_order">update_order</button>

    </form>

       
    </div>
</div>
    
</body>
</html>