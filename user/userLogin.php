<?php
include "../functions/common_functions.php";
include "../connect.php";
session_start();
$alert="";


if(isset($_POST['userLogin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $result=selectAllFromWhere("client","username","$username");
    while($row=mysqli_fetch_assoc($result)){
        $hashedpassword=$row['password'];
        
    }
if($result){
    if(mysqli_num_rows($result)==0){
         $alert='<div class="alert alert-danger" role="alert">
      user is not registered;
    </div>';
    }
    
    elseif(!password_verify($password,$hashedpassword)){
        $alert='<div class="alert alert-danger" role="alert">
        incorrect password!
      </div>';
   } else {
        header("location:mainPage.php");
        $_SESSION['client']=$username;
        
    }
    } 
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>user login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   
    <div class="container-fluid">
       
        <div class="row">
            <div class="col-md-6 p-5  mt-5">
                 <h4 class="text-center mb-5">user Login</h4>
                 
                <form action="" method="POST">
  <div class="mb-3">
    <label for="adminname" class="form-label">user name</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" name="userLogin" class="btn btn-primary w-100">Submit</button>
  <p class="small mt-3">Dont have account?<a href="userRegistration.php" class="text-decoration-none mt-3">Register</a></p>
  <p><?php echo $alert ?></p>
</form>
            </div>
            <div class="col-md-6">
                <img class="img-fluid   w-100" src="../images/userLogin.jpg" alt="">
            </div>
        </div>
      
    

    </div>
    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>