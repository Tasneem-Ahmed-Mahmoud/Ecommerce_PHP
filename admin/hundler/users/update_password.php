<?php
include_once("../../../config/migration.php");
session_start();
include_once('../../../config/database.php');

include_once('../../../functions/validation.php');


$errors=[];

if(checkRequestMethod('POST')){
    // print_r($_POST);

    foreach($_POST as $key =>$value){
        $$key= sanitizeInput($value);
    }
 // validate  Password
 if(!requiredVal($old_password)){
    $errors[]="please type the password ";
}
    
 // validate   new Password
 if(!requiredVal($password)){
    $errors[]="please type the new password ";
}elseif(!is_password($password)){
    $errors[]="invalid new password number";
}
// 
if($password!==$confirm_password){
    $errors[]=" password mismatch";
}


if(empty($errors)){
    $id=$_SESSION['user']['id'];

$old_password=sha1($old_password);
$user=fetch("users",$id);
$user_pass=$user["password"];
if($user_pass==$old_password){
    $password=sha1($password);
  $res=  update("users",["password"=>$password],$id);
    if($res){
        $_SESSION['messsage']="password updated successfully";

    }else{
        $errors[]="error occure";
    }
}else{
    $errors[]="old password not correct";
}
// print_r($_SESSION);

redirect("../../../frontend/users/profile.php");
}






}