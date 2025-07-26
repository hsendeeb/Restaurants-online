<?php
 include "../connect.php";
 include "../functions/common_functions.php";
 session_start();
 if(isset($_GET['resId'])){
  $resId=$_GET['resId'];
    $_SESSION['resId']=$_GET['resId'];
  $result=selectAllFromWhere("restaurant","resId",$resId);
  if($result){
    $row=mysqli_fetch_assoc($result);
    $resName=$row['resName'];
    $resLogo=$row['resLogo'];
  };

  $sql="select mealId,mealimage,mealname,resName,menuName,mealTypeName,mealPrice 
       from meals m
       JOIN mealname mn ON
       m.mealNid=mn.mealNid
       JOIN restaurant r ON
       m.resId=r.resId
       JOIN activemenu a ON
       m.Amenuid=a.Amenuid
       JOIN mealtype mt ON
       m.mealTypeid=mt.mealTypeid
        where m.resId=$resId ";
    $menuResult=mysqli_query($con,$sql);
   
    
 }
 ?>
        <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $resName ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  </head>
  <body>
    <?php include "components/header.php" ?>
    <h2 class="text-center fw-bolder mt-2"><?php echo $resName ?> <img style="width: 60px;height:auto" src=<?php echo $resLogo ?> alt=""></h2>
   <a href="mainPage.php" class="btn btn-outline-secondary rounded rounded-pill m-2"><i class="fa-solid fa-arrow-left"></i> back</a>
    <div class="container-fluid mt-4"  >
      <div class="row">
      
      
        <?php
        if($menuResult){
          
            while($row=mysqli_fetch_assoc($menuResult)){
                $mealId=$row['mealId'];
                $mealname=$row['mealname'];
                $mealPrice=$row['mealPrice'];
                $mealimage=$row['mealimage'];
                $mealtype=$row['mealTypeName'];
                $menuName=$row['menuName'];
                
                echo '
                <div class="col-md-4 mt-3 ">
                 <div class="card bg-body-tertiary shadow " >
  <div class="card-body" >
    <img style="width:100%;height:200px" class="object-fit-contain mx-auto mb-2 border-bottom border-warning border-4 p-3 rounded rounded-5" src="'.$mealimage.'" alt="">
    <h3 class="text-center fw-bolder ">'.$mealname.'</h3>
   <div class="container text-center">
    <a class="btn btn-primary mx-auto px-3  mt-3" href="restaurantMenu.php?resId='.$resId.'">Order</a>
     <a class="btn btn-warning mx-auto px-3   mt-3" href="addtocart.php?mealId='.$mealId.'">Add to cart</a>
   </div>
  </div>
</div>
</div>';    
    }
        }
        
        ?>
       
       
      





</div>
    </div>
   
   

    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>