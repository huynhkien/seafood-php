
<?php
if(isset($_GET['id_cart'])){
    $cartId = $_GET['id_cart'];
    $delete_ct = $cart->delete_cart($cartId);
  
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $id_cart = $_POST['id_cart']; 
    $quantity = $_POST['quantity'];
    $update_quantity = $cart->update_quantity_cart($quantity,$id_cart);
    
}
?>
    <section class="cart">
        <div class="cart__title">
            <h2>Cart</h2>
        </div>
        <div class="cart__item" style="padding:50px 0px">
        <?php
             if(isset($update_quantity)){
                echo $update_quantity; 
            }
            ?>
               <?php
                   if (isset($_SESSION['user_id'])) {
            ?>
                     <a href="index.php?user=payment"><button type="button" class="btn btn-outline-primary mt-2 mb-2">Payment</button></a>
    
        

                <?php
                } else {
                ?>
                    <a href="index.php?user=login"><button type="button" class="btn btn-outline-primary mt-2 mb-2">Payment</button></a>
                    <script> alert("Vui lòng đăng nhập để thanh toán")  </script>
                <?php
                }
                ?>
            <table class="table table-striped" >
                <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                   
                    <th scope="col">Quantity</th>
                    <th scope="col">Toltal Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $get_product_cart = $cart->get_product_cart();
                if($get_product_cart){
                    $sub_total =0;
                    while($result = $get_product_cart->fetch_assoc()){
                        
                ?>
                <tr>
                    <td><?php echo $result['name_product'] ?></td>
                    <td><img src="/admin/uploads/<?php echo $result['image'] ?>" alt=""  width="100px"></td>
                    <td><?php echo $result['price'] ?></td>
                    <td>
                        <form method="POST">
                        <input type="hidden" name="id_cart"  value="<?php echo $result['id_cart'] ?>">
                        <input type="number" name="quantity" id="" min="1" value="<?php echo $result['quantity'] ?>">
                        <input type="submit" value="Update" name="submit">
                        </form>
                        
                    </td>
                    <?php $total = $result['price'] * $result['quantity']?>
                    <td><?php echo $total ?></td>
                </td>
                    <td><a href="index.php?user=cart&id_cart=<?php echo $result['id_cart'] ?>"><i class="fa fa-trash" style="font-size:30px;color:red;"></i></a></td>

                </tr>
                <?php
                 $sub_total += $total;
                    }
                   
                }
                ?>
                </tbody>
            </table>
            <div class="subtotal" style="padding:20px 0px;">
                <div class="subtotal__items">
                    <label>Sub Total :</label>
                    <span>
                        <?php 
                        $sub=0;
                    if(empty($sub_total)){
                        echo $sub;
                    }else{
                        echo $sub_total;
                    }          
                       ?>
                    </span>

                </div>
                <div class="subtotal__items">
                    <label>VAT: </label>
                    <span>10%</span>
                </div>
                <div class="subtotal__items">
                    <label>Total:</label>
                    <span><?php 
                    
                    if(empty($sub_total)){
                        echo  0;
                    }else{
                        echo $sub_total + $sub_total*0.1;
                    }
                    ?></span>
                </div>
            </div>
            
            </div>
        </div>
    
    </section>