<?php
include "../connect.php";
include "../functions/common_functions.php";
if(isset($_GET['updateid'])){
    $updateid=$_GET['updateid'];
    $selectResult=selectAllFromWhere("cart","cartid",$updateid);
    $row=mysqli_fetch_assoc($selectResult);
    $qty=$row['qty'];
    if(isset($_POST['updatecart'])){
        $quantity=$_POST['qty'];
           $update="UPDATE cart SET qty=$quantity where cartid=$updateid"; 
           $updateResult=mysqli_query($con,$update);
           if($updateResult){
            header("location:cart.php");
           }    
    }

}



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <script>
    $(document).ready(function (){
        $('#updateModal').modal('show');
    });
  
 </script>
</head>
  
  <body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">modify</h1>
    
      </div>
      <div class="modal-body">
      <form method="POST">
  <div class="mb-3">
    <label for="qty" class="form-label">quantity</label>
    <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $qty ?>">
  </div>

  
  <div class="modal-footer">
       
         <button type="submit" name="updatecart" class="btn btn-primary w-100">Submit</button> 
         <a class="btn btn-danger w-100 " href="cart.php">close</a></button>
 
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