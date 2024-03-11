<?php
if (isset($_GET['id_delivery'])) {
    $id=$_GET['id_delivery'];
    $delete_order = $order->delete_status_order($id);
 }
?>
<?php
if(isset($_GET['id_check'])){
    $id_check=$_GET['id_check'];
    $cofirm = $order->update_status_order($id_check);
}
?>
<div class="p-5" style="min-height: 600px;">
    <h4>Order Manager</h4>
    <?php if(isset( $_SESSION['user_id'] )){ 
        $id=$_SESSION['user_id'] ;
        ?>
        
    <a href="?user=update_user&id=<?php echo $id ?>"><button type="button" class="btn btn-outline-primary mt-2 mb-2">Update Info User</button></a>
    <?php }?>
    <?php
    if(isset($delete_order)){
    ?>
    <script> alert("Bạn chắc chắn xóa đơn hàng!!!") </script>
    <?php } ?>
    <?php
    if(isset($cofirm)){
    ?>
    <script> alert("Cảm ơn bạn đã mua hàng tại Cần Thơ Sea Food") </script>
    <?php } ?>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name User</th> 
                <th scope="col">Name Product</th>
                <th scope="col">Status Delivery</th>
                <th scope="col">Recived Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
            $show_order = $order->check_order($user_id);
            if($show_order){
                $i=0;
             while($result= $show_order->fetch_assoc()){
                $i++;
            ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['name_user'] ?></td>
                    <td><?php echo $result['name_product'] ?></td>
                    <td><?php echo $result['status_delivery'] ?></td>
                    <td><?php echo $result['receive_date'] ?></td>
                    <td  ><a href="?user=check_order&id_delivery=<?php echo $result['id_delivery'] ?>">
                    <i class="fa fa-trash" style="font-size:30px;color:red;margin-right:10px;"></i>
                </a>
                <a href="?user=check_order&id_check=<?php echo $result['id_delivery'] ?>" style="text-decoration:none;">
                <i class="fa-solid fa-check" style="font-size:30px;color:green;"></i>
                </a>
            </td>
                    
                </tr>

            <?php
             }
            }
            }
            ?>
        </tbody>
    </table>
</div>