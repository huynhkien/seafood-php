<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertContent = $ct->add_to_content($_POST, $_FILES);
}
?>
<div class="container-fluid" style="min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-4 ">
            <h5 class="mt-3">Add Content</h5>
            <?php
            if(isset($insertContent)){
                echo $insertContent;
            }
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Title Content</label>
                    <input type="text" name="title_content" class="form-control" id="name" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                <label for="category" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="desciption" class="form-label">Description Content</label>
                    <textarea name="desc_content" id="" cols="60" rows="10" class="form-label" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date of writing</label>
                    <input type="text" name="date_write" class="form-control" id="desscription">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Content Type</label>
                    <select name="select" id="select">
                    <option>Select Type</option>
                    <option value="1">News</option>
                    <option value="0">Product introduction</option>
                    <option value="2">Share knowledge</option>
                    <option value="3">Hot</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <br>
                    <input type="file" name="image" class="form-control" id="image">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Add Content</button>
            </form>
        </div>
    </div>
</div>
