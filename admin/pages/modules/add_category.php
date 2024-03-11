<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    $catName = $_POST['catName'];

    $insertCat = $catalog->insert_category($catName);
}
?>
<div class="container-fluid" style="min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-4 ">
            <h5 class="mt-3">Add Category</h5>
            <?php
            if(isset($insertCat)){
                echo $insertCat;
            }
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" name="catName" class="form-control" id="name" aria-describedby="emailHelp">

                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
