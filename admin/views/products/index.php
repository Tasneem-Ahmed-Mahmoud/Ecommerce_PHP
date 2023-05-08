




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
                <h6 class="text-white text-capitalize ps-3">Products</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2"  id="products_table">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0   table-striped">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">offer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qountity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody >
                    <?php  if(!empty(fetchAll("products"))): 
                        $index=0;
                        foreach( fetchAll("products") as $product):
                        $index++;
                        ?>
                    <tr>
                    <td class="align-middle px-4">
                        <span class="text-secondary text-xs font-weight-bold"><?= $index?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $product["name"]?></span>
                      </td>

                      <td class="align-middle text-center">
                       
                            <img src="../../../uploads/products/<?=$product['image']?>" class="avatar avatar-sm  border-radius-lg" alt="user1">
                        
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $product["price"]?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $product["offer"]?>%</span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $product["qty"]?>%</span>
                      </td>
                      <td class="align-middle text-center text-center d-flex justify-content-center">
                        <form action="./edit.php" method="post" class="me-2">
                         <input type="text" name="id" hidden value="<?= $product['id']?>">
                        <button type="submit" class="badge badge-sm bg-gradient-primary btn" name="cat_edit_btn">Edit</button>
                        </form>
<!-- <div class="me-2">
<a href="product_edit.php?id=<?=$product['id']?>"           class="badge badge-sm bg-gradient-primary btn"    >Edit</a>
</div> -->
                       
                     <div class="me-2">
                        <button 
                        value="<?=$product['id']?>"
                        type="button" class="badge badge-sm bg-gradient-danger btn product_delete_btn" name="product_delete_btn">Delete</button>
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