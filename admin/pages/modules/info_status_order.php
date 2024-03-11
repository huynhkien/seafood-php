<?php
if(isset($_GET['id_status_delete'])){
    $id=$_GET['id_status_delete'];
    $delete=$order->delete_status_order($id);

?>
<div class="p-5" style="min-height: 600px;">
    <h4>Info Status Order</h4>
    <?php
    if($delete){
        echo $delete;
    }
}
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Id Order</th>
                <th scope="col">Id User</th>
                <th scope="col">Name User</th>
                <th scope="col">Name Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Status Order</th>
                <th scope="col">Total Price</th>
                <th scope="col">Receive Date</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $show_order = $order->info_status_order();
            if($show_order){
                $i=0;
             while($result_order= $show_order->fetch_assoc()){
                $i++;
            ?>
            
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result_order['id_order'] ?></td>
                    <td><?php echo $result_order['id_user'] ?></td>
                    <td><?php echo $result_order['name_user'] ?></td>
                    <td><?php echo $result_order['name_product'] ?></td>
                    <td><?php echo $result_order['quantity'] ?></td>
                    <td><img src="/admin/uploads/<?php echo $result_order['image'] ?>" alt="" width="100px"></td>
                    <td><?php echo $result_order['price'] ?></td>
                    <td><?php echo $result_order['status_delivery'] ?></td>
                   <?php $total = $result_order['price'] * $result_order['quantity']  + (($result_order['price'] * $result_order['quantity'] )*0.1) ?>
                    <th><?php echo $total ?></th>
                    <td><?php echo $result_order['receive_date'] ?></td>
                    <td><a href="?admin=info_status&id_status_delete=<?php echo $result_order['id_order'] ?>">
                            <i class="fa fa-trash" style="font-size:30px;color:red;"></i></a></td>
                </tr>

            <?php
            }
        }
            ?>
        </tbody>
    </table>
</div>
