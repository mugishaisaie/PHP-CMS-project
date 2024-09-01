<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
session_destroy();
session_unset();
header("location:login.php");


?>