<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
$fm= new Format();
spl_autoload_register(function($className){
    include_once "../classes/".$className.".php";
});
$db = new Database();
$fm = new Format();
$cart = new cart();
$product = new product();
$cont= new contact();
$ct = new content();
$search = new search();
$us = new user();
$order = new order();
$catalog= new category();
$pag= new pagination    (); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin</title>
</head>
<body>
    <?php
    include 'pages/header.php';
    include 'pages/main.php';
    ?>
    
</body>
</html>