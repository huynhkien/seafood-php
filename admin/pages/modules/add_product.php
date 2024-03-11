<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $pd->insert_product($_POST, $_FILES);
}
?>
<div class="container-fluid" style="min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-4 ">
            <h5 class="mt-3">Add Product</h5>
              <?php
              if(isset($insertProduct)){
                echo $insertProduct;
              }
              ?>

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="productName" class="form-control" id="name" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                    <select id="select" name='category'>
                        <option value="">Choose</option>
                        <?php
                        $cat_list = $catalog->show_category();
                        if($cat_list){
                            while($result= $cat_list->fetch_assoc()){
                        
                        ?>
                        <option value="<?php echo $result['id_cat'] ?>"><?php echo $result['name_cat'] ?></option>
                     <?php
                            }
                        }
                     ?>
                    </select>
            
                </div>
                <div class="mb-3">
                    <label for="featured" class="form-label">Featured</label>
                    <select name="select" id="featured" class="form-select">
                    <option value="1">Feathered</option>
                    <option value="0">Non-Feathered</option>
                    <option value="2">Sale</option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" id="price">
                </div>
                <div class="mb-3">
                    <label for="desscription" class="form-label">Description</label>
                    <input type="text" name="product_desc" class="form-control" id="desscription">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <br>
                    <input type="file" name="image" class="form-control" id="image">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
