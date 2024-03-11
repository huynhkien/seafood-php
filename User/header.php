<?php
session_start();
if (isset($_GET['logout']) == 1) {
   session_destroy();
   header('location:index.php');  
}
?>
<header>
        <div class="header__brand">
           <div class="brand__logo">
            <img src="../public/images/logo/logo.png" alt="logo">
           </div>
           <div class="brand__search">
            <form class="search__form" action="index.php?user=search" method="post">
            <input class="search__form--text" type="text" name="key" placeholder="Tìm Kiếm...">
            <input class="search__form--button" type="submit" name="search" value="Search" >
            <!-- <i class="fa fa-search"></i> -->
            </form>
            </div>
           <div class="brand__contact">
            <a class="icon-phone" href=""><i class="fa fa-phone" ></i></a>
            <a class="text--header" href="">
            <span class="dropdown" style="display: block;font-size:10px">
                GỌI MUA HÀNG
            </span>
            0949 399 263
            </a>
            <a href="index.php?user=cart" rel="nofollow"><i class="fa-solid fa-cart-shopping" style="padding: 10px; margin:5px; font-size:25px; color:white"> 
            </i>
        </a>
        <?php
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
             echo '<a href="index.php?logout=1"><i class="fa-solid fa-backward"></i></a>';
             echo '<a href="index.php?user=check_order"><i class="fa-solid fa-house"></i></a>';

         }else{
             echo '<a href="index.php?user=login"><i class="fa-solid fa-user"></i></a>';
         } 
         ?>
      

  </div>
        </div>
          
    
    </header>
