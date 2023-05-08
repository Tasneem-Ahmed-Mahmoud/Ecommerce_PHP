<?php 
session_start();
include_once("../../../config/migration.php");
include_once('../../../config/database.php');
include_once('../../../functions/validation.php');



$time=time();
$id=$_SESSION['user']['id'];
fetch("users",$id);

$html="";
    $index=0;
    foreach( fetchAll("users") as $user){
      $status="Offline";
      $class="bg-gradient-danger";
      if($user['last_login']>$time){
        $status="Online";
        $class="bg-gradient-success";
      }
    $index++;
$id=$user['id'];
$name=$user["name"];
$phone=$user["phone"];
$email=$user["email"];
$image=$user['image'];
$role=$user['role'];
if($user['role']==0){
    $usrt_role="Admin";
}else{
    $usrt_role="User";
}
$html.=<<<TYP
<tr><td class="align-middle px-4"> <span class="text-secondary text-xs font-weight-bold"><?= $index?></span></td><td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold">  $name</span></td> <td class="align-middle text-center"> <span class="text-secondary text-xs font-weight-bold"> $"phone</span> </td><td class="align-middle text-center"><span class="text-secondary text-xs font-weight-bold"> $email</span></td><td class="align-middle text-center"> <img src="../../../uploads/users/$image" class="avatar avatar-sm  border-radius-lg" alt="user1">
</td> <td class="align-middle text-center"><span class="badge badge-sm btn $class " >$status</span></td><td class="align-middle  text-center d-flex justify-content-center"><form action="../../hundler/users/update_role.php"    method="post"   class="me-2"><input type="text" name="id" value="$id" hidden><input type="text" name="role" value="$role" hidden><button value="$id" type="submit" class="badge badge-sm bg-gradient-primary btn "  >$usrt_role</button></form><div class="me-2"><button value="$id" type="button" class="badge badge-sm bg-gradient-danger btn users_delete_btn"  name="users_delete_btn" id="users">Delete</button></div></td></tr>
TYP;
    }

echo $html;




