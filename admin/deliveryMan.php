<?php
include "../connect.php";
include "../functions/common_functions.php";
global $alert;
$alert = "";
if(isset($_POST['addDeliveryMan'])){
  $firstName=$_POST['dFname'];
  $middleName=$_POST['dMname'];
  $lastName=$_POST['dLname'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $confirmPassword=$_POST['confirmPassword'];
  $hashedpassword=password_hash($password, PASSWORD_DEFAULT);

 $selectResult=selectAllFromWhere("deliveryman","username","$username");
 if(mysqli_num_rows($selectResult)==0){
  if($password==$confirmPassword){
      $sql="insert into deliveryMan(firstname,middlename,lastname,username,password)
 values('$firstName','$middleName','$lastName','$username','$hashedpassword');";
 $result=mysqli_query($con,$sql);
 header("location:deliveryMan.php");
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>delivery man registered!</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

  } else {
    $alert='<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>password mismatch!</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

  }

 } else {
  $alert= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>username already exists!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
 }

}
  

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delivery man</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
  <body>
    <?php include "components/header.php" ?>
    <div class="container-fluid mt-5">
        <h1 class="text-center">delivery men <span class="text-primary p-3"><i class="fa-solid fa-user-group"></i></span></h1>
        <hr class="w-75 mx-auto border border-2 border-primary">
  
  <?php

$sql="select * from deliveryman"; 

$result=mysqli_query($con,$sql);

if($result && mysqli_num_rows($result)>0){
  echo ' <table class="table table-striped w-75 mx-auto">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">username</th>
      <th scope="col">lastname</th>
      
    </tr>
  </thead>
  <tbody>';
    while($row=mysqli_fetch_assoc($result)){


        $deliveryManid=$row['deliverymanId'];
        $username=$row['username'];
        $lastname=$row['lastname'];
        $selectBlocked="select * from blocklist where blockedName='$username'";
$resultBlocked=mysqli_query($con,$selectBlocked);
        echo '
            <tr>
      <th scope="row">'.$deliveryManid.'</th>
      <td>'.$username.'</td>
      <td>'.$lastname.'</td>';
      if(mysqli_num_rows($resultBlocked)==0){
       echo'   <td><a href="block.php?deliveryManId='.$deliveryManid.'" class="btn btn-danger">block</a></td> </tr>';
      } else {
        echo'   <td><a href="unblock.php?deliveryManId='.$deliveryManid.'" class="btn btn-outline-danger">unblock</a></td></tr>';
      }
    }
    echo ' </tbody>
    </table>'
    ;
} else {
  echo'<div class="alert alert-warning text-center" role="alert">
  <h1 class="fw-bolder">No data</h1> 
  </div>';
}

?>
  
    </div>
  
  <div class="container-fluid text-center mt-5">
     <a class="btn btn-primary w-50 mx-auto" href="addDeliveryMan.php">Add</a>
  </div>

    </div>
    <!-- Button trigger modal -->




   
   


    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>