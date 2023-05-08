


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
                <h6 class="text-white text-capitalize ps-3">Categories</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2" id="category_table">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0   table-striped">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php  if(!empty(fetchAll("categories"))): 
                        $index=0;
                        foreach( fetchAll("categories") as $category):
                        $index++;
                        ?>
                    <tr>
                    <td class="align-middle px-4">
                        <span class="text-secondary text-xs font-weight-bold"><?= $index?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $category["name"]?></span>
                      </td>

                      <td class="align-middle text-center">
                       
                            <img src="../../../uploads/categories/<?=$category['image']?>" class="avatar avatar-sm  border-radius-lg" alt="user1">
                        
                      </td>
                    

                      <td class="align-middle text-center text-center d-flex justify-content-center">
                      
<form class="me-2" action="./edit.php" method="post">  
  <input type="text" hidden name="id" value="<?=$category['id']?>">
<button  type="submit"           class="badge badge-sm bg-gradient-primary btn"    >Edit</button>
                        </form>
                    
                     <div class="me-2">
                        <button 
                        value="<?=$category['id']?>"
                        type="button" class="badge badge-sm bg-gradient-danger btn categoty_delete_btn" 
                        name="categoty_delete_btn">Delete</button>
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

include_once("../../inc/footer.php");?>