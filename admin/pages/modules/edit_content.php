<?php
$id=$_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertContent = $ct->update_content($_POST,$_FILES,$id);
}
?>
<div class="container-fluid" style="min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-4 ">
            <h5 class="mt-3">Edit Content</h5>
            <?php
            if(isset($insertContent)){
                echo $insertContent;
            }
            ?>
            <form method="POST" action="" enctype="multipart/form-data">
                <?php
                $get_id_content = $ct->getcontentbyid($id);
                if($get_id_content) {
                    while($result=$get_id_content->fetch_assoc()) {
                ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Title Content</label>
                    <input value="<?php echo $result['title_content'] ?>" type="text" name="title_content" class="form-control" id="name" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input value="<?php echo $result['author'] ?>" type="text" name="author" class="form-control" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="desciption" class="form-label">Description Content</label>
                    <textarea name="desc_content" id="" cols="60" rows="10" class="form-label" ><?php echo $result['title_content'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date of writing</label>
                    <input type="text" name="date_write" class="form-control" value="<?php echo $result['date_write'] ?>">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Content Type</label>
                    <select name="select" id="select" style="padding:10px; width:480px;">
                    <option>Select Type</option>
                    <?php
                      if($result['type_content']==0){
                      ?>
                   <option value="1">News</option>
                    <option selected value="0">Product introduction</option>
                    <option value="2">Share knowledge</option>
                    <option value="3">Hot</option>

                    <?php
                      }elseif($result['type_content']==1){
                    ?>
                    <option selected value="1">News</option>
                    <option value="0">Product introduction</option>
                    <option value="2">Share knowledge</option>
                    <option value="3">Hot</option>

                    <?php
                      }elseif($result['type_content']==2){
                    ?>
                    <option value="1">News</option>
                    <option value="0">Product introduction</option>
                    <option selected value="2">Share knowledge</option>
                    <option value="3">Hot</option>

                    <?php
                      }else{
                    ?>
                    <option value="1">News</option>
                    <option value="0">Product introduction</option>
                    <option  value="2">Share knowledge</option>
                    <option selected value="3">Hot</option>
                    <?php
                      }
                      ?>
                  </select>
                </div>
                <div class="mb-3">
                    <img src="uploads/<?php echo $result['image']?>" alt="" width="150px">
                  <br>
                    <input type="file" name="image" id="">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Update Content</button>
                <?php
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>
