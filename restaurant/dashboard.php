<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <link rel="stylesheet" href="../style2.css">
  </head>
  <body>
    <?php include "components/header.php" ?>
    <h2 class="text-center">restaurant dashboard <?php echo $_SESSION['resId'] ?></h2>
    <div class="container mt-4"  >
      <div class="row">
        <div class="col-md-4 mb-3">
      <a href="menues.php" class="text-decoration-none">
    <div class="card bg-body-tertiary shadow">
  <div class="card-body" >
    <img class="img-fluid w-25 mx-auto float-end" src="../images/menuRequest.png" alt="">
    <h4 class="p-2">My menu</h4>
   
  </div>
</div>
</a>
</div>
<div class="col-md-4 mb-3">
      <a href="clients.php" class="text-decoration-none">
    <div class="card bg-body-tertiary shadow" >
  <div class="card-body" >
  <img class="img-fluid w-25 mx-auto float-end" src="../images/clients.png" alt="">
    <h4 class="p-2">clients</h4>
  </div>
</div>
</a>
</div>
<div class="col-md-4 mb-3">
      <a href="deliveryMan.php" class="text-decoration-none">
    <div class="card bg-body-tertiary shadow" >
  <div class="card-body" id="menu">
  <img class="img-fluid w-25 mx-auto float-end" src="../images/deliveryman.png" alt="">
    <h4 class="p-2">delivery men</h4>
   
  </div>
</div>
</a>
</div>


</div>
    </div>
   
   

    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>