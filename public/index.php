<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_login.css">
    <link rel="stylesheet" href="css/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Home</title>

</head>
<body>
    <?php
    include '../User/header.php';
    include '../User/main.php';
    include '../User/footer.php'
    ?>
    
</body>
<script type="text/javascript" src="js/script.js"></script>
</html>