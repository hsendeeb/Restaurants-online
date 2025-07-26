<?php
include "../connect.php";
include "../functions/common_functions.php";
if(isset($_GET['deliveryManId'])){
    $deliveryManid=$_GET['deliveryManId'];
    $selectResult=selectAllFromWhere("deliveryman","deliveryManId",$deliveryManid);
    $row=mysqli_fetch_assoc($selectResult);
    $username=$row['username'];
    $delete=deleteFrom("blocklist","blockedName",$username);
    if($delete){
        header("location:deliveryMan.php");
    } else {
        echo "error";
    }
}

?>