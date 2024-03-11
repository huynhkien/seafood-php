
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $key_search = $_POST['key'];
}
?>
 <section class="search">
<div class="search--title"><h2>SẢN PHẨM TÌM KIẾM</h2></div>
<div class="search__product">
                <div class="search--container__product">
                <?php
            $key = $search->search_key($key_search);
            if($key){
                while($result_save = $key->fetch_assoc()){
                    ?>
                <div class="product--items" >
                    <div class="item--img">
                    <img src="/admin/uploads/<?php echo $result_save['image'] ?>" alt="" width="240px" height="250px">
                    <p style="margin:2px 10px;padding:3px;font-size:19px;"><?php echo $result_save['name_product'] ?></p>
                    </div>
                    <div class="item--price">
                         <p style="font-size:17px;margin:5px 4px;"><?php echo $result_save['price'] ?>đ
                            <span style="color: black;font-size:12px;">/ 1kg</span>
                         </p>
                    </div>
                    <div class="item--action">
                    <button><a style="text-decoration:none;color:#fff;" href="index.php?user=detail&proid=<?php echo $result_save['id_product']?>">Add Cart</a></button>
                    </div>
                </div>
                <?php
            }
        }else{
            echo '<div class="alert alert-warning" role="alert">
            Không tìm thấy sản phẩm!!!
          </div>';
        }
                ?>
            </div>
        </div>
        
       
   </div>
</section>
  