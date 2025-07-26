 <?php
 include "../connect.php";
 include "../functions/common_functions.php";
 session_start();
 $result=selectAllFrom("restaurant");
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
    <?php include "components/header.php" ;   ?>
    <h2 class="text-center">main page</h2>
    <div class="container-fluid mt-4"  >
      <div class="row">
      
        <?php
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $resId=$row['resId'];
                $resName=$row['resName'];
                $resLogo=$row['resLogo'];
                echo '
                <div class="col-lg-4 mb-3 ">
                 <div class="card bg-body-tertiary shadow" ">
  <div class="card-body text-center" >
    <img style="height:200px" class="img-fluid d-block object-fit-cover w-75 mx-auto mb-2 border-bottom border-warning border-4 p-3" src="'.$resLogo.'" alt="">
    <h1 class="text-center fw-bolder ">'.$resName.'</h1>
<a class="btn btn-warning mt-3  w-75 mx-auto" href="restaurantMenu.php?resId='.$resId.'">view menu</a>
     <button class=" text-center fs-2 float-end border-0  bg-transparent p-2"> <span class=""><i class="fa-regular fa-heart"></i></span></button>
   
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