<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$x = $_GET['id'];
$eksekusi = mysqli_query($test, "SELECT * FROM pesanan where id_pesanan='$x'");
$data = mysqli_fetch_array($eksekusi);
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
                        <h4 class="mb-0">Invoice Detail</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                <li class="breadcrumb-item active">Invoice Detail</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="box-shadow: none;">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-16">Invoice #IN<?php echo $data['id_pesanan'];
                                                                                if ($data['status'] == 'Selesai') { ?>
                                    <span class="badge bg-success font-size-12 ms-2"><?php echo $data['status'], "<br>"; ?></span>
                                </h4>
                            <?php } elseif ($data['status'] == 'Dikirim') { ?>
                                <span class="badge bg-primary font-size-12 ms-2"><?php echo $data['status'], "<br>"; ?></span></h4>
                            <?php } elseif ($data['status'] == 'Dikemas') { ?>
                                <span class="badge bg-info font-size-12 ms-2"><?php echo $data['status'], "<br>"; ?></span></h4>
                            <?php } elseif ($data['status'] == 'Belum Bayar') { ?>
                                <span class="badge bg-secondary font-size-12 ms-2"><?php echo $data['status'], "<br>"; ?></span></h4>
                            <?php } ?>
                            <div class="mb-4">
                                <img src="../assets/images/logo-ku2.png" alt="logo" height="50" />
                            </div>
                            <div class="text-muted">
                                <p class="mb-1">Jl. Kapten Ismail Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41112</p>
                                <p class="mb-1"><i class="bx bx-mail-send me-1"></i> cekin.shop@gmail.com</p>
                                <p><i class="bx bx-phone me-1"></i> (0264) 207530</p>
                            </div>
                            </div>
                            <hr>
                            <hr class="my-4">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">
Bills To:</h5>
                                        <h5 class="font-size-15 mb-2"><?php echo $data['nama_penerima'] ?> </h5>
                                        <p class="mb-1"><?php echo $data['alamat_penerima'] ?>, <?php echo $data['kota'] ?>, <?php echo $data['negara'] ?>. <?php echo $data['kode_pos'] ?> </p>
                                        <p class="mb-1"><?php echo $data['email_penerima'] ?> </p>
                                        <p><?php echo $data['telepon_penerima'] ?> </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-16 mb-1">No Invoice:</h5>
                                            <p>#IN<?php echo $data['id_pesanan']; ?></p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-16 mb-1">Invoice Date:</h5>
                                            <p><?php echo $data['tgl_pesanan']; ?></p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-16 mb-1">No Order:</h5>
                                            <p>#<?php echo $data['id_pesanan']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="py-2">
                                <h5 class="font-size-15">Order List</h5>

                                <div class="table-responsive">
                                    <table class="table table-nowrap table-centered mb-3">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;">No.</th>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>Quantinty</th>
                                                <th class="text-end" style="width: 120px;">Total</th>
                                            </tr>
                                        </thead>
                                        <?php $no = 1;
                                        $bayar = "SELECT nama_barang,harga,kuantitas, (harga*kuantitas) as total
                                        FROM barang JOIN detail_pesanan on barang.id_barang=detail_pesanan.id_barang WHERE id_pesanan ='$x'";
                                        $eksekusibayar = mysqli_query($test, "$bayar");
                                        ?>
                                        <tbody>
                                            <?php while ($data = mysqli_fetch_array($eksekusibayar)) : ?>
                                                <tr>
                                                    <th scope="row"><?php echo  $no;
                                                                    $no++; ?> </th>
                                                    <td style="max-width: 450px;">
                                                        <h5 class="font-size-15"><?php echo $data['nama_barang'] ?></h5>
                                                    </td>
                                                    <td><?php echo $data['harga'] ?></td>
                                                    <td><?php echo $data['kuantitas'] ?></td>
                                                    <td class="text-end">Rp<?php echo $data['total'] ?></td>
                                                </tr>
                                            <?php endwhile;
                                            $subtot = mysqli_query($test, "SELECT sum(kuantitas) as jmlorder, sum(harga*kuantitas) as subtotal FROM barang JOIN detail_pesanan on barang.id_barang=detail_pesanan.id_barang WHERE id_pesanan ='$x'");
                                            $datasub = mysqli_fetch_array($subtot);
                                            ?>
                                            <tr>
                                                <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                                <td class="text-end">Rp <?php echo $datasub['subtotal'], "<br>"; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                    Shipping Cost :</th>
                                                <td class="border-0 text-end">
                                                    <?php if ($datasub['jmlorder'] <= 1) {
                                                        echo 'Rp' . $datasub['jmlorder'] * 14000;
                                                    } elseif ($datasub['jmlorder'] > 1 && $datasub['jmlorder'] <= 25) {
                                                        echo 'Rp' . $datasub['jmlorder'] * 10000;
                                                    } elseif ($datasub['jmlorder'] > 25 && $datasub['jmlorder'] <= 50) {
                                                        echo 'Rp' . $datasub['jmlorder'] * 7000;
                                                    } elseif ($datasub['jmlorder'] > 50 && $datasub['jmlorder'] <= 100) {
                                                        echo 'Rp' . $datasub['jmlorder'] * 5000;
                                                    } elseif ($datasub['jmlorder'] > 100 && $datasub['jmlorder'] <= 500) {
                                                        echo 'Rp' . $datasub['jmlorder'] * 4000;
                                                    } elseif ($datasub['jmlorder'] > 500 && $datasub['jmlorder'] <= 1000) {
                                                        echo 'Rp' . $datasub['jmlorder'] * 2000;
                                                    } elseif ($datasub['jmlorder'] > 1000) {
                                                        echo 'Rp' . $datasub['jmlorder'] * 1500;
                                                    }
                                                    ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                <td class="border-0 text-end">
                                                    <h4 class="m-0">
                                                        <?php if ($datasub['jmlorder'] <= 1) {
                                                            echo 'Rp' . $datasub['jmlorder'] * 14000;
                                                        } elseif ($datasub['jmlorder'] > 1 && $datasub['jmlorder'] <= 25) {
                                                            echo 'Rp' . $datasub['subtotal'] + ($datasub['jmlorder'] * 10000);
                                                        } elseif ($datasub['jmlorder'] > 25 && $datasub['jmlorder'] <= 50) {
                                                            echo 'Rp' . $datasub['subtotal'] + ($datasub['jmlorder'] * 7000);
                                                        } elseif ($datasub['jmlorder'] > 50 && $datasub['jmlorder'] <= 100) {
                                                            echo 'Rp' . $datasub['subtotal'] + ($datasub['jmlorder'] * 5000);
                                                        } elseif ($datasub['jmlorder'] > 100 && $datasub['jmlorder'] <= 500) {
                                                            echo 'Rp' . $datasub['subtotal'] + ($datasub['jmlorder'] * 4000);
                                                        } elseif ($datasub['jmlorder'] > 500 && $datasub['jmlorder'] <= 1000) {
                                                            echo 'Rp' . $datasub['subtotal'] + ($datasub['jmlorder'] * 2000);
                                                        } elseif ($datasub['jmlorder'] > 1000) {
                                                            echo 'Rp' . $datasub['subtotal'] + ($datasub['jmlorder'] * 1500);
                                                        }
                                                        ?>
                                                    </h4>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?php include "../admkomponen/footer.php"; ?>