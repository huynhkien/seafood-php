<?php
if(isset($_GET['id_user'])){
    $id_delete = $_GET['id_user'];
    $delete_user =$us->delete_user($id_delete);
}
?>
<div class="p-5" style="min-height: 600px;">
    <h4>User Manager</h4>
    <?php
    if(isset($delete_user)){
        echo $delete_user;
    }
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name Customer</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $show_user = $us->show_user();
            if($show_user){
                $i=0;
             while($result= $show_user->fetch_assoc()){
                $i++;
            ?>

                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['name_login'] ?></td>
                    <td><?php echo $result['address'] ?></td>
                    <td><?php echo $result['email'] ?></td>
                    <td><?php echo $result['phone'] ?></td>
                    <td>
                        <a href="?admin=edit_user&id=<?php echo $result['id_login'] ?>">
                            <i class="fa fa-pencil-square-o" style="font-size:30px;margin-right: 10px;"></i></a>
                        <a href="?admin=user&id_user=<?php echo $result['id_login'] ?>">
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
