
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
              <div class="bg-gradient-primary shadow-primary border-radius-lg  d-flex align-items-center pt-2 justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Orders</h6>
                <a class="btn btn-warning me-2" href="order_history.php">Order History</a>
              </div>
            </div>
            <div class="card-body px-0 pb-2"  id="orders_table">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0   table-striped">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Traking.No</th>
                 
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                  
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View</th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php  if(!empty(getAllOrders())): 
                        $index=0;
                        foreach( getAllOrders() as $order):
                        $index++;
                        ?>
                    <tr>
                    <td class="align-middle px-4">
                        <span class="text-secondary text-xs font-weight-bold"><?= $index?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $order["user_name"]?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $order["total_price"]?></span>
                      </td>
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $order["traking_no"]?></span>
                      </td>
                     
                      <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=  $order["created_at"]?></span>
                      </td>
                    

                      <td class="align-middle text-center text-center d-flex justify-content-center">

                        <form action="view_order.php" method="post" class="me-2">
                         <input type="text" name="order_id" hidden value="<?= $order['id']?>">
                        <button type="submit" class="badge badge-sm bg-gradient-primary btn" name="view_order">View Details</button>
                        </form>

                       
            
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













 













<?php   include_once("../../inc/footer.php");?>

