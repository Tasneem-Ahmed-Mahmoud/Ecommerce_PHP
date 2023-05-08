<?php 
include_once("../../../config/migration.php");
session_start();
include_once('../../../config/database.php');

include_once('../../../functions/validation.php');
include_once("../../../functions/file.php");


if(checkRequestMethod('POST')) {
    
    //     print_r($_POST);
    //     print_r($_FILES['image']['name']);
    
    // die;
        foreach($_POST as $key =>$value) {
            $$key= sanitizeInput($value);
        }
$sql="SELECT * FROM `products` WHERE `name` LIKE '%$name%'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){

$products="";
while($row=mysqli_fetch_assoc($res)){
    $id=$row['id'];
    $image=$row['image'];
    $name=$row['name'];
    $products.=<<<TT
    <div class="col-lg-4 col-md-6 col-12 p-1">
    <a href="product_details.php?id=$id class="s"><div class="card shadow"><div class="card-body"><img src="../../uploads/products/$image"  class="w-100 " height="300px"> <h4 class="text-center">$name</h4> </div> </div></a></div>
    TT;

}

echo $products;
}else{
echo 500;
}

    }