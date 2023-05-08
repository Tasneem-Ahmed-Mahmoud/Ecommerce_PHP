
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
<h4>Add Product</h4>
    </div>
    <div class="card-body">
<form action="../../hundler/products/store.php" method="post"   enctype="multipart/form-data">

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
<div class="col-md-6">
<label  class="form-label">Name</label>
      <input type="text" class="form-control" name="name"  placeholder="Enter product Name">
    
</div>


<div class="col-md-6">
<label  class="form-label">Qountity</label>
      <input type="number" class="form-control" name="qty"  placeholder="Enter qountity" >
    
</div>
<div class="col-md-12">
<label  class="form-label">Select Category</label>
<select name="category_id" id="" class="form-select">
<option  selected id="">Select Category</option>
    <?php
    if(!empty($categories)):
    foreach($categories as $category):?>
      
    <option value="<?=$category['id']?>"><?= $category['name']?></option>
    <?php endforeach  ; else:  echo"no categories avalible"; endif;?>
</select>
    
</div>

<div class="col-md-6">
<label  class="form-label"> Price</label>
      <input type="number" class="form-control" name="price"  placeholder="Enter  Price" >
    
</div>
<div class="col-md-6">
<label  class="form-label">offer</label>
      <input type="number" class="form-control" name="offer"  placeholder="Enter offer" >
    
</div>
<div class="col-md-12">
<label  class="form-label">Description</label>
     <textarea name="description"  rows="3"  placeholder="Enter Description" class="form-control" ></textarea>
</div>


<div class="col-md-12">
<label  class="form-label">Upload Image</label>
      <input type="file" class="form-control" name="image"  placeholder="Upload Image" >
    
</div>



<div class="col-md-12 mt-1">
<button type="submit" class="btn btn-primary float-end " name="add_product_btn">Save</button>
</div>
</div>
</form>


    </div>
</div>



    </div>
</div>


        

</div>






<?php
include_once("../../inc/footer.php");

?>