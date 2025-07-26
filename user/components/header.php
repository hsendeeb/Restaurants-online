<?php
 if(isset($_SESSION['client'])){
  $username=$_SESSION['client'];

$username=$_SESSION['client'];
$selectCart="select * from cart c,client cl where c.clientid=cl.clientid and username='$username'";
$cartResult=mysqli_query($con,$selectCart);
if(mysqli_num_rows($cartResult)> 0){
$rowCount=mysqli_num_rows($cartResult);
} else {
  $rowCount= 0;
  $alert='<div class="alert alert-warning " role="alert">
  cart is empty
</div>';
}
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
            <div class="container-fluid">
                <a class="navbar-brand fw-bolder border-3 border-bottom border-warning" href="#">Restaurants Online</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-5">
                        <li class="nav-item mx-4 p-2 "><a class="text-decoration-none text-light" href="./mainPage.php">Home</a></li>
                       <?php
                       if(isset($_SESSION['client'])){
                        echo '
                         <li class="nav-item mx-4 p-2 "><a class="text-decoration-none text-light" href="./cart.php"><i class="fa-solid fa-cart-shopping"></i><sup class="bg-warning text-black rounded rounded-5 p-1">'.$rowCount.'</sup></a></li>
                         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            '.$_SESSION['client'].'
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-primary" href="profile.php">view profile</a></li>
            
            <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="./userLogout.php">logout</a></li>
          </ul>
        </li> ';     
       } else {
        echo '
        <li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Register
</a>
<ul class="dropdown-menu">
<li><a class="dropdown-item text-primary" href="./userRegistration.php">client <img style="width:30px;height:30px;margin-left:10px;" src="../images/clients.png"></li></a>
<li><a class="dropdown-item text-primary" href="../restaurant/restaurantRegistration.php">Restaurant <img style="width:30px;height:30px;margin-left:10px" src="../images/restuaranticon.jpg"></a></li>
</ul>';


       }
     ?>
         </ul>               
      </div>
     </div>
        </nav>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
        </header>
      
</html>