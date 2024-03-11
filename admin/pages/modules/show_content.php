<?php
if(isset($_GET['id_content_delete'])){
    $id_delete = $_GET['id_content_delete'];
    $delete_ct = $ct->delete_content($id_delete);
}
?>
<div class="p-5" style="min-height: 600px;">
    <h4>Content Manager</h4>
    <?php
    if(isset($delete_ct)){
        echo $delete_ct;
    }
    ?>
    <a href="?admin=add_content"><button type="button" class="btn btn-outline-primary mt-2 mb-2">Add Content</button></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Content Title</th>
                <th scope="col">Author</th>
                <th scope="col">Content</th>
                <th scope="col">Date of Writing</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $show_content =$ct->getcontent();
            if($show_content){
                $i=0;
             while($result= $show_content->fetch_assoc()){
                $i++;
            ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['title_content'] ?></td>
                    <th><?php echo $result['author'] ?></th>
                    <th><?php echo $fm->textShorten($result['desc_content'],100) ?></th>
                    <th><?php echo $result['date_write'] ?></th>
                    <td><?php 
                         if($result['type_content']==0){
                          echo 'Product introduction';
                         }elseif($result['type_content']==1){
                          echo 'News';
                         }elseif($result['type_content']==2){
                          echo 'Share knowledge';
                         }else{
                          echo 'Hot';
                         }
                            ?></td>
                    <td> <img src="/admin/uploads/<?php echo $result['image'] ?>" width="100px"></td>
                    <td>
                        <a href="?admin=edit_content&id=<?php echo $result['id_content'] ?>">
                            <i class="fa fa-pencil-square-o" style="font-size:30px;margin-right: 10px;"></i></a>
                        <a href="?admin=content&id_content_delete=<?php echo $result['id_content'] ?>">
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
                    <?php $content_all = $ct->get_all_content();
                    $content_count = mysqli_num_rows($content_all);;
                    $content_button = ceil($content_count/5);
                    $i=1;
                   for($i=1;$i<=$content_button;$i++){
                    echo '<a style="margin:0 5px;text-decoration:none;background-color:#ccc;padding:5px; " href="index.php?admin=content&trang='.$i.'">'.$i.'</a>';
                    
                   }
                    ?>
                </div>
</div>