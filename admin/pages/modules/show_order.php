
<div class="p-5" style="min-height: 600px;">
    <h4>Order Manager</h4>
    <a href="?admin=info_status"><button type="button" class="btn btn-outline-primary mt-2 mb-2">Info Status Order</button></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name Customer</th>
                <th scope="col">Adress</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Name Product</th>
                <th scope="col">Image</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">VAT</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $show_order = $order->show_order();
            if($show_order){
                $i=0;
             while($result_order= $show_order->fetch_assoc()){
                $i++;
            ?>
            
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result_order['name_login'] ?></td>
                    <td><?php echo $result_order['address'] ?></td>
                    
                    <td><?php echo $result_order['email'] ?></td>
                    <td><?php echo $result_order['phone'] ?></td>
                    <td><?php echo $result_order['name_product'] ?></td>
                    <td><img src="/admin/uploads/<?php echo $result_order['image'] ?>" alt="" width="100px"></td>
                    <td><?php echo $result_order['quantity'] ?></td>
                    <td><?php echo $result_order['price'] ?></td>
                    <td>10%</td>
                   <?php $total = $result_order['price'] * $result_order['quantity']  + (($result_order['price'] * $result_order['quantity'] )*0.1)?>
                    <th><?php echo $total ?></th>
                    <td>
                        <a href="?admin=confirm_order&id_order=<?php echo $result_order['id_order'] ?>&id_user=<?php echo $result_order['id_login'] ?>&name_user=<?php echo $result_order['name_login'] ?>">
                        <img src="../../../public/images/icon/icon-done.png" alt="" width="30px"></i> 
                    </a>
                    </td>
                </tr>

            <?php
            }
        }
            ?>
        </tbody>
    </table>
</div>
