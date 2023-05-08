




<?php 
session_start();
include_once("../../../config/database.php");
include_once("../../../functions/validation.php");

// print_r($_POST);
// die;
if(checkRequestMethod('POST')){
    foreach($_POST as $key =>$value) {
        $$key= $value;
    }

if(!isset($_SESSION['auth'])){
    echo 501;
}else{


    $res1= fetchRow("carts",["product_id"=>$product_id]);
    //    print_r($res);
    //    die;
       if(empty($res1)){
        $user_id=$_SESSION['user']['id'];
    $res=insert("carts",["user_id"=>$user_id,"product_id"=>$product_id,"product_qty"=>$product_qty]);
    
    if($res){
        echo 200;
    }else{
        echo 500 ;
    }
       }else{
       echo 201;
       }
    

}
 

}



