<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from pesanan ";
$eksekusi = mysqli_query($test, "$tampil");
$bayar = "select * from pembayaran";
$eksekbayar = mysqli_query($test, "$bayar");

$usr = mysqli_query($test, "Select COUNT(id_user) as jumlah_user From user");
$jmlusr = mysqli_fetch_array($usr);

$tampilusr = "select * from user";
$ekseuser = mysqli_query($test, "$tampilusr");

$tampilbarang = "select id_barang,COUNT(*) as jumlah_pesanan,ROUND((COUNT(id_barang)/(SELECT COUNT(*) FROM detail_pesanan))*100,0) AS Prosentase from detail_pesanan GROUP by id_barang limit 5";
$eksebarang = mysqli_query($test, "$tampilbarang");
$grow = mysqli_query($test, "select week, id_pesanan, if(@last_entry = 0, 0, round(((id_pesanan - @last_entry) / @last_entry) * 100,2)) 'growth rate', @last_entry := id_pesanan from (select @last_entry := 0) x, (select week, sum(id_pesanan) id_pesanan from (select week(tgl_pesanan) as week,COUNT(id_pesanan) as id_pesanan from pesanan group by month(tgl_pesanan)) week_sales group by week) y GROUP by week desc limit 1");
$jmlgrowmingguan = mysqli_fetch_array($grow);

?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Cekin Shop</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="total-revenue-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1">Rp <span data-plugin="counterup">
                                        <?php
                                        $subtot = mysqli_query($test, "SELECT sum(kuantitas) as jmlorder, sum(harga*kuantitas) as subtotal FROM barang JOIN detail_pesanan on barang.id_barang=detail_pesanan.id_barang");
                                        $datasub = mysqli_fetch_array($subtot);
                                        echo $datasub['subtotal']
                                        ?>
                                    </span></h4>
                                <p class="text-muted mb-0">Total Income</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="float-end mt-2">
                                <div id="customers-chart"> </div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1"><span data-plugin="counterup"><?php echo $jmlusr['jumlah_user']; ?></span></h4>
                                <p class="text-muted mb-0">User Active</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end col-->
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-end mt-2">
                                <div id="growth-chart"></div>
                            </div>
                            <div>
                                <h4 class="mb-1 mt-1">+ <span data-plugin="counterup"><?php echo $jmlgrowmingguan['growth rate']; ?></span>%</h4>
                                <p class="text-muted mb-0">Growth since last week</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col-->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-3">

                                <h4 class="card-title mb-4">Best Selling</h4>
                                <div class="mt-1">
                                    <ul class="list-inline main-chart mb-0">
                                        <li class="list-inline-item chart-border-left me-0 border-0">
                                            <h3 class="text-primary">Rp <span data-plugin="counterup">
                                                    <?php
                                                    $subtot = mysqli_query($test, "SELECT sum(kuantitas) as jmlorder, sum(harga*kuantitas) as subtotal FROM barang JOIN detail_pesanan on barang.id_barang=detail_pesanan.id_barang");
                                                    $datasub = mysqli_fetch_array($subtot);
                                                    echo $datasub['subtotal']
                                                    ?>

                                                </span><span class="text-muted d-inline-block font-size-15 ms-3">Income</span></h3>
                                        </li>
                                        <li class="list-inline-item chart-border-left me-0">
                                            <h3><span data-plugin="counterup"><?php
                                                                                $psn = mysqli_query($test, "SELECT count(id_pesanan) as jmlorder  FROM pesanan");
                                                                                $odr = mysqli_fetch_array($psn);
                                                                                echo $odr['jmlorder']
                                                                                ?></span><span class="text-muted d-inline-block font-size-15 ms-3">Transactions</span>
                                            </h3>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end row-->
                                <?php while ($data = mysqli_fetch_array($eksebarang)) :
                                    $x = $data['id_barang'];
                                    $brg = mysqli_query($test, "SELECT nama_barang FROM barang where id_barang='$x'");
                                    $nmbrg = mysqli_fetch_array($brg); ?>
                                    <div class="row align-items-center g-0 mt-3">
                                        <div class="col-sm-7">

                                            <p class="text-truncate mt-1 mb-0"><b><?php echo $nmbrg['nama_barang'] ?></b> </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="progress mt-1" style="height: 6px;">
                                                <div class="progress-bar progress-bar bg-info" role="progressbar" style="width: <?php echo $data['Prosentase'] ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <p class="text-truncate mt-1 mb-0" style="color: blue; margin-left: 2px;"><b><?php echo $data['jumlah_pesanan'] ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center g-0 mt-33">
                                        <hr>
                                    </div>
                                    <!-- end row-->

                                <?php endwhile; ?>
                            </div>

                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col-->
                <div class="col-xl-4">

                    <!-- end card-->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Top Users</h4>
                            <div data-simplebar style="max-height: 350px;">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-centered table-nowrap" id="uer">
                                        <?php while ($data = mysqli_fetch_array($ekseuser)) : ?>
                                            <tbody>
                                                <tr>
                                                    <!--<td style="width: 20px;"><img src="assets/images/users/avatar-4.jpg" class="avatar-xs rounded-circle " alt="..."></td>-->
                                                    <td>
                                                        <h6 class="font-size-15 mb-1 fw-normal"><?php echo $data['nama']; ?></h6>
                                                        <p class="text-muted font-size-13 mb-0"><i class="mdi mdi-email-box"></i> <?php echo $data['email']; ?></p>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        <?php endwhile; ?>
                                    </table>
                                </div>
                                <!-- enbd table-responsive-->
                            </div>
                            <!-- data-sidebar-->
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>
                <!-- end Col -->
            </div>
            <!-- end row-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Order Data</h4>

                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID Pesanan</th>
                                        <th>ID User</th>
                                        <th>Nama Penerima</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Status Pesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data = mysqli_fetch_array($eksekusi)) : ?>
                                        <tr>
                                            <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $data['id_pesanan'], "<br>"; ?></a> </td>
                                            <td> <span><?php echo $data['id_user'], "<br>"; ?></span> </td>
                                            <td> <span><?php echo $data['nama_penerima'], "<br>"; ?></span> </td>
                                            <td> <span><?php echo $data['email_penerima'], "<br>"; ?></span> </td>
                                            <td> <span><?php echo $data['telepon_penerima'], "<br>"; ?></span> </td>
                                            <td> <span><?php echo $data['alamat_penerima'], "<br>"; ?></span> </td>
                                            <td> <span><?php echo $data['id_pembayaran'], "<br>"; ?></span> </td>
                                            <td> <span><?php echo $data['status'], "<br>"; ?></span> </td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm" title="View Detail" href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" name="detail">
                                                    <i class="bx bx-spreadsheet"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?php include "../admkomponen/footer.php"; ?>