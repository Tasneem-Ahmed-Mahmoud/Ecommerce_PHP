<?php
include_once("../../../config/migration.php");
session_start();
include_once('../../../config/database.php');

include_once('../../../functions/validation.php');
include_once("../../../functions/file.php");

$errors=[];
if(checkRequestMethod('POST')){
    // print_r($_POST);

    foreach($_POST as $key =>$value){
        $$key= sanitizeInput($value);
    }
    // validate name
   if(!requiredVal($name)){
    $errors[]="please type the name ";
}elseif(!minVal($name,3)){
    $errors[]=" name  must be at least 3 char";
}elseif(!maxVal($name,20)){
    $errors[]=" name  must be less than 10 char";
}

    // validate email
    if(!requiredVal($email)){
        $errors[]="please type the email ";
    }elseif(!is_email($email)){
        $errors[]="invalid email";
    }else if(is_uniqe('users','email',$email,$conn)){
        $errors[]="this email aready exist ";
    }

    // validate  Phone
    if(!requiredVal($phone)){
        $errors[]="please type the phone ";
    }elseif(!is_phone($phone)){
        $errors[]="invalid phone number";
    }else if(is_uniqe('users','phone',$phone,$conn)){
        $errors[]="this phone aready exist ";
    }

 // validate  Password
 if(!requiredVal($password)){
    $errors[]="please type the password ";
}elseif(!is_password($password)){
    $errors[]="invalid password number";
}
// 
if($password!==$confirm_password){
    $errors[]=" password mismatch";
}

if(empty($errors)){
   $password=sha1($password);
 $res=insert("users",['name'=>$name,"email"=>$email,"password"=>$password,"phone"=>$phone]);

$res=mysqli_query($conn,$sql);
if($res){
    $_SESSION["message"]="register success";
    
}else{
 $_SESSION["errors"]="error: not inserted";   
 redirect('../../../frontend/system/register.php');
}

}else{
    $_SESSION["errors"]=$errors;
    redirect('../../../frontend/system/register.php');
}
redirect('../../../frontend/system/login.php');

}
