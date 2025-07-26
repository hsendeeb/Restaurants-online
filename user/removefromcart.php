<?php
 include "../connect.php";
 include "../functions/common_functions.php";
 if(isset($_SESSION['client'])){
     $username=$_SESSION['client'];
 }
  
 session_start();
 if(isset($_GET['cartid'])){
    $cartid=$_GET['cartid'];
    $username=$_SESSION['client'];
    $select="select * from client where username='$username'";
    $selectResult=mysqli_query($con,$select);
    $row=mysqli_fetch_assoc($selectResult);
    $clientid=$row['clientid'];
    $sql="delete from cart where cartid=$cartid and clientid=$clientid";
    $result=mysqli_query($con,$sql);
    if($result){
        header("location:cart.php");
    }
 }

?>