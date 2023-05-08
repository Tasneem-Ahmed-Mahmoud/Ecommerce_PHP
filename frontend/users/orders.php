<?php

include_once('../../inc/header.php');
include_once("../../middleware/user.php");
include_once("../../config/database.php");
include_once("../../config/paths.php");

?>



<div class="py-3 bg-primary">
    <div class="container">
        <h4 class="text-white">
            <a href="index.php" target="_blank" rel="noopener noreferrer" class="text-white">Home/</a> 
            <a href="#" target="_blank" rel="noopener noreferrer" class="text-white">My Orders</a>


    </div>
</div>


<div class="container py-5">
    <div class="row">
<div class="col-12">
<table class="table   table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>price</th>
            <th>Date</th>
            <th>View</th>
           
        </tr>
    </thead>
    <tbody>


<?php  if(get_order_items()!=[]): 
$orders=get_order_items();

$index=0;
foreach ($orders as $order):
    $index++;
?>


<tr>
<td><?= $index?></td>
    <td><?=$order["total_price"]?>$</td>
    <td><?=$order["created_at"]?></td>
    <td>
        <form action="order_details.php" method="post">
            <input type="text" name="order_id" value="<?=$order['id']?>" hidden>
            <button type="submit" class="btn btn-info">View Details</button>
        </form>

    </td>
   
</tr>






<?php endforeach;?>


<?php else:  ?>
<tr>
    <td colspan="4" class="text-center"> No orders yet</td>
</tr>
<?php endif; ?>
</tbody>
</table>

    
</div>
    </div>
</div>















<?php   
include_once('../../inc/footer.php');


?> 