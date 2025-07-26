<?php


 include "../connect.php";
 include "../functions/common_functions.php";
 session_start();
  
 $alert="";
 if(isset($_SESSION['client'])){
  $cartRowCount=rowCount("cart");


 $username=$_SESSION['client'];
 $selectUser="select * from client where username='$username'";
 $userResult=mysqli_query($con,$selectUser);  
 if($userResult){
    $row=mysqli_fetch_assoc($userResult);
   
    $clientid=$row['clientid']; 
    $_SESSION['clientid']=$clientid;
 $selectfromCart="select * from cart where clientid=$clientid";
 $cartResult2=mysqli_query($con,$selectfromCart);
 $count=mysqli_num_rows($cartResult2);
 } 
 $selectTotal="select sum(mealprice*qty) as total from cart";
 $totalResult=mysqli_query($con,$selectTotal);
 $row=mysqli_fetch_assoc($totalResult);
 $total=$row["total"];


 }
 ?>
        <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <link rel="stylesheet" href="../style2.css">
  </head>
  <body>
    <?php include "components/header.php";?>
    <h2 class="text-center mt-2">cart <i class="fa-solid fa-cart-shopping"></i></h2>

    <div class="container-fluid d-flex justify-content-evenly align-items-center bg-danger text-light p-1">
      <h3 class="fw-bolder">items: <?php echo $count ?></h3>
      <h3 class="fw-bolder">total:  <?php echo $total?>$</h3>
    </div>
    <div class="container-fluid mt-4"  >
      <div class="row w-100">
      <a href="mainPage.php" class="btn btn-outline-secondary btn-sm rounded rounded-pill m-2"><i class="fa-solid fa-arrow-left"></i>Continue ordering</a>
        <h1 class="text-center"><?php echo $alert ?></h1>
        <?php
        if(mysqli_num_rows($cartResult2)>0){
         ;
          while($row=mysqli_fetch_assoc($cartResult2)){
            $clientid=$row['clientid'];
            $mealId=$row['mealId'];
            $cartid=$row['cartid'];
            $qty=$row['qty'];
            $mealname=$row['mealname'];
            $mealprice=$row['mealprice'];
            $mealimage=$row['mealimage'];
            echo '
            <div class="col-md-12  mt-4">
             <div class="card  mx-auto bg-body-tertiary " style="width:20rem"">
<div class="card-body d-flex justify-content-center align-items-center" >
<img style="width:40px;height:40px" class=" mx-auto mb-2 " src="'.$mealimage.'" alt="">
<h6 class="text-center fw-bolder ">'.$mealname.'</h6>
<p class="fw-bolder fs-4 p-2  text-success mx-4">'.$mealprice.'$</p>
</div>
<p class=" text-end fw-bolder ">quantity:'.$qty.'</p>
<div class="card-footer  text-body-secondary text-center">
 <a class="btn btn-danger  m-2 px-3  mt-3" href="removefromcart.php?cartid='.$cartid.'">Remove</a>
 <a class="btn btn-secondary m-2 px-3    mt-3" href="updatecart.php?updateid='.$cartid.'">modify</a>

  </div>
</div>
</div>';    
          }
        }
        
        ?>
        
     <?php
      if($cartRowCount>0){
      echo '   <a href="payment.php" class="btn btn-primary w-50 mx-auto mt-3">checkout</a>';
     } 
     ?>
      
        
</div>
    </div>
   
   

    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>