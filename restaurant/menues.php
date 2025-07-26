<?php
include "../connect.php";


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>menues</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
  <body>
    <?php include "components/header.php" ?>
    <div class="container-fluid mt-5">
        <h1 class="text-center">menues  <span class="text-primary p-3"><i class="fa-solid fa-user-group"></i></span></h1>
        <hr class="w-75 mx-auto border border-2 border-primary">
  
  <?php
  $resId=$_SESSION['resId'];
  echo $resId;

$sql="select a.AmenuId,r.resId,menuName from activemenu a,meals m,restaurant r
 where a.AmenuId=m.AmenuId 
 and m.resId=r.resId and r.resId=$resId 
 GROUP BY a.AmenuId";

 

$result=mysqli_query($con,$sql);

if($result && mysqli_num_rows($result)>0){
  
    while($row=mysqli_fetch_assoc($result)){
        $AmenuId=$row['AmenuId'];
        $Amenuname=$row['menuName'];
       
        echo '
                <div class="col-lg-4 mb-3  mx-auto">
                 <div class="card bg-body-tertiary shadow " ">
  <div class="card-body  text-center" >
    <h1 class="text-center fw-bolder ">'.$Amenuname.'</h1>
<a class="btn btn-primary mt-3  mx-3" href="mymenu.php?AmenuId='.$AmenuId.'">modify</a>
<a class="btn btn-outline-danger mt-3  mx-3" href="deleteMenu.php?deleteAMenu='.$AmenuId.'">delete</a>
<p class="text-center w-25 mx-auto mt-3 text-bg-success border p-1 rounded rounded-pill">active</p>
  
   
  </div>
</div>
</div>';  
  }

    }

?>
<?php

$sql="select * from proposedmenu where resID=$resId";

 

$result=mysqli_query($con,$sql);

if($result && mysqli_num_rows($result)>0){
  
    while($row=mysqli_fetch_assoc($result)){
        $PmenuId=$row['menuId'];
        $Pmenuname=$row['proposedTitle'];
       
        echo '
                <div class="col-lg-4 mb-3 w-50 mx-auto">
                 <div class="card bg-body-tertiary shadow " ">
  <div class="card-body  text-center" >
    <h1 class="text-center fw-bolder ">'.$Pmenuname.'</h1>
<a class="btn btn-primary mt-3  mx-3" href="myPmenu.php?PmenuId='.$PmenuId.'">modify</a>
<a class="btn btn-outline-danger mt-3  mx-3" href="deleteMenu.php?deletePMenu='.$PmenuId.'">delete</a>';
if(isset($_SESSION['rejected']) && $_SESSION['rejected']==$PmenuId){
   echo '<p class="text-center w-25 mx-auto rounded rounded-pill fw-bolder mt-3 text-bg-danger p-1">rejected</p>';

} else {
  echo '<p class="text-center w-25 mx-auto rounded rounded-pill fw-bolder mt-3 text-bg-warning p-1">pending</p>';
}
 
 echo' </div>
</div>
</div>';  
  }

    }

?>
  
    </div>
  
  <div class="container-fluid text-center mt-5 mb-5">
     <a class="btn btn-primary w-50 mx-auto " href="requestMenu.php">Add new menu</a>
  </div>

    </div>
    <!-- Button trigger modal -->




   
   


    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>