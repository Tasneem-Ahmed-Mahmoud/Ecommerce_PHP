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
    // validate  name
   if(!requiredVal($name)){
    $errors[]="please type the name ";
}elseif(!minVal($name,3)){
    $errors[]=" name  must be at least 3 char";
}elseif(!maxVal($name,10)){
    $errors[]=" name  must be less than 10 char";
}elseif(is_found('categories','name',$name,$id,$conn)){
    $errors[]="this value aready exist";
}

//validate image
if(!requiredVal($_FILES['image']['name'])&& empty($errors)){
    $res=update("categories",["name"=>$name],$id);
if($res ){
   
    redirectWith("../../views/categories/edit.php?id=$id","category successfully updated ") ;  
}else{
 $_SESSION["errors"]="error: not updated";  
    
 redirect("../../views/categories/edit.php?id=$id") ;  
}

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
    if(update('categories',["name"=>$name,"image"=>$image],$id)){
       
        if(file_exists("../../../uploads/categories/$old_image")) {
        unlink("../../../uploads/categories/$old_image");}

        $_SESSION["message"]="category successfully updated ";
    }else{
     $_SESSION["errors"]="error: not inserted";   
    }
    
    }else{
        $_SESSION["errors"]=$errors;
    }
    redirect("../../views/categories/edit.php?id=$id");
    



}