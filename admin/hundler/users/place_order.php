<?php

include_once("../../../config/migration.php");
session_start();
include_once('../../../config/database.php');

include_once('../../../functions/validation.php');
include_once("../../../functions/file.php");
$errors=[];
if(checkRequestMethod('POST')) {
    // print_r($_POST);
    // die;

    $user_id=$_SESSION['user']['id'];


    // print_r(getUserCart($user_id));
    // die;
    foreach($_POST as $key =>$value) {
        $$key= sanitizeInput($value);
    }
    $traking_no= "order".rand(1111,99). substr($phone,2);
// validate name
    if(!requiredVal($name)){
        $errors[]="type name please";
    }elseif(!MinVal($name,2)){
        $errors[]="name must be at least 2 char"; 
    }elseif(!MaxVal($name,30)){
        $errors[]="name must be less than 30 char"; 
    
    }
    // validate zip
    if(!requiredVal($zib_code)){
        $errors[]="type zib_code please";
    }elseif(!is_number($zib_code)){
        $errors[]=" zib_code must be number";
    }
    // validate  address
    if(!requiredVal($address)){
        $errors[]="type address please";
    }
 // validate email
 if(!requiredVal($email)){
    $errors[]="please type the email ";
}elseif(!is_email($email)){
    $errors[]="invalid email";
}

// validate  Phone
if(!requiredVal($phone)){
    $errors[]="please type the phone ";
}elseif(!is_phone($phone)){
    $errors[]="invalid phone number";
}
    
    

if(empty($errors)){
   
$value=["total_price"=> $total_price,"zib_code"=>$zib_code,"name"=>$name,"email"=>$email,"phone"=>$phone,"address"=>$address,"user_id"=>$user_id,"traking_no"=>$traking_no];
$res=insert("orders",$value);



if($res){
    $order_id=mysqli_insert_id($conn);
    $cart_items=getUserCart($user_id);


foreach($cart_items as $cart_item){
$product_id=$cart_item["product_id"];
$product_qty=$cart_item["product_qty"];
$product_id=$cart_item["product_id"];
$total_price= ($cart_item["price"] -$cart_item["price"]*($cart_item["offer"]/100))* $cart_item['product_qty'];
$value=["order_id"=>$order_id,"product_id"=>$product_id,"product_qty"=>$product_qty,"total_price"=>$total_price];
$res=insert("order_items",$value);

// update product QTY
$product=fetch("products",$product_id);
$qty=$product["qty"];
$final_qty=$product["qty"]-$product_qty;
if($final_qty>0){
    update("products",["qty"=>$final_qty],$product_id);
}
// delete cart
$sql ="DELETE FROM `carts` WHERE `user_id` ='$user_id'";
$res=mysqli_query($conn,$sql);


    }
    redirect("../../../frontend/users/orders.php","order placed successfully");
    

    
}else{
 $_SESSION["errors"]=["error: not inserted"];   
}
}else{
    $_SESSION["errors"]=$errors;
}
// print_r($_SESSION);

redirect("../../../frontend/users/checkout.php");
    
}









