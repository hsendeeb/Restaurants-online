<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
  <body>
    <?php include "components/header.php" ?>
    <div class="container-fluid mt-5">
        <h1 class="text-center">Active menu </h1>
 
 
 
        <hr class="w-75 mx-auto border border-2 border-primary">
  <table class="table table-striped w-75 mx-auto">
  <thead>
    <tr>
     
      <th scope="col">menu name</th>
      <th scope="col">meals</th>
      <th scope="col">restaurant</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
include "../connect.php";
include "../functions/common_functions.php";
$sql="select GROUP_CONCAT(mealname) as mealnames,menuName,resName from meals m 
JOIN activemenu a ON m.AmenuId=a.AmenuId
 JOIN restaurant r ON m.resId=r.resId 
 JOIN mealname mn ON m.mealNid=mn.mealNId 
 GROUP BY m.AmenuId;";

$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        
        $menuName=$row['menuName'];
        $resName=$row['resName'];
        $mealnames=$row['mealnames'];
        echo '
            <tr>
    
      <td>'.$menuName.'</td>
      <td>'.$mealnames.'</td>
      <td>'.$resName.'</td>
       <td> <a class="btn btn-primary btn-sm btn-block  " href="">update</a>
        <a class="btn btn-outline-danger btn-sm btn-block " href="">delete</a></td>
    
    </tr>
        ';

    }
}

?>
    
  </tbody>
  </table>
    </div>


   
   


    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
