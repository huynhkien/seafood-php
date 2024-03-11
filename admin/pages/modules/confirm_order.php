<?php
$id_order=$_GET['id_order'];
$id_user=$_GET['id_user'];
$name_user=$_GET['name_user'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
 $confirm_status= $order->confirm_order($id_order,$id_user,$name_user,$_POST);
}
?>
<?php
if (isset($confirm_status)) {
    echo $confirm_status;
}
?>
<div class="container-fluid" style="min-height: 1000px;">
    <div class="row justify-content-center">
        <div class="col-4 ">
            <h5 class="mt-3">Order confirmation</h5>

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Status confirmation</label>
                    <input type="text" name="status" class="form-control" id="name" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Date of receipt of goods</label>
                    <input type="text" name="date" class="form-control" id="name" aria-describedby="emailHelp">

                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>