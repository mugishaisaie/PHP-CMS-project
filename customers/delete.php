<?php
include '../connection.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_pro = mysqli_query($conn,"DELETE FROM customer WHERE cusId= '$id'");

    if($delete_pro){
        echo"<script>alert('Wow Product Updated SuccessFully')</script>";
        header("location:customer.php");
    }else{
        echo"<strong>FAiled Try Again</strong>";
    }
   
}
?>