<?php
include "../jegal.php";
include "../koneksi.php";


@session_start();
if($_SESSION["level"]=='User'){
	unset($_SESSION["username"]);
session_destroy();
header("location:../login.php");
}


?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Cekin Shop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="Cekin Shop" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="../assets/images/logo-ku.png">

	<!-- DataTables -->
	<link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="../assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- Bootstrap Css -->
	<link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>

<body>
	<!-- <body data-layout="horizontal" data-topbar="colored"> -->
	<!-- Begin page -->
	<div id="layout-wrapper">
		<header id="page-topbar">
			<div class="navbar-header">
				<div class="d-flex">
					<!-- LOGO -->
					<div class="navbar-brand-box">
						<a href="index.php" class="logo logo-dark">
							<span class="logo-sm">
								<img src="../assets/images/logo-sm.png" alt="" height="22">
							</span>
							<span class="logo-lg">
								<img src="../assets/images/logo-ku2.png" alt="" height="25">
							</span> </a>
						<a href="index.php" class="logo logo-light"> <span class="logo-sm">
								<img src="assets/images/logo-sm.png" alt="" height="22">
							</span> <span class="logo-lg">
								<img src="../assets/images/logo-light.png" alt="" height="20">
							</span> </a>
					</div>
					<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
					
				</div>
				<div class="d-flex">
					
					<div class="dropdown d-none d-lg-inline-block ms-1">
						<button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
							<i class="bx bx-fullscreen"></i>
						</button>
					</div>
					<div class="dropdown d-inline-block">
					<button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="rounded-circle header-profile-user" src="<?php echo $_SESSION['pp'];?>" alt="Header Avatar"> <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?php echo $_SESSION['nama'];?></span> <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
						<div class="dropdown-menu dropdown-menu-end">
							<!-- item--><a class="dropdown-item" href="profil.php?id=<?php echo $_SESSION['id_user'];?>"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">My Account</span></a> <a class="dropdown-item" href="../logout.php"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
						</div>
					</div>
					<div class="dropdown d-inline-block">
						<button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect"> <i class="uil-cog"></i> </button>
					</div>
				</div>
			</div>
		</header>