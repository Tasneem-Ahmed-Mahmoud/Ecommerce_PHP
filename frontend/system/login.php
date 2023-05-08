<?php  
include_once('../../inc/header.php');
// if(isset($_SESSION['auth']) ){


//   if($_SESSION["role"] ==1){
//     $_SESSION['message']="you are already logged In";
//     header('location:admin/index.php');
//     die;
//   }
//   $_SESSION['message']="you are already logged In";
//   header('location:index.php');
//   die;}
// include_once('./includes/header.php');

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
<div class="card shadow-blur ">
    <div class="card-header   bg-primary">
        <h4 class="text-white">Login Now</h4>
    </div>
    <div class="card-body">

    <form method="post" action="../../admin/hundler/users/login.php">
    

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
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name="email"  placeholder="Enter your email">
  
  </div>

  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>

  
<div class="mb-3 float-end">
<button type="submit" class="btn btn-primary" name="login_btn">Submit</button>
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