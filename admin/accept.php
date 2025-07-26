<?php



include "../connect.php";
include "../functions/common_functions.php";
if(isset($_GET['menuId'])){
    $menuId=$_GET['menuId'];
    $sql="select * from proposedmenu where menuId=$menuId";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $menuName=$row['proposedTitle'];
    $insert="insert into activemenu(menuName) values('$menuName')";
    $insertResult=mysqli_query($con,$insert);
    $selectMenu="select * from activemenu where menuName='$menuName'";
    $selectMenuResult=mysqli_query($con,$selectMenu);
    $row=mysqli_fetch_assoc($selectMenuResult);
    $Amenuid=$row['AmenuId'];

    if($insertResult){
        $update="update meals set Amenuid=$Amenuid where Pmenuid=$menuId";
        $updateResult=mysqli_query($con,$update);
        if($updateResult){
            deleteFrom("proposedmenu","menuId",$menuId);
            header("location:menuRequest.php");
        }
  
        
    }
}
?>