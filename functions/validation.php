<?php

//check request  method
function checkRequestMethod($method)
{
 if(isset($_SERVER["REQUEST_METHOD"])==$method) {
        return true;
    } else {
        return false;
    }
}


// filter input
function  sanitizeInput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}
// required input
function requiredVal($input){
    if(empty($input)){
        return false;
    }else{
        return true;
    }
}
// get maxmum value for input
function  minVal($input,$lenght){
    if(strlen($input)< $lenght){
        return false;
    }
    return true;
}
// get minumum value for input
function  maxVal($input,$lenght){
    if(strlen($input)>$lenght){
        return false;
    }
    return true;
}


// check if that value aready exist to allow update
function is_found($table,$column,$value,$id,$con){
    $sql="SELECT `name` FROM $table WHERE $column='$value' AND `id`!=$id";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)){
        return true;
    }else{
        return false;
    }

}

// check uniqueness
function is_uniqe($table,$column,$value,$con){
    $sql="SELECT `$column`  FROM `$table` WHERE `$column`='$value' ";

    if(mysqli_num_rows(mysqli_query($con,$sql)) ){
      
        return true;
    }else{
        return false;
    }

}

// check an input is number
function is_number($input){
    if(!is_numeric($input)){
        return false;
    }
    return true;
}

// check is an email

function is_email($email){

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   return false;
  } else {
   return true;
  }
}

// cpassword must contain at least upper case  and number and special char
   function is_password($input)
    {
      
    $regex = "/^(?=.*[A-Z])(?=.*\d).{8,16}+$/";
    if (!preg_match($regex, $input)) {
        return false;
    } else {
        return true;
    }
}
// check is a phone number  
function is_phone($input)
{
    $regex="/^01[0125][0-9]{8}$/";
// 
if (!preg_match($regex, $input)) {
    return false;
} else {
    return true;
}
}
// // redirect with message  function
function redirectWith($url,$message){
    $_SESSION['message']=$message;
    header('location:'.$url);
   die;

}

//  redirect 
function redirect($url){
    header('location:'.$url);
   die;

}