<?php
include "../connect.php";
include "../functions/common_functions.php";

$alert='';
if(isset($_POST['restaurantRegister'])){
  $resName=$_POST['resName'];
  $username=$_POST['username'];
  $password=$_POST["password"];
  $confirmPassword=$_POST['confirmPassword'];
  $resLogo=$_FILES['resLogo']['name'];
  $target="../images/".basename($resLogo);
  move_uploaded_file($_FILES['resLogo']['tmp_name'],$target);

  $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
  $select="select * from restaurant where username='$username'";
  $selectResult=mysqli_query($con,$select);
  if(mysqli_num_rows($selectResult)==0){
     if($password==$confirmPassword){
    $sql="insert into restaurant(resName,username,resLogo,password) values('$resName','$username','$target','$hashedPassword')";
    $result=mysqli_query($con,$sql);
    if($result){
      header("location:restaurantLogin.php");
    }       
  } else {
    $alert='<div class="alert alert-danger" role="alert">
    password mismatch!
  </div>';
  }
  } else {
    $alert='<div class="alert alert-danger" role="alert">
    restaurant with this name already exists!
  </div>';

  }
 
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>restaurant resgistration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="container-fluid w-75 mx-auto mt-4">
      <h2 class="text-center mb-3">restaurant registration</h2>
    <form action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="resName" class="form-label">restaurant name</label>
    <input type="text" class="form-control" id="resName" name="resName" required>
  </div>
  <div class="mb-3">
    <label for="adminLname" class="form-label">username</label>
    <input type="text" class="form-control" id="username" name="username" required >
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">confirm password</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
  </div>
  <div class="mb-3">
    <label for="resLogo" class="form-label">restaurant logo</label>
    <input type="file" class="form-control" id="resLogo" name="resLogo">
  </div>
 
  <button type="submit" name="restaurantRegister" class="btn btn-primary w-100 mx-auto">Submit</button>
  <p class="small mt-3">already have account?<a href="restaurantLogin.php" class="text-decoration-none mt-3">Login</a></p>
  <p><?php echo $alert ?></p>
</form>

    </div>
    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
