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
    <title>Orders Page</title>
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
            padding-top: .6rem;
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
            
            margin: 1rem 2rem; 
        }
        input{
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
            display: grid;
            grid-template-columns: repeat(2,1fr);
        }

        table{
            width: 600px;
            margin: 2rem;
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
            <li><a href="order.php">Orders</a></li>
            <li><a href="../customers/customer.php">Customers</a></li>
            <li><a href="../report.php">report</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

<div class="container">
    <form action="" method="post">
        <h3>Welcome to Beaty Ware Houses Orders Page</h3>
        <p>Manage Your Orders Products Here By Adding, Deleting, Updating your Products</p>
        
        <div class="form">
            <label for="">order_number:</label>
            <input type="number" name="order_number">
        </div>
        <div class="form">
            <label for="">order_date:</label>
            <input type="date" name="order_date">
        </div>
        
        <button type="submit" name="order">order_now</button>
        <?php
        include '../connection.php';
          if(isset($_POST['order'])){
            $order_number = $_POST['order_number'];
            $order_date = $_POST['order_date'];
           
            $ins_order= mysqli_query($conn," INSERT INTO `orders`(`order_number`, `order_date`) VALUES ('$order_number',' $order_date')");
            if($ins_order){
                echo"<script>alert('Wow Product Added SuccessFully')</script>";
            }else{
                echo"<strong>FAiled Try Again</strong>";
            }

          }
                ?>

    </form>

    <div class="table">
        <h2>Orders Lists</h2>
        <table>
            <tr>
                <th>Order Number</th>
                <th>Order Date</th>
                <th>Operations</th>
            </tr>

            <?php
            $display_pro= mysqli_query($conn," SELECT * FROM `orders`");
            if(mysqli_num_rows($display_pro)> 0){
                while($fetch= mysqli_fetch_assoc($display_pro)){
                    $order_number= $fetch['order_number'];
                    $order_date= $fetch['order_date'];

                    echo"
                    <tr>
                        <td>$order_number</td>
                        <td>$order_date</td>
                        <td>
                        <a href='update.php?update=$order_number'>Update</a>
                        <a href='delete.php?delete=$order_number'>Delete</a>
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