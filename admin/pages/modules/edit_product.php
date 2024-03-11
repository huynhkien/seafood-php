<?php
$id = $_GET['id'];
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $updateProduct = $product->update_product($_POST,$_FILES,$id);
}
?>
<div class="container-fluid" style="min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-4 ">
            <h5 class="mt-3">Edit Product</h5>
              <?php
              if(isset($updateProduct)){
                echo $updateProduct;
              }
              ?>

            <form method="POST" action="" enctype="multipart/form-data">
            <?php
            $get_product_by_id = $product->getproductbyid($id);
            if($get_product_by_id){
                while($result_product = $get_product_by_id->fetch_assoc()){
            ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="productName" class="form-control" id="name" aria-describedby="emailHelp" value="<?php echo $result_product['name_product'] ?>">

                </div>
                <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                 <select id="select" name='category' style="padding:10px; width:480px; border-radius:5px;">
                        <?php
                        $cat_list = $catalog->show_category();
                        if($cat_list){
                            while($result= $cat_list->fetch_assoc()){
                        
                        ?>
                        <option 
                        <?php
                        if($result['id_cat']==$result_product['id_cat']){
                          echo 'selected';
                        }
                        ?>
                        
                        value="<?php echo $result['id_cat'] ?>"><?php echo $result['name_cat'] ?></option>
                     <?php
                            }
                        }
                     ?>
                </select>

            
                </div>
                <div class="mb-3">
                    <label for="featured" class="form-label">Featured</label>
                    <select name="select" id="select"  style="padding:10px; width:480px; border-radius:5px;"">
                    <option>Select Type</option>
                    <?php
                      if($result_product['type']==1){
                      ?>
                    <option selected value="1">Feathered</option>
                    <option value="0">Non-Feathered</option>
                    <option value="2">Sale</option>
                    <?php
                      }elseif($result_product['type']==0){
                    ?>
                    <option value="1">Feathered</option>
                    <option selected value="0">Non-Feathered</option>
                    <option value="2">Sale</option>
                    <?php
                      }else{
                    ?>
                    <option value="1">Feathered</option>
                    <option value="0">Non-Feathered</option>
                    <option selected  value="2">Sale</option>
                    <?php
                      }
                    ?>
                  </select>

                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="price"  value="<?php echo $result_product['price']?>">
                </div>
                <div class="mb-3">
                    <label for="desscription" class="form-label">Description</label>
                    <input type="text" name="product_desc" class="form-control"  value="<?php echo $result_product['desc_product']?>">
                </div>
                <div class="mb-3">
                <img src="uploads/<?php echo $result_product['image']?>" alt="" width="150px">
                  <br>
                    <input type="file" name="image" id="" class="form-control">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                <?php
                }
            }
                ?>
            </form>
        </div>
    </div>
</div>
