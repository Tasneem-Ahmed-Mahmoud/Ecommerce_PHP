<?php
include_once("../../../config/migration.php");
session_start();
include_once('../../../config/database.php');

include_once('../../../functions/validation.php');
include_once("../../../functions/file.php");
// print_r($_SESSION['user']);
// die;
$errors=[];

if(checkRequestMethod('POST')){
   
//  print_r($_FILES['image']);
// die;

$id=$_SESSION['user']['id'];
// echo $id;
//validate image
if(!requiredVal($_FILES['image']['name'])){
    
    $errors[]="uploade image";
}
elseif(is_empty_file('image')){
    $errors[]="this file is empty";
}elseif(max_file_size(3145728,'image')){
    $errors[]="the file size is too large";
}elseif(allwed('image')){
    $errors[]="the file type not allwed uplode .png or .jpg";}

    if(empty($errors)){
        $image= move_file_to_directory('image','users');
        $filepath= tmp_name('image');
        unlink($filepath); // Delete the temp file
        if(update('users',["image"=>$image],$id)){
          
    
            $_SESSION["message"]="image updated ";
        }else{
         $_SESSION["errors"]="error: not inserted";   
        }
        
        }else{
            $_SESSION["errors"]=$errors;
        }
        redirect("../../../frontend/users/profile.php");





}