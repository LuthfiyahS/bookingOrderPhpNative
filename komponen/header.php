<?php

@session_start();
include "../koneksi.php";
//@session_start();
$tampil = "select * from barang";
$eksekbarang = mysqli_query($test, "$tampil");
$tampill = "select * from katalog";
$eksekpend = mysqli_query($test, "$tampill");
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Cekin Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Cekin Shop" name="description" />
    <meta content="Cekin Shop" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/logo-ku.png">
    <!-- bootstrap-touchspin -->
    <link href="../assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <!-- leaflet Css -->
    <link href="../assets/libs/leaflet/leaflet.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />



</head>

<body data-layout="horizontal" data-topbar="colored" data-layout-size="boxed">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar" >
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.php" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="../assets/images/logo-ku.png" alt="" height="70">
                            </span>
                            <span class="logo-lg">
                                <img src="../assets/images/logo-ku.png" alt="" height="70">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="uil-search"></span>
                        </div>
                    </form>-->
                </div>
                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="uil-search"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="bx bx-search-alt-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>


                    <?php
                    if (!isset($_SESSION['username'])) {  ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><a href="../login.php" class="d-none d-xl-inline-block ms-1 fw-medium font-size-15" style="color: white;">Login</a></span>

                            </button>
                            <h4 class="uil-angle-down d-none d-xl-inline-block font-size-15" style="color:white;">|</h4>
                            <button type="button" class="btn header-item waves-effect" aria-haspopup="true" aria-expanded="false">


                                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><a href="../register.php" class="d-none d-xl-inline-block ms-1 fw-medium font-size-15" style="color: white;">Sign Up</a></span>

                            </button>
                        </div>
                    <?php
                    } else {

                        $x = $_SESSION['id_user'];
                        $notif = mysqli_query($test, "SELECT COUNT(id_cart) as notif FROM keranjang WHERE id_user='$x'");
                        $ntf = mysqli_fetch_array($notif);
                        $kranjang = "select * from keranjang where id_user='$x'";
                        $cart = mysqli_query($test, "$kranjang"); ?>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-cart-alt" width="50px"></i>
                                <?php
                                if ($ntf['notif'] != 0) {
                                    echo "<span class='badge bg-danger rounded-pill'>" .  $ntf['notif'] . "</span>";
                                }
                                ?>

                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-16"> Keranjang Belanja </h5>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <?php $no = 1;
                                    $bayar = "SELECT nama_barang,foto_barang,harga,kuantitas, (harga*kuantitas) as total FROM barang JOIN keranjang on barang.id_barang=keranjang.id_barang WHERE id_user ='$x'";
                                    $eksekusibayar = mysqli_query($test, "$bayar");
                                    ?>
                                    <tbody>
                                        <?php
                                        $notif = mysqli_query($test, "SELECT COUNT(id_cart) as id_cart FROM keranjang WHERE id_user='$x'");
                                        $ntf = mysqli_fetch_array($notif);
                                        if ($ntf['id_cart'] != 0) {
                                            while ($data = mysqli_fetch_array($eksekusibayar)) :

                                        ?>

                                                <a href="#" class="text-reset notification-item">
                                                    <div class="d-flex align-items-start">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                                    <i class="uil-shopping-basket"><img src="<?php echo "../admin/inputan/" . $data["foto_barang"]; ?>" alt="" class="avatar-title bg-primary rounded-circle font-size-16"></i>

                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1"><?php echo $data['nama_barang'] ?></h6>
                                                            <div class="font-size-12 text-muted">

                                                                <p class="mb-0"><i class="bx bx-money"></i>Rp <?php echo $data['harga'] ?></p>
                                                                <p class="mb-1 float-end"><?php echo $data['kuantitas'] ?>x</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php endwhile;
                                        } else {
                                            ?>
                                            <div class="d-flex align-items-start">
                                                <div class="flex-shrink-0 me-3">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h7 class="mb-1">Anda Belum Memiliki Keranjang belanja, pilih barang dan masukkan kedalam keranjang</h7>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>

                                </div>
                                <?php
                                if ($ntf['id_cart'] != 0) { ?>
                                    <div class="p-2 border-top">
                                        <div class="d-grid">
                                            <a class="btn btn-sm btn-link font-size-14 text-center" href="cart.php">
                                                <i class="uil-arrow-circle-right me-1"></i> Lihat Selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                <?php }
                                ?>

                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="rounded-circle header-profile-user" src="<?php echo $_SESSION['pp']; ?>" alt="Header Avatar"> <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?php echo $_SESSION['nama']; ?></span> <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="profil.php"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">My Profile</span></a>
                                <a class="dropdown-item" href="myorder.php"><i class="uil uil-wallet font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">My Order</span></a>
                                <a class="dropdown-item" href="../logout.php"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="uil-cog"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="topnav">

                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <div class="row">
                                <div class="col-xl-12">
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">
                                                <i class="uil-home-alt me-2"></i> Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="semuabarang.php">
                                                <i class="uil-home-alt me-2"></i> Product
                                            </a>
                                        </li>

                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button">
                                                <i class="uil-flask me-2"></i>Catalog <div class="arrow-down"></div>
                                            </a>

                                            <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl" aria-labelledby="topnav-uielement">
                                                <div class="row">
                                                    <?php while ($data = mysqli_fetch_array($eksekpend)) : ?>
                                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                                            <a href="barang.php?id=<?php echo $data['id_katalog']; ?>" class="dropdown-item"><?php echo $data['nama_katalog']; ?></a>
                                                        </div>



                                                    <?php endwhile; ?>
                                                </div>
                                                <!-- end row -->


                                            </div>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="howtoorder.php">
                                                <i class="uil-home-alt me-2"></i> How To Order
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="tentangkami.php">
                                                <i class="uil-home-alt me-2"></i> Contact
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>