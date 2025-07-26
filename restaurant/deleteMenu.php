<?php
include "../connect.php";
if(isset($_GET['deleteAMenu'])){
    $AmenuId=$_GET['deleteAMenu'];
    $delete="delete from activemenu where AmenuId=$AmenuId";
    $result=mysqli_query($con,$delete);
    if($result){
        header("location:menues.php");
    }
}
if(isset($_GET['deletePMenu'])){
    $PmenuId=$_GET['deletePMenu'];
    $delete="delete from proposedmenu where menuId=$PmenuId";
    $result=mysqli_query($con,$delete);
    if($result){
        header("location:menues.php");
    }
}

?>