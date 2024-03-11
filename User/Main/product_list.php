<section class="product__info">
            <div class="info--title">
                    <h2>Bán Chạy Nhất Hôm Nay</h2>
            </div>
            <div class="info--item" id="slider">
            <?php
            $product_feathered = $product->getproduct_feathered();
            if($product_feathered){
                while($result = $product_feathered->fetch_assoc()){
            ?>
                <div class="item__text">
                    <div class="text--img">
                        <img src="/admin/uploads/<?php echo $result['image'] ?>"alt="" draggable="false">
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
                
                 <a class="btn--prev" id="btn--left">❮</a>
                 <a class="btn--next" id="btn--right">❯</a>
            </div>
        </section>

        <section class="sale__product">
            <div class="product--banner">
                <img src="/images/banner_index_1.webp" alt="">
            </div>
            <div class="product--item">
                <div class="item__title"><h2>Sản Phẩm Đang Khuyến Mãi</h2></div>
                <div class="item__info">
                <?php
            $product_feathered = $product->getproduct_SAVE();
            if($product_feathered){
                while($result = $product_feathered->fetch_assoc()){
            ?>
                <div class="item__text">
                    <div class="text--img">
                        <img src="/admin/uploads/<?php echo $result['image'] ?>"alt="" draggable="false">
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
            </div>
</section>