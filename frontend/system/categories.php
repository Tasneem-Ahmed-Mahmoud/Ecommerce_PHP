<?php  
include_once('../../inc/header.php');
include_once("../../config/database.php");
include_once("../../config/paths.php");


?>
<div class="py-3 bg-primary ">
<div class="container">
    <h4 class="text-white">
<a href="<?=SYSTEM?>" target="_blank" rel="noopener noreferrer"   class="text-white">Home/</a>

<a href="<?=SYSTEM.'categories.php'?>" class="text-white">Collection</a>



    </h4>
</div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>Our Collections</h1>
<hr>
            <?php 
          $categories=  fetchAll("categories");
            if(!empty($categories)):
                foreach($categories as $category):
            ?>

 

   <div class="col-lg-4 col-md-6 col-12 p-2 ">
   <a href="<?=SYSTEM.'category.php'?>?category=<?=$category['name']?>&id=<?=$category['id']?>" >   
<div class="card shadow">
    <div class="card-body">
        <img src="../../uploads/categories/<?= $category['image'] ?>" alt="" srcset="" class="w-100 " height="300px">
        <h4 class="text-center"><?php echo $category['name']?></h4>
    </div>
</div>
</a>
            </div>
  
             <?php endforeach; else: echo "No data avaliable"; endif; ?>
        </div>
    </div>
</div>












<?php   
include_once('../../inc/footer.php');


?> 