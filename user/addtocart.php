<?php
include "../connect.php";
include "../functions/common_functions.php";
session_start();
if(isset($_SESSION['client'])){
$username=$_SESSION['client'];
$selectUser="select * from client where username='$username'";
$userResult=mysqli_query($con,$selectUser);  
if($userResult){
   $row=mysqli_fetch_assoc($userResult);
   $clientid=$row['clientid'];  
} 

if(isset($_GET['mealId'])){
    $mealId=$_GET['mealId'];
    $sql="select m.mealId,mn.mealname,mi.menuImage,m.mealPrice 
    from meals m
    JOIN mealname mn ON
    m.mealNid=mn.mealNid
    JOIN menuimage mi ON
    m.menuId=mi.menuId
     where m.mealId=$mealId ";
     $result=mysqli_query($con,$sql);
     if($result){
      $row=mysqli_fetch_assoc($result);
      $mealname=$row['mealname'];
      $mealPrice=$row['mealPrice'];
      $mealimage=$row['menuImage'];
      $insert="insert into cart(mealId,mealname,mealimage,mealprice,clientid)
       values($mealId,'$mealname','$mealimage',$mealPrice,$clientid)";
       $insertResult=mysqli_query($con,$insert);
       $resId=$_SESSION['resId'];
       echo $resId;
       header("location:restaurantMenu.php?resId=$resId");  
      
      
       
     }
    }
  } else {
    header("location:userLogin.php");
  }
?>