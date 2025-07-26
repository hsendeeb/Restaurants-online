<?php
include "../connect.php";
include "../functions/common_functions.php";
if(isset($_GET['deliveryManId'])){
    $deliveryManid=$_GET['deliveryManId'];
  
    $result=selectAllFromWhere("deliveryman","deliveryManId",$deliveryManid);
    $row=mysqli_fetch_assoc($result);
    $username=$row['username'];
    $insert="insert into blocklist(blockedName) values('$username')";
    $resultInsert=mysqli_query($con,$insert);
    if($resultInsert){
        header("location:deliveryMan.php");
    } else {
        echo "error";
    }

}

?>