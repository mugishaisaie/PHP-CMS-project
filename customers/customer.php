<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            width: 100%;
            height: 100vh;
            font-family: sans-serif;
            margin: 0 auto;
            background-color: #edd8f2;
        }
        nav{
            width: 100%;
            height: 4rem;
            background-color: #4a4ac0;
            padding-top: .7rem;
        }
        nav ul{
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 1rem 2rem;
        }
        nav ul li {
            list-style: none;
            font-weight: bold;
            text-transform: capitalize;
            padding: 9px 18px;
        }
        nav ul li a {
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: capitalize;
            color: #fff;
            margin: 1rem 2rem;
            padding: 9px 18px;
        }

        p{
            margin: .4rem 1rem;
            font-size: 1.3rem;
            text-transform: capitalize
        }

        form{
            width: 70vw;
            margin: 1rem 2rem; 
        }
       select, input{
            padding: .4rem 1rem;
            margin: 1rem;
            border: none;
            border-radius: 7px;
        }

        h2{
            text-align: center;
            text-transform: capitalize;
            font-size: 1.3rem;
            margin: 1rem;
        }
        button{
            padding: 9px 18px;
            font-size: 1.4rem;
            font-weight: bold;
            color: #fff;
            background-color: #4a4ac0;
            border: none;
            border-radius: 9px;
            margin: 2rem;
            cursor: pointer;
        }

        .container{
            display: flex;
        }

        table{
            width: 40%;
            height: fit-content;
        }
        table td, table th {
                    border: 1px solid #ddd;
                    padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4a4ac0;
  color: white;
}
     
        
    </style>

</head>
<body>
<nav>
        <ul>
            <li><a href="../products/product.php">Products</a></li>
            <li><a href="../orders/order.php">Orders</a></li>
            <li><a href="customer.php">Customers</a></li>
            <li><a href="../report.php">report</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

<div class="container">
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
          <input type="text" name="fname">
        </div>
        <div class="form">
            <label for="">Last Name:</label>
            <input type="text" name="lname">
        </div>
        <div class="form">
            <label for="">location:</label>
            <input type="text" name="location">
        </div>
        <div class="form">
            <label for="">telephone:</label>
            <input type="number" name="telephone">
        </div>
        <button type="submit" name="add_customer">Add Customer</button>
        <?php
        
          if(isset($_POST['add_customer'])){
            $productcode = $_POST['productcode'];
            $order_number = $_POST['order_number'];
            $fname = $_POST['fname'];
            $lname =$_POST['lname'];
            $location =$_POST['location'];
            $telephone =$_POST['telephone'];

            $ins_cus= mysqli_query($conn,"INSERT INTO `customer`(`productcode`, `order_number`, `fname`, `lname`, `location`, `telephone`) VALUES('$productcode','$order_number','$fname','$lname','$location','$telephone')");
            if($ins_cus){
                echo"<script>alert('Wow Customer Added SuccessFully')</script>";
            }else{
                echo"<strong>FAiled Try Again</strong>";
            }

          }
                ?>

    </form>

    <div class="table">
        <h2>Customers Table List</h2>
        <table>
            <tr>
                <th>Customer Id</th>
                <th>productcode</th>
                <th>order_number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Location</th>
                <th>Telephone</th>
                <th>Operations</th>
            </tr>

            <?php
            $display_pro= mysqli_query($conn,"SELECT `cusId`, `productcode`, `order_number`, `fname`, `lname`, `location`, `telephone` FROM `customer`");
            if(mysqli_num_rows($display_pro)> 0){
                while($fetch= mysqli_fetch_assoc($display_pro)){
                    $cusId= $fetch['cusId'];
                    $productcode= $fetch['productcode'];
                    $order_number= $fetch['order_number'];
                    $fname= $fetch['fname'];
                    $lname= $fetch['lname'];
                    $location= $fetch['location'];
                    $telephone= $fetch['telephone'];

                    echo"
                    <tr>
                        <td>$cusId</td>
                        <td>$productcode</td>
                        <td>$order_number</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$location</td>
                        <td>$telephone</td>
                        <td>
                        <a href='update.php?update=$cusId'>Update</a>
                        <a href='delete.php?delete=$cusId'>Delete</a>
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