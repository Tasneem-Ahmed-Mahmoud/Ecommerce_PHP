
<?php

include_once('../../inc/header.php');
include_once("../../config/database.php");
include_once("../../config/paths.php");
$trending_products= getLastesProduct();

$products=fetchAll("Products");
?>



<!-- alert -->
    <?php  if(isset($_SESSION['message'])):?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> <?php  echo $_SESSION['message']?>.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php  endif; unset($_SESSION['message']);?> 






  


<div class="container py-5 mt-5">
    <div class="row">
        <h2 class="text-danger m-1">LASTES PRODUCTS</h2>
        <div class="underline  mb-3"></div>
        <hr>
        <div class="col-12 row">
        <div class="owl-carousel owl-theme">
<?php
if($trending_products!=[]):?>

<?php
foreach($trending_products as $product):?>
    <div class=" item">
    <a href="product_details.php?id=<?=$product['id']?>">
    <div class="card shadow">
          <div class="card-body">

          <img src="../../uploads/products/<?= $product['image'] ?>" alt="" srcset="" class="w-100 " height="300px">
  <h4 class="text-center"><?php echo $product['name']?></h4>
          </div>
      </div>
    </a>
      </div>
     

<?php endforeach; endif;?>
</div>
        </div>
    </div>
</div>

<!--  -->



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











<!-- about us -->

<div class="container mt-3 bg p-5 mb-5">
    <div class="row">
<div class="col-12">
    <h4>About Us</h4>
    <div class="underline  mb-3"></div>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod asperiores voluptatem sint inventore, repellendus porro distinctio magnam. Perferendis, consectetur maiores.</p>
<p>
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, eligendi. Lorem ipsum dolor sit amet.
    <br><br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi rem esse debitis inventore quae fugit atque eius in tenetur consequuntur!
</p>

</div>
    </div>
</div>
<!--  -->








<?php   
include_once('../../inc/footer.php');


?> 