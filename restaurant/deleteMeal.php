<?php
include "../connect.php";
if(isset($_GET['mealid']) && isset($_GET['AmenuId'])){
    $mealid=$_GET['mealid'];
    $AmenuId=$_GET['AmenuId'];
    $delete="delete from meals where mealId=$mealid";
    $result=mysqli_query($con,$delete);
    if($result){
       header("location:mymenu.php?AmenuId=$AmenuId");
    }
}

?>