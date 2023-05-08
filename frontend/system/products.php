<?php
include_once('../../inc/header.php');
include_once("../../config/database.php");
include_once("../../config/paths.php");



$products=fetchAll("Products");

?>





<!-- search -->



<div class="container mt-2">
    <div class="row justify-content-center ">
    <div id="cover">
  <div class="form" >
    <div class="tb">
      <div class="td">

        <input type="text" placeholder="Search" required class="search"  >
      
      </div>
      <div class="td" id="s-cover">
        <button type="" disabled>
          <div id="s-circle"></div>
          <span></span>
        </button>
      </div>
    </div>
</div>
</div>

    </div>
</div>



<div class="py-5">
    <div class="container">
        <div class="row" id="product">

        <?php  if(!empty($products)): foreach ($products as $product):?>
            <div class="col-lg-4 col-md-6 col-12 p-1">
          <a href="<?=SYSTEM?>product_details.php?id=<?=$product['id']?>">
          <div class="card shadow">
                <div class="card-body">

                <img src="../../uploads/products/<?= $product['image'] ?>" alt="" srcset="" class="w-100 " height="300px">
        <h4 class="text-center"><?php echo $product['name']?></h4>
                </div>
            </div>
          </a>
            </div>

            <?php   endforeach;  endif;?>


        </div>
    </div>
</div>









<?php



include_once('../../inc/footer.php'); ?>

