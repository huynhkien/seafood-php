<?php
    $id=$_GET['id'];
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $update_user=$us->update_user($id,$_POST);
    }

?>
<div class="container-fluid" style="min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-4 ">
            
            <h5 class="mt-3">Update User</h5>
              <?php
              if(isset($update_user)){
                echo $update_user;
              }
              ?>

            <form method="POST" action="" enctype="multipart/form-data">
            <?php
           $get_user=$us->get_info_id($id);
            if($get_user){
                while($result = $get_user->fetch_assoc()){
            ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name Customer</label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" value="<?php echo $result['name_login'] ?>">

                </div>
                <div class="mb-3">
                    
                    <input name="pass" type="hidden" class="form-control" id="pass" aria-describedby="emailHelp" value="<?php echo $result['name_login'] ?>">

                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input name="address" type="text" class="form-control" id="address" value="<?php echo $result['address']?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="text"  class="form-control"  value="<?php echo $result['email']?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input name="phone" type="text"  class="form-control"  value="<?php echo $result['phone']?>">
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