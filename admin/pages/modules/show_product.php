<?php
if(isset($_GET['id_product_delete'])){
    $id_delete = $_GET['id_product_delete'];
    $delete_product = $product->delete_product($id_delete);
}
?>
<div class="p-5" style="min-height: 600px;">
    <h4>Product Manager</h4>
    <?php
    if(isset($delete_product)){
        echo $delete_product;
    }
    ?>
    <a href="?admin=add_product"><button type="button" class="btn btn-outline-primary mt-2 mb-2">Add Product</button></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Type</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $show_product = $product->getproduct();
            if($show_product){
                $i=0;
             while($result= $show_product->fetch_assoc()){
                $i++;
            ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['name_product'] ?></td>
                    <td> <img src="/admin/uploads/<?php echo $result['image'] ?>" width="100px"></td>

                    <td><?php 
                         if($result['type']==0){
                          echo 'Non-Feathered';
                         }elseif($result['type']==1){
                          echo 'Feathered';
                         }else{
                          echo 'Sale';
                         }
                            ?></td>
                     <td><?php echo $result['name_cat'] ?></td>
                    <td><?php echo $result['price'] ?></td>
                    <td width="400px"><?php echo $fm->textShorten($result['desc_product'], 100) ?></td>
                    <td>
                        <a href="?admin=edit_product&id=<?php echo $result['id_product'] ?>">
                            <i class="fa fa-pencil-square-o" style="font-size:30px;margin-right: 10px;"></i></a>
                        <a href="?admin=show_product&id_product_delete=<?php echo $result['id_product'] ?>">
                            <i class="fa fa-trash" style="font-size:30px;color:red;"></i></a>
                    </td>
                </tr>

            <?php
            }
        }
            ?>
        </tbody>
    </table>
    <div style="text-align:center;">
                    <?php $content_all = $product->show_product();
                    $content_count = mysqli_num_rows($content_all);;
                    $content_button = ceil($content_count/4);
                    $i=1;
                   for($i=1;$i<$content_button;$i++){
                    echo '<a style="margin:0 5px;text-decoration:none;background-color:#ccc;padding:5px; " href="?admin=product&trang='.$i.'">'.$i.'</a>';
                    
                   }
                    ?>
                </div>
    </div>
                
     </div>
</div>
