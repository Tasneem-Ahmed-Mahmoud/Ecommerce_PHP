








<?php 
session_start();
include_once("../../../config/database.php");
include_once("../../../functions/validation.php");

// print_r($_POST);/
// die;
if(checkRequestMethod('POST')){
    foreach($_POST as $key =>$value) {
        $$key= $value;
    }


    //  print_r($_POST);
    //  die;
        
        $res=update("carts",['product_qty'=>$qty],$id);
        if($res){
    echo 200;
        
    }else{
        echo 500;
        
    }
    
}

