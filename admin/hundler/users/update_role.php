<?php 
session_start();
include_once("../../../config/migration.php");
include_once('../../../config/database.php');
include_once('../../../functions/validation.php');
include_once("../../../functions/file.php");

$errors=[];
if(checkRequestMethod('POST')) {
//     print_r($_POST);
// die;

    foreach($_POST as $key =>$value){
        $$key= sanitizeInput($value);
    }

if($role==1){
    $role=0;
}else{
    $role =1;
}

$res=update("users",["role"=>$role],$id);
if($res){
    redirectWith("../../views/users/index.php","role updated");
}else{
    $_SESSION['errors']="error";
    redirect("../../views/users/index.php");
}

}