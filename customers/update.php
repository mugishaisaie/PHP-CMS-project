<?php
        include '../connection.php';
        $id= $_GET['update'];
          if(isset($_POST['update_customer'])){
            $productcode = $_POST['productcode'];
            $order_number = $_POST['order_number'];
            $fname = $_POST['fname'];
            $lname =$_POST['lname'];
            $location =$_POST['location'];
            $telephone =$_POST['telephone'];

            $up_cus= mysqli_query($conn," UPDATE `customer` SET `productcode`='$productcode',`order_number`='$order_number',`fname`='$fname',`lname`='$lname',`location`='$location',`telephone`='$telephone' WHERE cusId='$id'");
            if($up_cus){
                echo"<script>alert('Wow Product Updated SuccessFully')</script>";
                header("location:customer.php");
            }else{
                echo"<strong>FAiled Try Again</strong>";
            }

          }
                ?>
                <?php

$display_cus= mysqli_query($conn,"SELECT `cusId`, `productcode`, `order_number`, `fname`, `lname`, `location`, `telephone` FROM `customer` WHERE cusId='$id' ");
            if(mysqli_num_rows($display_cus)> 0){
     $fetch= mysqli_fetch_assoc($display_cus);
                    $productcode= $fetch['productcode'];
                    $order_number= $fetch['order_number'];
                    $fname= $fetch['fname'];
                    $lname= $fetch['lname'];
                    $location= $fetch['location'];
                    $telephone= $fetch['telephone'];
            }
?>

<form action="" method="post">
        <h3>Welcome to Beauty Ware Houses Customers</h3>
        <p>Manage Your Your Products Here By Adding, Deleting, Updating your Customers</p>
        
        <div class="form">
            <label for="">productcode:</label>
           <select name="productcode">
            <option selected="hidden">Choose Productcode</option>
            <?php
            include '../connection.php';
            
            $sel_pcode= mysqli_query($conn,"SELECT * FROM products");
            if(mysqli_num_rows($sel_pcode)>0){
                while($fetch= mysqli_fetch_assoc($sel_pcode)){
                    ?>
                    <option value="<?php echo $fetch['productcode']?>"><?php echo $fetch['productcode']?></option>
                    <?php
                }
            }
            ?>
           </select>
        <div class="form">
            <label for="">OrderNumber:</label>
           <select name="order_number">
            <option selected="hidden">Choose OrderNumber</option>
            <?php
            
            $sel_od= mysqli_query($conn,"SELECT * FROM orders");
            if(mysqli_num_rows($sel_od)>0){
                while($fetch= mysqli_fetch_assoc($sel_od)){
                    ?>
                    <option value="<?php echo $fetch['order_number']?>"><?php echo $fetch['order_number']?></option>
                    <?php
                }
            }
            ?>
           </select>
        </div>
        
        <div class="form">
            <label for="">First Name:</label>
          <input type="text" name="fname" value="<?php echo $fname?>">
        </div>
        <div class="form">
            <label for="">Last Name:</label>
            <input type="text" name="lname" value="<?php echo $lname?>">
        </div>
        <div class="form">
            <label for="">location:</label>
            <input type="text" name="location" value="<?php echo $location?>">
        </div>
        <div class="form">
            <label for="">telephone:</label>
            <input type="number" name="telephone" value="<?php echo $telephone?>">
        </div>
        <button type="submit" name="update_customer">Update Customer</button>

    </form>