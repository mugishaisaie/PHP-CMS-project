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
    <title>Report Status</title>
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
            padding-top: 1rem;
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
            <li><a href="products/product.php">Products</a></li>
            <li><a href="orders/order.php">Orders</a></li>
            <li><a href="customers/customer.php">Customers</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <form action="" method="post">

            <h2>Beauty WareHouse Report Stutus</h2>
            <p>View All the Events Of your Customers With Their Orders</p>

            <div class="form">
                <label for=""> Date From</label>
                <input type="date" name="s_date" required>
            </div>
            <div class="form">
                <label for=""> Date To </label>
                <input type="date" name="e_date" required>
            </div>
            <button type="submit" name="report">View Events</button>
        </form>

        <?php
        include"connection.php";
        if(isset($_POST['report'])){
            $s_date=$_POST['s_date'];
            $e_date=$_POST['e_date'];

            $report= mysqli_query($conn,"SELECT * FROM customer INNER JOIN orders ON customer.order_number= orders.order_number WHERE orders.order_date BETWEEN '$s_date' AND '$e_date'");

           
                ?>
                
        <div class="table">
            <table>
                <tr>

                    <th>Customer Id</th>
                    <th>Product Code</th>
                    <th>Order Number</th>
                    <th>Ordered Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Location</th>
                    <th>Telephone</th>
                </tr>

                <?php
                 if(mysqli_num_rows($report)>0){
                while($fetch= mysqli_fetch_assoc($report)){
                    $cusId= $fetch['cusId'];
                    $productcode= $fetch['productcode'];
                    $order_number= $fetch['order_number'];
                    $order_date= $fetch['order_date'];
                    $fname= $fetch['fname'];
                    $lname= $fetch['lname'];
                    $location= $fetch['location'];
                    $telephone= $fetch['telephone'];
                    echo"
                    <tr>
                        <td>$cusId</td>
                        <td>$productcode</td>
                        <td>$order_number</td>
                        <td>$order_date</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$location</td>
                        <td>$telephone</td>
                    
                    </tr>
                    
                    ";
                }
                
                ?>
            </table>
            <?php


            }
        }
        ?>

                <?php
                
                ?>
            </table>
        </div>
    </div>
</body>
</html>