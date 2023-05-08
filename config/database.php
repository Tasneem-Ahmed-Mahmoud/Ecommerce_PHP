<?php

define("DB_HOST","localhost");
define("DB_NAME","Ecommerce2");
define("DB_PASSWORD","");
define("DB_USER","root");

// connection
$conn= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$conn){
    die ("connection faild:".mysqli_connect_error());
  
}
    
// insert into table
function insert($table,$array){
    global $conn;
    $keys="";
    $values="";
    foreach($array as $key => $value){
        $keys.="`$key`,";
        $values.="'$value',";
    }
$keys=substr($keys,0,-1);
$values=substr($values,0,-1);
$sql="INSERT INTO $table($keys)VALUES($values)";
// echo $sql;
// die;
$res=mysqli_query($conn,$sql);
if($res){
    return true;
}else{
   
     return false;
}
}
// update table
function update($table,$array,$id){
    global $conn;
    $data="";
foreach($array as $key => $value){
    $data.="`$key`='$value',";
}
$data=substr($data,0,-1);
    $sql="UPDATE $table SET $data  WHERE `id`='$id'";
// echo $sql
// ;
// die;
    $res=mysqli_query($conn,$sql);
if($res){
    return true;
}else{
    return false;
}
}
// delet items from table
function delete($table,$id){
    global $conn;
    $sql="DELETE FROM $table  WHERE `id`='$id'";

    $res=mysqli_query($conn,$sql);
    if($res){
        return true;
    }else{
        return false;
    }
}

//fetch all data from table
function fetchAll($table){
    global $conn;
    $sql="SELECT * FROM $table";
    $res=mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
        return $data;
    }
}

// fatch one row
function fetch($table,$id){
    global $conn;
 $sql="SELECT * FROM $table WHERE `id`='$id'";
 $res=mysqli_query($conn,$sql);
$data=[];
if(mysqli_num_rows($res)>0){
   $data=mysqli_fetch_assoc($res);
}
    return $data;
}


// //////////////////////////////////////////////////////////////////////////////////////////


// update table
function fetchRow($table,$array){
    global $conn;
    $query="";
foreach($array as $key => $value){
    $query.=" `$key`='$value' AND";
}
$query=substr($query,0,-1);
$query=substr($query,0,-1);
$query=substr($query,0,-1);
    $sql="SELECT * FROM  $table   WHERE $query";
// echo $sql;
// die;
    $res=mysqli_query($conn,$sql);
    $data=[];

    if(mysqli_num_rows($res)>0){
       $data=mysqli_fetch_assoc($res);
    }
        return $data;

}







// update table
function fetchRows($table,$array){
    global $conn;
    $query="";
foreach($array as $key => $value){
    $query.=" `$key`='$value' AND";
}
$query=substr($query,0,-1);
$query=substr($query,0,-1);
$query=substr($query,0,-1);
    $sql="SELECT * FROM  $table   WHERE $query";
// echo $sql;
// die;
    $res=mysqli_query($conn,$sql);
    $data=[];

    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $data[]=$row;
        }
       
    }
    return $data;
}

//get user cart
function getUserCart($user_id){
    global $conn;
$sql="SELECT carts.id as `cart_id` ,`product_id` ,`user_id` ,product_qty,
products.name as product_name, `price`,`offer`, products.image as product_image FROM `products`
 INNER JOIN `carts`  
ON products.id=product_id AND carts.user_id='$user_id'
ORDER By carts.id DESC;
";

$res=mysqli_query($conn,$sql);
$carts=[];
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res))
    $carts[]=$row;
}

return $carts;


}




function get_order_items(){
    global $conn;
    $user_id=$_SESSION['user']['id'];
    $sql="SELECT * FROM `orders` WHERE `user_id`='$user_id' ORDER BY `id` DESC";
    
$res=mysqli_query($conn,$sql);
$orders=[];
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res))
    $orders[]=$row;
}

return $orders;

}


// get order details
function get_order_details($order_id){
    global $conn;
    $user_id=$_SESSION['user']['id'];
$sql="SELECT * FROM `orders` WHERE `user_id`='$user_id' AND `id`='$order_id'";
$res=mysqli_query($conn,$sql);
$order=[];
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res))
    $order[]=$row;
}

return $order;

}

// get details of order
function get_details_of_order($order_id){
    global $conn;
    $user_id=$_SESSION['user']['id'];
    $sql="SELECT  user_id , order_items.total_price as total_price_item , product_qty,orders.total_price as total_price,image 
    ,products.name as product_name ,products.price as price ,products.offer as offer  FROM orders INNER JOIN order_items
    INNER JOIN products ON order_items.product_id=products.id AND orders.id=order_items.order_id AND user_id='$user_id' 
     AND `order_id`='$order_id'";

$res=mysqli_query($conn,$sql);
$order=[];
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res))
    $order[]=$row;
}

return $order;

}







//get trending product
function getLastesProduct(){
    global $conn;
    $sql="SELECT * FROM `products` oRDER BY `id` DESC LIMIT 10";
    // return $sql;
    $res=mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res))
        $data[]=$row;
    }

    return $data;
    }



    //get all orders 
function getAllOrders(){
    global $conn;
    $sql="SELECT orders.* , users.name as user_name  FROM `orders` INNER JOIN `users` ON user_id=users.id AND `status`='0'";
    // return $sql;
    $res=mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res))
        $data[]=$row;
    }

    return $data;
    }




    
    //get all orders 
function getOrdersHistory(){
    global $conn;
    $sql="SELECT orders.* , users.name as user_name  FROM `orders` INNER JOIN `users` ON user_id=users.id AND `status`!='0'";
    // return $sql;
    $res=mysqli_query($conn,$sql);
    $data=[];
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res))
        $data[]=$row;
    }

    return $data;
    }
?>