<?php

if(isset($_SESSION['auth'])){
if($_SESSION['role']!=1){
$_SESSION["message"]="'you are not authrized to access this page";
header("location:../../../frontend/system/index.php");
die;
   
}
  

}else{

    $_SESSION['message']="login to continue";
  header('location:../../../frontend/system/login.php');
  die;
}


