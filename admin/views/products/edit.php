








<?php  

include_once("../../../config/paths.php");
include_once("../../inc/header.php");
include_once("../../../config/database.php");


$categories=fetchAll("categories");

?>

<div class="container-fluid py-4">
<div class="row">
    <div class="col-md-12">

<div class="card">
    <div class="card-header">
<h4>Edit Product</h4>
    </div>




    <?php if(isset($_REQUEST['id'])):
   
   $id=$_REQUEST['id'];
  
$product=fetch("products",$id);
if($product !=[]):


  ?>

    <div class="card-body">
<form action="../../hundler/products/update.php" method="post"   enctype="multipart/form-data">
<div class="row">
<input type="text" name="id" value="<?=$product['id']?>" id=""  hidden>
<div class="col-md-6">
<label  class="form-label">Name</label>
      <input type="text" class="form-control" name="name"  placeholder="Enter product Name" value="<?= $product['name']?>"> 
    
</div>
<div class="col-md-6">
<label  class="form-label">Qountity</label>
      <input type="number" class="form-control" name="qty"  placeholder="Enter Slug"  value="<?= $product['qty']?>" >
    
</div>

<div class="col-md-12">
<label  class="form-label"> Description</label>
     <textarea name="description" rows="3"  placeholder="Enter Description" class="form-control" ><?= $product['description']?></textarea>
</div>


<div class="col-md-6">
<label  class="form-label"> Price</label>
      <input type="number" class="form-control" name="price"  placeholder="Enter  Price" value="<?= $product['price']?>">
    
</div>

<div class="col-md-6">
<label  class="form-label"> Offer</label>
      <input type="number" class="form-control" name="offer"  placeholder="Enter  offer" value="<?= $product['offer']?>">
    
</div>

<div class="col-md-12">
<label  class="form-label">Upload Image</label>
<input type="text" hidden name="old_image" value="<?= $product['image']?>">
      <input type="file" class="form-control" name="image"  placeholder="Upload Image" >
   <div class="mt-2">
   <img src="../../../uploads/products/<?=$product['image']?>" alt="" srcset="" height="50px" width="50px">
</div>



<div class="col-md-12">
<label  class="form-label">Select category</label>
<select name="category_id" id="" class="form-select">

    <?php
    if(!empty($categories)):
    foreach($categories as $category):?>
      
    <option value="<?=$category['id']?>" <?php  if($category['id']== $product['category_id']){echo "selected";} ?> ><?= $category['name']?> </option>
    <?php endforeach  ; else:  echo"no categories avalible"; endif;?>
</select>
    
</div>

</div>
<div class="col-md-12 mt-1">
<button type="submit" class="btn btn-primary float-end " name="update_product_btn">Update</button>
</div>
</div>
</form>


    </div>

    <?php else: echo "category Not Found"; endif;

else: echo"id missing from url" ; endif; ?>
</div>



    </div>
</div>


        

</div>




<?php
include_once("../../inc/footer.php");

?>