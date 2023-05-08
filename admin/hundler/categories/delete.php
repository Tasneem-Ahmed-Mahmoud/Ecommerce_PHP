<?php 
session_start();
include_once("../../../config/database.php");
include_once("../../../functions/validation.php");

// print_r($_POST);/
// die;
if(checkRequestMethod('POST')){
    $id=$_POST['id'];
  $product=fetch("categories",$id);
  $image=$product["image"];

     if(delete("categories",$id)){
        if(file_exists("../../../uploads/categories/$image")) {
            unlink("../../../uploads/categories/$image");
        }
    echo 200;
        
    }else{
        echo 500;
        
    }
    
}