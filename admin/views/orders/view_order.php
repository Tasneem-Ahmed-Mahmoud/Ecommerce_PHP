
<?php
include_once("../../../config/paths.php");
include_once("../../inc/header.php");
include_once("../../../config/database.php");
?>










<?php  
$order=[];
if(isset($_REQUEST["order_id"])){
    // echo $_POST["order_id"];
    // die;
   
    $order_id=$_REQUEST["order_id"];
    $order_details=get_details_of_order($order_id);
   $order= get_order_details($order_id)[0];
//    print_r($order);
//    echo $order['name'];
//    die;
if($order==[]){?>

    <h4 class="text-center">smething went wrong</h4>
    <?php die;};
}else{
   ?>
   <h4 class="text-center">smething went wrong</h4>

<?php die; };?>



<div class="container ">
    <div class="row">
<div class="col-12">

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary">
<h5 class="text-white">Order View</h5>
<a href="index.php" class="btn btn-warning float-end px-5"> <i class="fa fa-reply"></i> Back</a>
    </div>
    <div class="card-body">
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
<div class="row col-6">
    <h2 class="p-1">Delivery Details:</h2>
    <hr>
    <!-- start -->
    <div class="col-12 py-2">
        <label class="fw-bold">Name:</label>
        <div class="border p-1">
            <h6 class=""><?=$order['name']?></h6>
        </div>
    </div>
    <!-- end -->
     <!-- start -->
     <div class="col-12 py-2">
        <label class="fw-bold">Email:</label>
        <div class="border p-1">
            <h6 class=""><?=$order['email']?></h6>
        </div>
    </div>
    <!-- end -->
     <!-- start -->
     <div class="col-12 py-2">
        <label class="fw-bold">Phone:</label>
        <div class="border p-1">
            <h6 class=""><?=$order['phone']?></h6>
        </div>
    </div>
    <!-- end -->


     <!-- start -->
     <div class="col-12 py-2">
        <label class="fw-bold">Address:</label>
        <div class="border p-1">
            <h6 class=""><?=$order['address']?></h6>
        </div>
    </div>
    <!-- end -->

      <!-- start -->
      <div class="col-12 py-2">
        <label class="fw-bold">Zib Code:</label>
        <div class="border p-1">
            <h6 class=""><?=$order['zib_code']?></h6>
        </div>
    </div>
    <!-- end -->
</div>

<div class="col-6 row">
    <h2 class="pt-1">Order Details:</h2>
    <hr>
<div class="row">
    <div class="col-12">
    <table class="table">
    <thead>
        <td>#</td>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Quantity</th>
    </thead>
    <tbody>

 
    <?php if($order_details!=[]):
    // echo "<pre>";
    // print_r($order_details);
        $index=0;
        $total_prices=0;
        foreach($order_details as $order_detail):
            $index++;
            $total_prices+=$order_detail['total_price'];
           
            $selling_price=$order_detail["price"] - $order_detail["price"]*($order_detail["offer"]/100);
 ;       ?>
<tr>
    <td class="align-middle"><?= $index?></td>
    <td  class="align-middle"><?=$order_detail['product_name']?></td>
    <td  class="align-middle"><?=$selling_price?>$</td>
    <td  class="align-middle">
        <img src="../../../uploads/products/<?=$order_detail['image']?>" alt="" srcset="" style="width:60px; height:60px">
    </td>
    <td  class="align-middle"><?=$order_detail['product_qty']?></td>
</tr>



    <?php endforeach;
 endif;
 
//  print_r($order);
//  die;
 
 ?>

    </tbody>
</table>
<hr>
<h4>total price: <span class="float-end"><?= $total_prices?>$</span></h4>
<hr>


<label for="" class="fw-boald">Status:</label>
<div class="mb-3">

<form action="../../hundler/orders/update_order_status.php" method="post">
    <input type="text" name="order_id" hidden value="<?=$order['id']?>">
<select name="order_status" id="" class="form-select" name="status">
<option value="0"   <?php if($order["status"]==0){echo "selected";}?> >Under process</option>
<option value="1"     <?php if($order["status"]==1){echo "selected";}?>>Completed</option>
<option value="2"     <?php if($order["status"]==2){echo "selected";}?>>CAnceled</option>
</select>
<div class="mt-3 float-end">
    <button class="btn btn-primary" type="submit" name="update_status">Update Status</button>
</div>
</form>

</div>
    </div>
</div>
</div>
</div>


    </div>
</div>



</div>
    </div>
</div>

















<?php   include_once("../../inc/footer.php");?>

