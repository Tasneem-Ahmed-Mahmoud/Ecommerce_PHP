<?php 
session_start();
include_once("../../../config/database.php");
include_once("../../../functions/validation.php");

// print_r($_POST);/
// die;
if(checkRequestMethod('POST')){
    $id=$_POST['id'];
  $product=fetch("products",$id);
  $image=$product["image"];

     if(delete("products",$id)){
        if(file_exists("../../../uploads/products/$image")) {
            unlink("../../../uploads/products/$image");
        }
    echo 200;
        
    }else{
        echo 500;
        
    }
    
}