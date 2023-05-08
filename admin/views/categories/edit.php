<?php
include_once("../../../config/paths.php");
include_once("../../inc/header.php");
include_once("../../../config/database.php");
?>











<div class="container-fluid py-4">
<div class="row">
    <div class="col-md-12">

<div class="card">
 
    <?php if(isset($_REQUEST['id'])):
   
         $id=$_REQUEST['id'];
$category=fetch("categories",$id);
if($category!=[]):


        ?>

<div class="card-header">
<h4>Edit Category</h4>
    </div>
    <div class="card-body">
<form action="../../hundler/categories/update.php" method="post"   enctype="multipart/form-data">
    <input type="text" hidden name="id" value="<?=$category['id']?>">
<div class="row">

<div class="col-md-12">
<label  class="form-label">Name</label>
      <input type="text" class="form-control" name="name"  placeholder="Enter Category Name" value="<?= $category['name']?>">
    
</div>


<div class="col-md-12">
<label  class="form-label">Upload Image</label>
<input type="text" hidden name="old_image" value="<?= $category['image']?>">
      <input type="file" class="form-control" name="image"  placeholder="Upload Image" >
   <div class="mt-2">
   <img src="../../../uploads/categories/<?=$category['image']?>" alt="" srcset="" height="50px" width="50px">
   </div>
</div>





<div class="col-md-12 ">
<button type="submit" class="btn btn-primary float-end " name="update_category_btn">Save</button>
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
include_once("../../inc/footer.php");?>
