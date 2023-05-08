<?php

if(!isset($_SESSION['auth'])){

    $_SESSION['message']="login to continue";
  header('location:../system/login.php');
  die;
}

