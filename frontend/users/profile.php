<?php

include_once('../../inc/header.php');
include_once("../../middleware/user.php");
include_once("../../config/database.php");
include_once("../../config/paths.php");

// print_r($_SESSION);
$image="";
$user=fetch("users",$_SESSION['user']['id']);
if(isset($user['image'])){
  $image=$user['image'];
}

?>

<div class="py-3 bg-primary">
<div class="container product_data">
    <h4 class="text-white">
<a href="index.php" target="_blank" rel="noopener noreferrer" class="text-white">Home/</a>

<a href="#"  class="text-white">Profile</a>



    </h4>
</div></div>


<div class="container hv-100  justify-content-center align-items-center mt-5">
   
    <div class="row mt-5">
        <div class="col-12 ">
        <?php 
    if(isset($_SESSION["errors"])):?>
    <div class="alert alert-danger mb-3">
        <?php foreach($_SESSION["errors"] as $error):?>
            <small class="text-white">*<?=$error?></small><br>
            <?php endforeach;?>
    </div>
    <?php
    endif; unset($_SESSION["errors"])
    ?>

        </div>
        <div class="col-md-6 p-5 shadow ">

<h4 class="p-1 border border-1 text-center text-white bg-primary">Chang Password</h4>



        <form method="post" action="../../admin/hundler/users/update_password.php">
    

      <div class="mb-3">
        <label  class="form-label">Old Password</label>
        <input type="email" class="form-control" name="old_password"  placeholder="Enter your old password">
      
      </div>
    
      <div class="mb-3">
        <label  class="form-label">NEW Password</label>
        <input type="password" class="form-control" placeholder="Enter your new  password" name="password">
      </div>
      <div class="mb-3">
        <label  class="form-label">Confirm Password</label>
        <input type="password" class="form-control" placeholder="confirm  password" name="confirm_password">
      </div>
      
      <div class="mb-3 text-center">
      <button type="submit" class="btn btn-primary px-5" name="password_btn">Update</button>
      </div>
    </form>


        </div>



<!--  -->



<div class="col-md-6 p-5 shadow ">

<h4 class="p-1 border border-1 text-center text-white bg-primary">Chang Image </h4>


              <div class="d-flex justify-content-center align-items-center p-3 ">

<?php

?>
<img src="../../uploads/users/<?php if($image==""){echo "user.jpg";}else{echo $image;}  ?>" alt="" srcset="" class="w-50 " height="300px">
              </div>


        <form method="post" action="../../admin/hundler/users/update_image.php"    enctype="multipart/form-data">
    
      <div class="mb-3">
        <label  class="form-label">Uploade Image</label>
        <input type="file" class="form-control" name="image" >
      
      </div>
    
      
      
      <div class="mb-3 text-center">
      <button type="submit" class="btn btn-primary px-5" name="password_btn">Update</button>
      </div>
    </form>


        </div>








<div class="col-md-6">
            
        </div>

    </div>


  
</div>



















<?php
include_once('../../inc/footer.php');


?>
