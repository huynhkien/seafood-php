<?php
if (isset($_GET['user'])) {
    $tam = $_GET['user'];
} else {
    $tam = '';
}
if ($tam == 'about') {
    include("Main/about.php");
} elseif ($tam == 'repice') {
    include("Main/recipe.php");
} elseif ($tam == 'contact') {
    include("Main/contact.php");
}elseif($tam == 'product') {
    include("Main/product.php");
}elseif($tam == 'contact'){
    include("Main/contact.php"); 
}elseif($tam == 'detail'){
    include("Main/details.php"); 
}
elseif($tam == 'cart'){
    include("Main/cart.php"); 
}
elseif($tam == 'recipe_detail'){
    include("Main/recipe_details.php"); 
}
elseif($tam == 'recipe'){
    include("Main/recipe.php"); 
}elseif($tam == 'product'){
    include("Main/product.php"); 
}
elseif($tam == 'search'){
    include("Main/search.php"); 
}elseif($tam == 'cart'){
    include("Main/cart.php"); 
}elseif($tam == 'login'){
    include("Main/login.php"); 
}
elseif($tam == 'payment'){
    include("Main/payment.php"); 
}
elseif($tam == 'check_order'){
    include("Main/check_order.php"); 
}elseif($tam == 'update_user'){
    include("Main/edit_user.php"); 
}
else {
    include("Main/list.php");
}
