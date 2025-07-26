<?php 
include "../connect.php";
include "../functions/common_functions.php";
session_start();
if(isset($_GET['AddAmenuId'])){
    $AmenuId=$_GET['AddAmenuId'];
}

if(isset($_POST['addMenuMeal'])){
    $mealname=$_POST['mealname'];
    $mealprice=$_POST['mealprice'];
    $mealimage=$_FILES['mealimage']['name'];
    var_dump($mealimage);
    $resId=$_SESSION['resId'];
    foreach($mealname as $key=>$value){
        $name=$mealname[$key];
        $price=$mealprice[$key];
        $image=$mealimage[$key];
        $target="../images/".basename($image);
        move_uploaded_file($_FILES['mealimage']['tmp_name'][$key],$target);
        $insertMeal="insert into mealname(mealName) values('$name')";
        $insertMealResult=mysqli_query($con,$insertMeal);
        $selectMeal="select * from mealname where mealName='$name'";
        $selectMealResult=mysqli_query($con,$selectMeal);
        $row=mysqli_fetch_assoc($selectMealResult);
        $mealNid=$row['mealNId'];
        $insertintoMeals="insert into meals(mealPrice,mealimage,resId,mealNid,mealTypeid,Amenuid)
        values($price,'$target',$resId,$mealNid,1,$AmenuId)";
        $insertintoMealsResult=mysqli_query($con,$insertintoMeals);
  
       }
       if($insertintoMeals){
        header("location:mymenu.php?AmenuId=$AmenuId");
       }
      
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>request menu</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <script>
    $(document).ready(function (){
        $('#addModal').modal('show');
    });
    function addMealField(){
      const container=document.getElementById("formContainer");
      const newMealDiv=document.createElement('div');
      const mealCount=container.children.length+1;
      newMealDiv.innerHTML=`<h3>meal ${mealCount}</h3>
      <label class="form-label" for="meal_name_${mealCount}">meal name</label>
      <input class="form-control" type="text" id="meal_name_${mealCount}" name="mealname[]">
      <label class="form-label" for="meal_name_${mealCount}">meal price</label>
      <input class="form-control" type="text" id="meal_name_${mealCount}" name="mealprice[]">
      <label class="form-label" for="meal_name_${mealCount}">meal image</label>
      <input class="form-control" type="file" id="meal_name_${mealCount}" name="mealimage[]">
      <button class="btn btn-outline-danger" onclick="removeField(this)">remove</button>
     
      `;
      container.appendChild(newMealDiv);
    }
    function removeField(button){
      const container=document.getElementById("formContainer");
      container.removeChild(button.parentNode);

    }
  
 </script>
</head>
  
  <body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add new menu</h1>
    
      </div>
      <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
        <div id="formContainer">
  <div class="mb-3">
    <label for="mealname" class="form-label">meal name</label>
    <input type="text" class="form-control" id="mealname" name="mealname[]" required>
    <label for="mealprice" class="form-label">meal price</label>
    <input type="text" class="form-control" id="mealprice" name="mealprice[]" required>
    <label for="mealimage" class="form-label">meal image</label>
    <input type="file" class="form-control" id="mealimage" name="mealimage[]" >
</div>
 </div>
  

  <div class="modal-footer">
       
         <button type="submit" name="addMenuMeal" class="btn btn-primary w-100">Submit</button> 
        <a class="btn btn-danger w-100 text-white" href="mymenu.php?AmenuId=<?php echo $AmenuId ?>">close</a></button>
  
      </div>
 

</form>
<button class="btn text-primary" onclick="addMealField()">+ add meal</button>
  
      </div>
     
    </div>
  </div>
</div>


   
   


    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>