<?php




include_once("../../../config/migration.php");
session_start();
include_once('../../../config/database.php');

include_once('../../../functions/validation.php');
include_once("../../../functions/file.php");

$errors=[];
if(checkRequestMethod('POST')){
    foreach($_POST as $key=>$value) {
        $$key=$value;
    }

 
 // validate name
 if(!requiredVal($password)){
    $errors[]="please type the password ";
}

    // validate email
    if(!requiredVal($email)){
        $errors[]="please type the email ";
    }elseif(!is_email($email)){
        $errors[]="invalid email";
    }


    if(empty($errors)){
        $password=sha1($password);
$user=fetchRow("users",["email"=>$email,"password"=>$password]);

if(!empty($user)){
$_SESSION['auth']=true;
$_SESSION['user']=$user;
$_SESSION['role']=$user['role'];



$time=time()+10;
$id=$_SESSION['user']['id'];
update("users",["last_login"=>$time],$id);
// /////////////////////////////////
if($user['role']==1){
   
    redirectWith("../../views/landing/index.php","welcom to dashboard");
  
}else{
    redirectWith('../../../frontend/users/profile.php','logged successfuly');
  
}
// ////////////////////////////////
}else{
    $errors=["invalid cradiniat"];
}
    }

     $_SESSION["errors"]=$errors;
    redirect('../../../frontend/system/login.php');
    
}

