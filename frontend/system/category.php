<?php

include_once('../../inc/header.php');
include_once("../../config/database.php");
include_once("../../config/paths.php");
$products=[];
if(isset($_GET['category'])){
    $category=$_GET["category"];
    $cat_id=$_GET['id'];
    $products=fetchRows("Products",["category_id"=>$cat_id]);
   
    // print_r($products);

}

?>




<div class="py-3 bg-primary ">
<div class="container">
    <h4 class="text-white">
<a href="<?=SYSTEM?>" target="_blank" rel="noopener noreferrer"   class="text-white">Home/</a>

<a href="<?=SYSTEM.'categories.php'?>" class="text-white">Collection</a>



<?php if(isset($_GET["category"])):?>
    /<a href="#" class="text-white"><?=$category;?></a>
<?php  endif;?>
    </h4>
</div>
</div>








<?php  


if(!empty($products)):?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <?php  foreach ($products as $product):?>
            <div class="col-lg-4 col-md-6 col-12">
          <a href="<?=SYSTEM?>product_details.php?id=<?=$product['id']?>">
          <div class="card shadow">
                <div class="card-body">

                <img src="../../uploads/products/<?= $product['image'] ?>" alt="" srcset="" class="w-100 " height="300px">
        <h4 class="text-center"><?php echo $product['name']?></h4>
                </div>
            </div>
          </a>
            </div>

            <?php   endforeach;?>
        </div>
    </div>
</div>




<?php else: echo"somting went wrong"; 



endif;?>






<?php


include_once('../../inc/footer.php');

?>