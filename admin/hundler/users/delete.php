<?php 
session_start();
include_once("../../../config/database.php");
include_once("../../../functions/validation.php");

// print_r($_POST);/
// die;
if(checkRequestMethod('POST')){
    $id=$_POST['id'];
  $user=fetch("users",$id);
  $image=$user["image"];

     if(delete("users",$id)){
        if(file_exists("../../../uploads/users/$image")) {
            unlink("../../../uploads/users/$image");
        }
    echo 200;
        
    }else{
        echo 500;
        
    }
    
}