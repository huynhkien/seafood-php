
<?php
if(!isset($_GET['proid']) || $_GET['proid']== null){
    header('Location:404.php');
}else{
    $id = $_GET['proid'];

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
     $quantity = $_POST['quantity'];
     $addtoCart = $cart->add_to_cart($quantity,$id);
}
}
?>

        <?php
        $get_product_details = $product->get_details($id);
        if($get_product_details){
            while($result_details= $get_product_details->fetch_assoc()){
        ?>
    <section class="details">
        	<div class="details--product">
               <div class="product--photo">
                <img src="/admin/uploads/<?php echo $result_details['image'] ?>" width="100%" height="500px" alt="">
                </div>
                <div class="product--tem" style="border:0px solid gray">
    
                    <div class="tem__name"><h2 style=" font-weight:800;padding:5px 20px;"><?php echo $result_details['name_product'] ?></h2></div>  
                    <div style="background-color: #e6e3e3;" class="tem__for">
                    <div class="for_category"><p style="color:#fff;">Danh mục: <span style="font-weight: 800;color:black;"><?php echo $result_details['name_cat'] ?></span></p></div>
                    <div class="for__price">
                       <span><?php echo $result_details['price'] ?>đ</span>
                    </div>
                

                    <form class="add-cart" method="post">
                        <input type="number" class="buyfield" name="quantity" value="1" min="1">
                        <input type="submit" class="buysubmit" name="submit" value="Mua Ngay">
                    </form>  
                    </div>                                    
                </div>  
</div>                            
        
                <div class="details--desc">
                    <div class="desc__title">
                        <h4>Product Description</h4>
                    </div>
                    <div style="width:100%;border-top:1px solid silver">
                        <p>
                        <?php echo $result_details['desc_product'] ?>
                        </p>
                    </div>
                </div>		
            </section>
            <?php
            }
        }
        ?>
