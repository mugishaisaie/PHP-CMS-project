<?php
include '../connection.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_pro = mysqli_query($conn,"DELETE FROM orders WHERE order_number= '$id'");

    if($delete_pro){
        echo"<script>alert('Wow Product Updated SuccessFully')</script>";
        header("location:order.php");
    }else{
        echo"<strong>FAiled Try Again</strong>";
    }
   
}
?>