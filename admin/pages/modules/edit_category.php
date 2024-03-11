<?php
$id=$_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // The request is using the POST method
    $name_cat=$_POST['catName'];
    $insertCat = $catalog->update_category($name_cat,$id);
}
?>
<div class="container-fluid" style="min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-4 ">

            <h5 class="mt-3">Edit Category</h5>
            <?php
            if(isset($insertCat)){
                echo $insertCat;
            }
            ?>
            <?php
            $get_cat_id= $catalog->getcatbyid($id);
            if($get_cat_id){
              while($result=$get_cat_id->fetch_assoc()){
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="catName" class="form-control" id="name" aria-describedby="emailHelp" value="<?php echo $result['name_cat'] ?>">

                </div>

                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </form>
            <?php
              }
            }
            ?>
        </div>
    </div>
</div>