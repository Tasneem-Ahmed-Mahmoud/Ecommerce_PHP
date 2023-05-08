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
    // validate  name
   if(!requiredVal($name)){
    $errors[]="please type the name ";
}elseif(!minVal($name,3)){
    $errors[]=" name  must be at least 3 char";
}elseif(!maxVal($name,10)){
    $errors[]=" name  must be less than 10 char";
}else if(is_uniqe('categories','name',$name,$conn)){
    $errors[]="this value aready exist ";
}


//validate image
if(!requiredVal($_FILES['image']['name'])){
    $errors[]="there is no file to upload";
}
elseif(is_empty_file('image')){
    $errors[]="this file is empty";
}elseif(max_file_size(3145728,'image')){
    $errors[]="the file size is too large";
}elseif(allwed('image')){
    $errors[]="the file type not allwed uplode .png or .jpg";}


if(empty($errors)){
    $image= move_file_to_directory('image','categories');
    $filepath= tmp_name('image');
    unlink($filepath); // Delete the temp file
 $res=insert("categories",['name'=>$name,"image"=>$image]);

$res=mysqli_query($conn,$sql);
if($res){
    $_SESSION["message"]="category successfully inserted ";
    
}else{
 $_SESSION["errors"]="error: not inserted";   
}

}else{
    $_SESSION["errors"]=$errors;
}
header('location:../../views/categories/create.php');
die;
}
