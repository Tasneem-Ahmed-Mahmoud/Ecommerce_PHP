

<?php
include_once("../../../config/paths.php");
include_once("../../inc/header.php");
include_once("../../../config/database.php");





?>


<div class="container">
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">users</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2" id="user_table">

            
<?php 
if(isset($_SESSION["errors"])):?>
<div class="alert alert-danger">
    <?php foreach($_SESSION["errors"] as $error):?>
        <small class="text-white">*<?=$error?></small><br>
        <?php endforeach;?>
</div>
<?php
endif; unset($_SESSION["errors"])
?>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0   table-striped"  id="users_table">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody   id="user_body">
                    <?php 
                    $time=time();
                    if(!empty(fetchAll("users"))): 
                        $index=0;
                        foreach( fetchAll("users") as $user):
                          $status="Offline";
                          $class="bg-gradient-danger";
                          if($user['last_login']>$time){
                            $status="Online";
                            $class="bg-gradient-success";
                          }
                        $index++;
                        ?>
                    <tr>
                    <td class="align-middle px-4">
                        <span class="text-secondary text-xs font-weight-bold"><?= $index?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $user["name"]?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $user["phone"]?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $user["email"]?></span>
                      </td>

                      <td class="align-middle text-center">
                       
                            <img src="../../../uploads/users/<?=$user['image']?>" class="avatar avatar-sm  border-radius-lg" alt="user1">
                        
                      </td>
                      <td class="align-middle text-center">
                      <span class="badge badge-sm btn <?=$class?> " ><?=$status?></span>
           
                      </td>

                      <td class="align-middle  text-center d-flex justify-content-center">


                      <form         action="../../hundler/users/update_role.php"    method="post"   class="me-2">

                      <input type="text" name="id" value="<?=$user['id']?>" hidden>
                      <input type="text" name="role" value="<?=$user['role']?>" hidden>
                        <button 
                        value="<?=$user['id']?>"
                        type="submit" class="badge badge-sm bg-gradient-primary btn " 
                       ><?= $user['role']==0? "Admin":"User"?></button>
                        </form>

                    
                     <div class="me-2">
                        <button 
                        value="<?=$user['id']?>"
                        type="button" class="badge badge-sm bg-gradient-danger btn users_delete_btn" 
                        name="users_delete_btn"
                        id="users"
                        >Delete</button>
                        </div>
                      </td>
                   
                    
                    </tr>
                <?php endforeach; endif;?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>










<?php

include_once("../../inc/footer.php");

?>
