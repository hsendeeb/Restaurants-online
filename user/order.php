<?php

if(isset($_SESSION['client'])){

 try{


  $cartRowCount=rowCount("cart");
  $username=$_SESSION['client'];
  $sql="select * from client c
  JOIN building b ON
  c.buildingid=b.buildingid
  where username='$username'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $clientid=$row['clientid'];
  $buildingid=$row['buildingid'];
  if(isset($_SESSION['resId'])){
    $resId=$_SESSION['resId'];
    $sql2="select * from restaurant where resId=$resId";
    $result2=mysqli_query($con,$sql2);
    $row=mysqli_fetch_assoc($result2);
    $resName=$row['resName'];
  }
  $insertOrder="insert into orders(clientid,buildingid,resId)
  values($clientid,$buildingid,$resId)";
 $insertResult=mysqli_query($con,$insertOrder);
  $orderid=mysqli_insert_id($con);
  $selectOrder="select * from orders";
  $selectResult=mysqli_query($con,$selectOrder); 

  
  $selectCart="select mealId, mealname,qty,sum(mealprice*qty) as total
   from cart c where clientid=$clientid";
   $resultCart=mysqli_query($con,$selectCart);
   if($resultCart){
    while($row=mysqli_fetch_assoc($resultCart)){ 
  $qtycart=$row['qty'];
  $totalcart=$row['total'];
  $mealidcart=$row['mealId'];
   }
   }
 
   if($insertOrder){
    $insertDetails="insert into orderdetails(qty,price,orderid,mealid)
    values($qtycart,$totalcart,$orderid,$mealidcart)";
    $insertDetailsResult=mysqli_query($con,$insertDetails);

   }
   if($insertDetailsResult){
    $delete=deleteFrom("cart","clientid",$clientid);
   }
  
    } catch(Exception $e){
      $e->getMessage();
    }
    
     } 
       
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
  <body>
    <div class="container-fluid mt-5">
        <h1 class="text-center">Orders</h1>
        <hr class="w-75 mx-auto border border-2 border-primary">
        <?php
        $selectDetails="select o.orderid,qty,price,mealName,confirm from orderdetails od,orders o,meals m,mealname mn
        where  od.mealid=m.mealid
        and m.mealNid=mn.mealNid
        and od.orderid=o.orderId
      ";
      $selectDetailsResult=mysqli_query($con,$selectDetails);
          
         if($selectDetailsResult && mysqli_num_rows($selectDetailsResult)>0){
          echo ' <table class="table table-striped w-75 mx-auto">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">from restaurant</th>
              <th scope="col">ordered meals</th>
              <th scope="col">quantity</th>
              <th scope="col">total</th>
               <th scope="col">confirm</th>
            </tr>
          </thead>
          <tbody>';
          while($row=mysqli_fetch_assoc($selectDetailsResult)){
            
            $orderid=$row['orderid'];
            $mealname=$row['mealName'];
            $qty=$row['qty'];
            $total=$row['price'];
            $confirm=$row['confirm'];
            echo '
            <tr>
      <th scope="row">'.$orderid.'</th>
      <td>'.$resName.'</td> 
      <td>'.$mealname.'</td>
       <td>'.$qty.'</td>
      <td>'.$total.'</td>
      <td>'.$confirm.'</td>;
      <td><a class="btn btn-primary" href="invoices.php?orderid='.$orderid.'">confirm</a></td>';
    
          }
          echo ' </tbody>
          </table>';
         } else {
          echo '<div class="alert alert-warning"><h1 class="text-center">No orders</h1></div>';
        }
        ?>
  


  
    </div>





   
   


    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>