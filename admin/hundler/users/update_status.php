<?php 
session_start();
include_once("../../../config/migration.php");
include_once('../../../config/database.php');
include_once('../../../functions/validation.php');



$time=time()+10;
$id=$_SESSION['user']['id'];
update("users",["last_login"=>$time],$id);