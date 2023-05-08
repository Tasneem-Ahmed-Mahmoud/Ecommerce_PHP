<?php

include_once('../../inc/header.php');
include_once("../../middleware/user.php");
include_once("../../config/database.php");
include_once("../../config/paths.php");
$carts = [];

if (isset($_SESSION['user'])) {

    $user_id = $_SESSION['user']['id'];

    $carts = getUserCart($user_id);
} 
   
// echo $_SESSION['user']['id'];
// print_r($carts);
// die;

?>


<div class="py-3 bg-primary">
    <div class="container">
        <h4 class="text-white">
            <a href="index.php" target="_blank" rel="noopener noreferrer" class="text-white">Home/</a>

<a href="#">Cart</a>
    </div>
</div>





<div class="container py-5 text-center  " id="cart">
    <div class="row align-items-center">
        <div class="col-12   card card-body shadow ">


<div class="row ">
    <div class="col-12 ">
 

<div class="row align-items-center">

<div class="col-md-2">
<h5>Image</h5>
</div>

<div class="col-md-2">
   <h5>Name</h5>
</div>
<div class="col-md-2">
    <h5>Price</h5>
</div>
<div class="col-md-3 ">
<div class="input-group mb-3" style="width:130px">
<h5>Quantity</h5>
</div>
</div>


<div class="col-md-3">
    <h5>Action</h5>
</div>
</div>

</div>




<div id="myCart">

  <?php if (!empty($carts)) :
                foreach ($carts as $cart) :
                    $selling_price=$cart["price"] - $cart["price"]*($cart["offer"]/100);
            ?>
             <div class="card shadow-sm mb-3  product_data">
                    <div class="row p-2 align-item-center">
                        <div class="col-md-2">
                             <img height="70px" src="../../uploads/products/<?= $cart['product_image'] ?>" alt="" srcset="" class="w-50">
                        </div>

                        <div class="col-md-2">
                            <h5 class=""><?= $cart['product_name'] ?></h5>
                        </div>
                        <div class="col-md-2">
                            <h5><?= $selling_price?>$</h5>
                        </div>
                        <div class="col-md-3 ">
                        <div class="input-group mb-3" style="width:130px">
                        <input type="text" class="cart_id" hidden value="<?= $cart['cart_id']?>">
  <button class="input-group-text decrement_btn btn bg-info updateQty">-</button>
  <input type="text" class="form-control bg-white text-center  input_qty" disabled value="<?= $cart['product_qty']?>">
  <button class="input-group-text increment_btn  bg-info  updateQty">+</button>
</div>
                        </div>


                        <div class="col-md-3">

                            <button class="btn btn-danger  delete_item  cart_delete_btn" value="<?=$cart['cart_id']?>"  name="cart_delete_btn" type="button">
                                <i class="fa fa-trash me-2"></i> 
                                Remove</button>
                        </div>
                    </div>


                    </div>

            <?php endforeach;?>
            <div class="float-end">
            <a href="checkout.php" class="btn btn-outline-primary">Proceed To Checkout</a>
            </div>
         <?php    else : echo "no data avaliable";
            endif; ?>
</div>



    </div>
</div>


           
          
         
        </div>



    </div>
</div>








<?php
include_once('../../inc/footer.php');


?>