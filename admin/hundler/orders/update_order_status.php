



<?php
session_start();
include_once('../../../config/database.php');
include_once('../../../functions/validation.php');

// update status of order


if(checkRequestMethod('POST')){


    foreach($_POST as  $key => $value) {
        $$key=$value;
    }
// print_r($_POST);

$sql="UPDATE `orders` SET `status`='$order_status' WHERE `id`='$order_id'";
// echo $sql;
// die;
$res=mysqli_query($conn,$sql);

if($res){
redirectWith("../../views/orders/view_order.php?order_id=$order_id", 'status updated successfully');
} else {
$_SESSION["errors"]=[ 'Something went wrong'];
    redirect('../../views/orders/view_order.php');
}


}