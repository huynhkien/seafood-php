<?php
if(isset($_GET['id_category_delete'])){
    $id_delete = $_GET['id_category_delete'];
    $delete_cat = $catalog->delete_category($id_delete);
}
?>
<div class="p-5" style="min-height: 600px;">
    <h4>Category Manager</h4>
    <?php
    if(isset($delete_cat)){
        echo $delete_cat;
    }
    ?>
    <a href="?admin=add_category"><button type="button" class="btn btn-outline-primary mt-2 mb-2">Add Category</button></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $show_catalog = $catalog->show_category();
            if($show_catalog){
                $i=0;
             while($result= $show_catalog->fetch_assoc()){
                $i++;
            ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['name_cat'] ?></td>
                    <td>
                        <a href="?admin=edit_category&id=<?php echo $result['id_cat'] ?>">
                            <i class="fa fa-pencil-square-o" style="font-size:30px;margin-right: 10px;"></i></a>
                        <a href="?admin=category&id_category_delete=<?php echo $result['id_cat'] ?>">
                            <i class="fa fa-trash" style="font-size:30px;color:red;"></i></a>
                    </td>
                </tr>

            <?php
            }
        }
            ?>
        </tbody>
    </table>
</div>
