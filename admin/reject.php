<?php
include "../connect.php";
include "../functions/common_functions.php";
session_start();
if(isset($_GET['menuId'])){
    $menuId=$_GET['menuId'];
    $_SESSION['rejected']=$menuId;
    
    header("location:menuRequest.php");
}

?>