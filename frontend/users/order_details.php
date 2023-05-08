<?php

include_once('../../inc/header.php');
include_once("../../middleware/user.php");
include_once("../../config/database.php");
include_once("../../config/paths.php");

?>





<div class="py-3 bg-primary">
    <div class="container">
        <h4 class="text-white">
            <a href="index.php" target="_blank" rel="noopener noreferrer" class="text-white">Home/</a> 
            <a href="orders.php" target="_blank" rel="noopener noreferrer" class="text-white">My Orders/</a> Order Detailes



    </div>
</div>

<?php  
$order=[];
if(isset($_POST["order_id"])){
    // echo $_POST["order_id"];
    // die;
   
    $order_id=$_POST["order_id"];
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



<div class="container py-5">
    <div class="row">
<div class="col-12">

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary">
<h5 class="text-white">Order View</h5>
<a href="orders.php" class="btn btn-warning float-end px-5"> <i class="fa fa-reply"></i> Back</a>
    </div>
    <div class="card-body">
<div class="row">


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

 
    <?php 
     $total_prices=0;
    
    if($order_details!=[]):
    // echo "<pre>";
    // print_r($order_details);
        $index=0;
       
        foreach($order_details as $order_detail):
            $index++;
            $total_prices+=$order_detail['total_price_item'];
        ?>
<tr>
    <td class="align-middle"><?= $index?></td>
    <td  class="align-middle"><?=$order_detail['product_name']?></td>
    <td  class="align-middle"><?=$order_detail['total_price_item']?>$</td>
    <td  class="align-middle">
        <img src="../../uploads/products/<?=$order_detail['image']?>" alt="" srcset="" style="width:60px; height:60px">
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
<h4>total price: <span class="float-end"><?=  $total_prices?>$</span></h4>
<hr>

<label for="" class="fw-boald">Status:</label>
<div class="p-1 border mb-3">
<?php if($order["status"]==0){

echo "under process";

}elseif($order["status"]==1){
    echo "cmpleted";


}elseif($order["status"]==2){
    echo "canceled";
}?>
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







<?php   
include_once('../../inc/footer.php');


?> 