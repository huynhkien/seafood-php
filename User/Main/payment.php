
<?php
 if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $insert_order = $order->create_order($id);
 }
?>
<?php
if(isset($insert_order) && isset($_GET['id'])){
?>
<script> alert("Bạn đã đặt hàng thành công");
</script>
<?php } ?>
    <main>
       <form method="post" >
        <div class="payment">
        <div class="payment__cart py-4"  style="text-align:center;">
        <h2 >Thông Tin Giỏ Hàng</h2>
            <table class="cart__pay table table-striped" >
                
                <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Toltal Price</th>
                </tr>
                <?php
                if (isset($_SESSION['user_id'])) {
                $get_product_cart = $cart->get_product_cart();
                if($get_product_cart){
                    $sub_total =0;
                    while($result = $get_product_cart->fetch_assoc()){
                        
                ?>
                <tr style="text-align:center;">
                    <td><?php echo $result['name_product'] ?></td>
                    <td><img src="/admin/uploads/<?php echo $result['image'] ?>" alt=""  width="100px"></td>
                    <td><?php echo $result['price'] ?></td>
                    <td>
                        <?php echo $result['quantity'] ?>
                    </td>
                    <td><?php $total = $result['price'] * $result['quantity']?>
                    <?php echo $total ?>
                <?php
                 $sub_total += $total;
                    }
                   
                }
                ?>
                 <tr >
                    <th>Sub Total :</th>
                    <td colspan="4" >
                        <?php 
                        $sub=0;
                    if(empty($sub_total)){
                        echo $sub;
                    }else{
                        echo $sub_total;
                    }  

                       ?>
                    </td>

                </tr>
                <tr>
                    <th>VAT: </th>
                    <td colspan="4">10%</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td colspan="4"><?php 
                    
                    if(empty($sub_total)){
                        echo  0;
                    }else{
                        echo $sub_total + $sub_total*0.1;
                    }
                }
                    ?></td>
                </tr>
                </table>
                </div>
                <div class="payment__item py-4">
                    <h2>Thông Tin Khách Hàng</h2>
                    <?php
                     if (isset($_SESSION['user_id'])) {
                        $user_id=$_SESSION['user_id'];
                        $select = $us->get_info_id($user_id);
                            if( $result_user = $select->fetch_assoc()){
                     

                    ?>
           <table class="items--info table table-striped">
            <tr>
                <td><label for="">Họ và Tên:</label></td>
                
                <td><?php echo $result_user['name_login'] ?></td>
            </tr>
            <tr>
                <td><label for="">Địa Chỉ:</label></td>
                <td><?php echo $result_user['address'] ?></td>
            </tr>
            <tr>
                <td><label for="">Email:</label></td>
                <td><?php echo $result_user['email'] ?></td>
            </tr>
            <tr>
                <td><label for="">Phone:</label></td>
                <td><?php echo $result_user['phone'] ?></td>
            </tr>
        
           </table>
           <?php
                     }
                    }
           ?>
           </div>
           </div>
           <div class="text-center">
           <a  href="index.php?user=payment&id=<?php echo $user_id ?>"><button type="button" class="btn btn-outline-primary mt-2 mb-2">Order</button></a>
           </div>
        </form>
    </main>