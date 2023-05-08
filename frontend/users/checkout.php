<?php

include_once('../../inc/header.php');
include_once("../../middleware/user.php");
include_once("../../config/database.php");
include_once("../../config/paths.php");
if (isset($_SESSION['user'])) {

    $user_id = $_SESSION['user']['id'];

    $carts = getUserCart($user_id);
} else {
    $carts = [];
}
// echo $_SESSION['user']['id'];
// print_r($carts);

?>


<div class="py-3 bg-primary">
    <div class="container">
        <h4 class="text-white">
            <a href="index.php" target="_blank" rel="noopener noreferrer" class="text-white">Home/</a>
            <a href="cart.php" target="_blank" rel="noopener noreferrer">Cart/</a>
            <a href="#" target="_blank" rel="noopener noreferrer">Checkout</a>


    </div>
</div>





<div class="container py-5  ">
    <div class="card">
        <div class="card-body">

        <form action="../../admin/hundler/users/place_order.php" method="post">
    <div class="row">


    <?php 
if(isset($_SESSION["errors"])):?>
<div class="alert alert-danger">
    <?php foreach($_SESSION["errors"] as $error):?>
        <small class="text-white">*<?=$error?></small><br>
        <?php endforeach;?>
</div>
<?php
endif; unset($_SESSION["errors"])
?>
        <div class="col-md-7">
        <h3 class="">Basic  Details</h3>
        <hr>

<div class="row ">
    <div class="col-md-6">
    <div class=" mb-3">
    <label for="floatingInput">Name</label>
  <input type="text" class="form-control" id="floatingInput" placeholder="Enter Name" name="name">

</div>
    </div>
<div class="col-md-6">
<div class="mb-3">
<label for="floatingPassword">Email</label>
  <input type="text" class="form-control" id="floatingPassword" placeholder="Enter Email" name="email">
  
</div>
<div class="col-md-6">

</div>
    </div>

    <div class="col-md-6">
    <div class="mb-3 mb-3">
    <label for="floatingInput">Phone</label>
  <input type="number" class="form-control" id="floatingInput" placeholder="Enter phone number" name="phone">
 
</div>
    </div>
<div class="col-md-6">
<div class="mb-3">
<label for="floatingPassword">Zib Code</label>
  <input type="text" class="form-control" id="floatingPassword" placeholder="Enter Zip Code" name="zib_code">

</div>
<div class="col-md-6">

</div>
    </div>
    <div class="col-12">
    <div class="mb-3">
    <label for="floatingTextarea">Adress</label>

  <textarea class="form-control" placeholder="Enter Address" id="floatingTextarea" name="address"></textarea>
 
</div>
    </div>

</div>

        </div>

<div class="col-md-5">
<h3 class="">Order Details</h3>
<hr>
<div class="col-12   card card-body shadow ">

<?php if (!empty($carts)) :?>
<div class="row  ">
  
<div id="myCart">

<?php 
$total_price=0;
              foreach ($carts as $cart) :
                
                $selling_price=$cart["price"] - $cart["price"]*($cart["offer"]/100);
                $total_price+=$selling_price*$cart['product_qty'];
          ?>
           <div class="card shadow-sm mb-3  product_data">
                  <div class="row p-2 align-item-center">
                      <div class="col-md-3 text-center">
                           <img height="50px" src="../../uploads/products/<?= $cart['product_image'] ?>" alt="" srcset="" class="w-100">
                      </div>

                      <div class="col-md-3 text-center">
                          <h5 class="text-center"><?= $cart['product_name'] ?></h5>
                      </div>
                      <div class="col-md-3 text-center">
                          <h5 class="text-center"><?=$selling_price?>$</h5>
                      </div>
                      <div class="col-md-3 ">
                          <h5 class="text-center">x<?=$cart['product_qty']?></h5>
                      </div>
                    


                  </div>


                  </div>

          <?php endforeach;
       ?>


         
</div>
   <hr>                  
<h5 class="mt-2">Total Price : <span class="float-end fs-6"><?=$total_price?>$</span></h5>
       <input type="text" hidden name="total_price" value="<?=$total_price?>">  

<div class="mt-2 text-end">
    <button class="btn btn-primary"  name="placeOrder_btn" type="submit">Confirm and place order</button>
</div>

    </div>
    <?php     else : echo "no data avaliable";  endif; ?>
</div>



        </div>

</div>
</form>
    </div>
    </div>
    </div>
</div>








<?php
include_once('../../inc/footer.php');


?>