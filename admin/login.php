<?php
   include '../classes/adminlogin.php';
   

?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_admin'])) {
    // The request is using the POST method
    $adminUser = $_POST['adminUser'];
    $adminPass = md5($_POST['adminPass']);
    
    $login_check = $class->login_admin($adminUser, $adminPass);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/admin/css/styleadmin.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/d69fb28507.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
        <div class="logo">
            <img src="../public/images/logo/logo.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Can Tho Sea Food
        </div>
        <span>
            <?php
            if(isset($login_check)){
                echo $login_check;
            }
            ?>
        </span>
        <form class="p-3 mt-3" action="login.php" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="adminUser" id="userName" placeholder="Username" >
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="adminPass" id="pwd" placeholder="Password"  >
            </div>
            <input type="submit" name="submit_admin"id="admin_login" class="admin_login" value="Login">
        </form>
      
    </div>
</body>
</html>