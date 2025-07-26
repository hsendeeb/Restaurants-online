<?php
include "../connect.php";
include "../functions/common_functions.php";

$alert='';
if(isset($_POST['deliveryManRegister'])){
  $userFname=$_POST['userFname'];
  $userMname=$_POST['userMname'];
  $userLname=$_POST['userLname'];
  $username=$_POST['username'];
  $password=$_POST["password"];
  $confirmPassword=$_POST['confirmPassword'];

  $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
  $select="select * from deliveryMan where username='$username'";
  $selectResult=mysqli_query($con,$select);
  if(mysqli_num_rows($selectResult)==0){
     if($password==$confirmPassword){
    $sql="insert into deliveryMan(firstname,middlename,lastname,username,password) values('$userFname','$userMname','$userLname','$username','$hashedPassword')";
    $result=mysqli_query($con,$sql);
    if($result){
      header("location:deliveryManLogin.php");
    } 
  } else {
    $alert='<div class="alert alert-danger" role="alert">
    password mismatch!
  </div>';
  }
  } else {
    $alert='<div class="alert alert-danger" role="alert">
    delivery man with this name already exists!
  </div>';

  }
 
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delivery man registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="container-fluid w-50 mx-auto">
      <h2 class="text-center mb-3">delivery man registration</h2>
    <form action="" method="POST">
  <div class="mb-3">
    <label for="userFname" class="form-label">firstname</label>
    <input type="text" class="form-control" id="userFname" name="userFname" required>
  </div>
  <div class="mb-3">
    <label for="userMname" class="form-label">middle name</label>
    <input type="text" class="form-control" id="userMname" name="userMname" required>
  </div>
  <div class="mb-3">
    <label for="userLname" class="form-label">lastname</label>
    <input type="text" class="form-control" id="userLname" name="userLname" required>
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
 
 
  <button type="submit" name="deliveryManRegister" class="btn btn-primary w-100">Submit</button>
  <p class="small mt-3">already have account?<a href="deliveryManLogin.php" class="text-decoration-none mt-3">Login</a></p>
  <p><?php echo $alert ?></p>
</form>

    </div>
    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
