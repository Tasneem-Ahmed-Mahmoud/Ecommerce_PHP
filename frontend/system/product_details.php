<?php
include_once('../../inc/header.php');
include_once("../../config/database.php");
include_once("../../config/paths.php");
if(isset($_GET['id'])){
   
    $id=$_GET['id'];
    $product=fetchRow("products",["id"=>$id]);
    // print_r($product);

}else{

    $product=[];
}





?>


<?php  if(!empty($product)):
    $selling_price=$product["price"] - $product["price"]*($product["offer"]/100);
    ?>

    <div class="py-3 bg-primary">
<div class="container product_data">
    <h4 class="text-white">
<a href="index.php" target="_blank" rel="noopener noreferrer" class="text-white">Home/</a>

<a href="categories.php"  class="text-white">Collection/</a><?= $product['name']?>



    </h4>
</div></div>

    <div class="container py-5">

<div class="row pg-light  p-3  shadow">
    <div class="col-md-4  shadow">
    <img src="../..//uploads/products/<?= $product['image'] ?>" alt="" srcset="" class="w-100 " height="300px">
     
    </div>

    <div class="col-md-8 ps-md-4  ">
<h4 class="pt-3"><?=$product['name']?>


</h4>

<hr>

<div class="row">
    <div class="col-6"> <h5 class="text-danger text-decoration-line-through"><?= $product['price']?>$</h5></div>
    <div class="col-6"> <h5 class="text-success fs-3"><?= $selling_price?>$</h5></div>
</div>


<div class="row mt-3">
    <div class="col-md-4">
<div class="input-group mb-3" style="width:130px">
  <button class="input-group-text decrement_btn btn bg-info">-</button>
  <input type="text" class="form-control bg-white text-center  input_qty" disabled value="1">
  <button class="input-group-text increment_btn  bg-info">+</button>
</div>
    </div>
</div>


<div class="row mt-3">
<div class="col-md-6">
   
    <button type="submit" class="btn btn-primary px-3 addToCartBtn"  value="<?=$product['id']?>">  <i class="fa fa-shopping-cart me-2"></i>Add to cart</button>
    
</div>
<div class="col-md-6">
<button type="submit" class="btn btn-danger px-2 addToWishlistBtn" value="<?=$product['id']?>"> <i class="fa fa-heart me-2"></i>Add to wishlist</button>
</div>


</div>

<hr>
<h6>Product Description:</h6>
<p><?=$product['description']?></p>
    </div>
</div>



</div>





    <?php  endif?>








    <?php   
include_once('../../inc/footer.php');


?> 