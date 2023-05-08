
<?php

include_once("../../../config/paths.php");
include_once("../../inc/header.php");


?>

<div class="container-fluid py-4">
<div class="row">
    <div class="col-md-12">

<div class="card">
    <div class="card-header">
<h4>Add Category</h4>
    </div>
    <div class="card-body">
<form action="../../hundler/categories/store.php" method="post"   enctype="multipart/form-data">


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
<div class="col-md-12">
<label  class="form-label">Name</label>
      <input type="text" class="form-control" name="name"  placeholder="Enter Category Name">
    
</div>

<div class="col-md-12">
<label  class="form-label">Upload Image</label>
      <input type="file" class="form-control" name="image"  placeholder="Upload Image" >
</div>

<div class="col-md-12 mt-3">
<button type="submit" class="btn btn-primary float-end " name="add_category_btn">Save</button>
</div>
</div>
</form>
    </div>
</div>
    </div>
</div>










<?php
include_once("../../inc/footer.php");

?>