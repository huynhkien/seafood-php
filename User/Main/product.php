<section class="products">
    <div class="product--title"><h2>Sản Phẩm</h2></div>
             <div class="products--items">
<?php
            $product_feathered = $product->getproduct();
            if($product_feathered){
                while($result = $product_feathered->fetch_assoc()){
            ?>
                <div class="item__text">
                    <div class="text--img">
                        <img src="/admin/uploads/<?php echo $result['image'] ?>"alt="">
                        <p style="margin:2px 10px;padding:5px;font-size:16px;"><?php echo $result['name_product'] ?></p>
                    </div>
                    <div class="text--price">
                         <p style="font-size:18px"><?php echo $result['price'] ?>đ
                            <span style="color: black;font-size:12px;">/ 1kg</span>
                         </p>
                    </div>
                    <div class="text--action">
                    <button><a href="index.php?user=detail&proid=<?php echo $result['id_product']?>">Add Cart</a></button>
                    </div>
                </div>
                <?php
            }
        }
                ?>
            </div>
            <div class="container__pagination">
                    <?php $product_all = $product->show_product();
                    $product_count = mysqli_num_rows($product_all);;
                    $product_button = ceil($product_count/5);
                    $i=1;
                   for($i=1;$i<$product_button;$i++){
                    echo '<a style="margin:0 5px;text-decoration:none;background-color:#ccc;padding:5px; " href="index.php?user=product&trang='.$i.'">'.$i.'</a>';
                    
                   }
                    ?>
                </div>
</section>