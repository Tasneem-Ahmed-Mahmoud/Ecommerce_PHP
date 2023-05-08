<?php  
include_once('../../inc/header.php');

if(isset($_SESSION['auth'])) {
  $_SESSION['message']="you are already logged In";
  header('location:index.php');
  die;
}


?>
    

<div class="py-5">
<div class="container">
    <div class="row  justify-content-center ">
        <div class="col-md-7">
          <!-- alert -->
          <?php  if(isset($_SESSION['message'])):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php  echo $_SESSION['message']?>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php  endif; unset($_SESSION['message']);?>
<div class="card shadow ">
    <div class="card-header bg-primary">
        <h4 class="text-white">Register Form</h4>
    </div>
    <div class="card-body">
    <form method="post" action="../../admin/hundler/users/store.php">

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
    <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="name" class="form-control" name="name" placeholder="Enter your name">
  
  </div>

  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name="email"  placeholder="Enter your email">
  
  </div>

  <div class="mb-3">
    <label  class="form-label">Phone</label>
    <input type="number" class="form-control" name="phone" placeholder="Enter your phone">
  
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
  <div class="mb-3">
    <label  class="form-label">Confirm Password</label>
    <input type="password" class="form-control"   placeholder="Enter your confirm password" name="confirm_password">
  </div>
  
 <div class="mb-3 float-end">
 <button type="submit" class="btn btn-primary " name="register_btn">Register</button>
 </div>
</form>

    </div>
</div>




        </div>
    </div>
</div>

</div>









    <?php   
include_once('../../inc/footer.php');


?> 