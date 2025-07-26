<?php
include "../connect.php";

if(isset($_GET['AmenuId'])){
  $AmenuId=$_GET['AmenuId'];
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
        <h1 class="text-center">menu <span class="text-primary p-3"><i class="fa-solid fa-user-group"></i></span></h1>
        <hr class="w-75 mx-auto border border-2 border-primary">
  
  <?php

$sql="select m.mealId,mealimage,mealName,menuName,mealPrice from activemenu a,meals m,mealname mn
where a.AmenuId=m.Amenuid and m.mealNid=mn.mealNid  and a.Amenuid=$AmenuId"; 



$result=mysqli_query($con,$sql);

if($result && mysqli_num_rows($result)>0){
  echo ' <table class="table table-striped w-75 mx-auto">
  <thead>
    <tr>
    <th scope="col">meal id</th>
      <th scope="col">meal name</th>
      <th scope="col">meal price</th>
       <th scope="col">meal image</th>
        <th scope="col">menu name</th>
      
    </tr>
  </thead>
  <tbody>';
    while($row=mysqli_fetch_assoc($result)){
      $mealid=$row['mealId'];
        $mealname=$row['mealName'];
        $mealPrice=$row['mealPrice'];
        $mealimage=$row['mealimage'];
        $menuname=$row['menuName'];
       
        echo '
            <tr>
      <td>'.$mealid.'</td>
      <td>'.$mealname.'</td>
      <td>'.$mealPrice.'</td>
      <td><img class="object-fit-cover" style="width:30px;height:30px" src='.$mealimage.'></td>
      <td>'.$menuname.'</td>
      <td>
      <a class="btn btn-sm btn-primary   mx-3" href="mymenu.php?='.$mealid.'">modify</a>
     <a class="btn btn-sm btn-danger  mx-3" href="deleteMeal.php?mealid='.$mealid.'&AmenuId='.$AmenuId.'">delete</a>
      </td>';
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
     <a class="btn btn-primary w-50 mx-auto" href="addMenuMeal.php?AddAmenuId=<?php echo $AmenuId ?>">Add new meal</a>
  </div>

    </div>
    <!-- Button trigger modal -->




   
   


    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>