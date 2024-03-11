<?php
if (isset($_GET['admin'])) {
    $tam = $_GET['admin'];
} else {
    $tam = '';
}
if ($tam == 'product') {
    include("modules/show_product.php");
}elseif ($tam == 'add_product') {
    include("modules/add_product.php");
}elseif($tam=='edit_product'){
    include("modules/edit_product.php");
}elseif($tam=='category'){
    include("modules/show_category.php");
}elseif($tam=='edit_category'){
    include("modules/edit_category.php");
}elseif($tam=='content'){
    include("modules/show_content.php");
}elseif($tam=='add_category'){
    include("modules/add_category.php");
}
elseif($tam=='add_content'){
    include("modules/add_content.php");
}
elseif($tam=='edit_content'){
    include("modules/edit_content.php");
}
elseif($tam=='user'){
    include("modules/show_user.php");
}
elseif($tam=='order'){
    include("modules/show_order.php");
}
elseif($tam=='confirm_order'){
    include("modules/confirm_order.php");
}
elseif($tam=='info_status'){
    include("modules/info_status_order.php");
}
elseif($tam=='edit_user'){
    include("modules/edit_user.php");
}
else{
    include("modules/show_product.php"); 
}
?>