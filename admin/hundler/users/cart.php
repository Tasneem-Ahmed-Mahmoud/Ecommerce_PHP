
// session_start();
// if(!isset($_SESSION['auth'])){
//     $_SESSION['message']="login to continue";
//     header("location:../../../frontend/system/login.php");
//     // print_r($_SESSION);
//     die;
// }
// include_once('../../../config/database.php');

// if(isset($_SESSION['auth'])){
//     if(isset($_POST['scope'])){
//         $scope=$_POST['scope'];
//         $product_id=$_POST['id'];
//         $qty=$_POST['qty'];
//         $user_id=$_SESSION['user']['id'];
//         switch($scope){
//             //////////////add
//         case'add':
        
//             $check_exist_cart="SELECT * FROM `carts` WHERE `product_id`='$product_id' AND `user_id`='$user_id'";
//             $res=mysqli_query($conn,$check_exist_cart);
// if(mysqli_num_rows($res)>0){
// echo "existing";
// }else{

//    $res= insert("carts",["user_id"=>$user_id,"product_qty"=>$qty,"product_id"=>$product_id]);
   
//     if($res){
//         echo 201;
//     }else{
//         echo 500 ;
//     }
// }
//             break;
//             /////////////////update
//             case "update":
//          $sql="UPDATE `carts` SET `product_qty`='$qty'  WHERE `user_id`='$user_id' AND `id`='$product_id'";
//          $res=mysqli_query($conn,$sql);
  
//         $res=mysqli_query($conn,$sql);
//         if($res){
//             echo 200;
//         }else{
//             echo 500 ;
//         }

//                 break;
//                 case "delete":
//  $cart_id=$_POST['cart_id'];
// $res=delete("carts",$cart_id);
 
  
//         $res=mysqli_query($conn,$sql);
//         if($res){
//             echo 200;
//         }else{
//             echo 500 ;
//         }



//                     break;
//             default:
//             echo 500;

//         } 
//     }




// }else{
//     echo 401;

