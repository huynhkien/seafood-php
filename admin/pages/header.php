<?php
if (isset($_GET['logout']) == 1) {
    unset($_SESSION['admin']);
    header('location: login.php');
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-secondary">
    <div class="container-fluid">
        <a href="/">
            <img src="../uploads/logo-open-english.jpg" width="100" alt="">
        </a>
        <div>
            <ul class="navbar-nav  mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link " aria-current="page" href="index.php?admin=category">Catalog Manager</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="index.php?admin=product">Product Manager</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="index.php?admin=content">Content Manager</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="index.php?admin=user">User Manager</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="index.php?admin=order">Order Manager</a>
                </li>

            </ul>
        </div>
        <div class="d-flex justify-content-center">
            <!-- <form class="d-flex" method="post" action="index.php?admin=search">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            <a href="index.php?logout=1"><i class="fa fa-sign-out mx-4" style="font-size:35px;color:black"></i></a>
        </div>
    </div>
    </div>
</nav>