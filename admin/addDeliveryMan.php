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
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>delivery man registered!</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
header("location:deliveryMan.php");
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
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <script>
    $(document).ready(function (){
        $('#addModal').modal('show');
    });
  
 </script>
</head>
  
  <body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  
 
    
  


    
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">add delivery man</h1>
    
      </div>
      <div class="modal-body">
      <form action="" method="POST">
  <div class="mb-3">
    <label for="userFname" class="form-label">firstname</label>
    <input type="text" class="form-control" id="dFname" name="dFname" required>
  </div>
  <div class="mb-3">
    <label for="userMname" class="form-label">middle name</label>
    <input type="text" class="form-control" id="dMname" name="dMname" required>
  </div>
  <div class="mb-3">
    <label for="userLname" class="form-label">lastname</label>
    <input type="text" class="form-control" id="dLname" name="dLname" required>
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
  <div class="modal-footer">
       
         <button type="submit" name="addDeliveryMan" class="btn btn-primary w-100">Submit</button> 
         <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal"><a class="text-decoration-none text-white" href="deliveryMan.php">close</a></button>
  <p><?php echo $alert ?></p>
      </div>
 

</form>

      </div>
     
    </div>
  </div>
</div>


   
   


    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>