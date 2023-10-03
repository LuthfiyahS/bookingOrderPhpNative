<?php
//include "../jegal.php";
include "../komponen/header.php";
//include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from barang";
$eksekbarang = mysqli_query($test, "$tampil");

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                                    <li class="nav-item"> <a class="nav-link active" href="#">Rekomendasi</a> </li>
                                </ul>
                                <div class="row">
                                    <?php while ($data = mysqli_fetch_array($eksekbarang)) : ?>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <div class="product-box">

                                                <div class="product-img pt-4 px-4"><a href="detail-barang.php?id=<?php echo $data['id_barang']; ?>">
                                                    <img src="<?php echo "../admin/inputan/" . $data["foto_barang"]; ?>" alt="" class="img-fluid mx-auto d-block"></a>
                                                    <div class="product-wishlist" style="padding: 10px;">
                                                        <a class="bg-white btn-sm edit" title="Keranjang" data-bs-toggle="modal" data-bs-target=".add<?php echo $data['id_barang']; ?>">
                                                            <i class="bx bx-cart-alt" style="color: black;"></i>
                                                        </a>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal fade add<?php echo $data['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <?php
                                                        include '../koneksi.php'; // membuka koneksi
                                                        $x = $data['id_barang'];

                                                        $datasekolah = mysqli_query($test, "SELECT * FROM barang where id_barang='$x' ");
                                                        $setsekolah = mysqli_fetch_array($datasekolah);
                                                        ?>
                                                        <?php
                                                        if (!isset($_SESSION['username'])) { ?>
                                                            <div class="modal-content">
                                                                <div class="modal-header border-bottom-0">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Anda Harus Login Terlebih Dahulu</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <form action="../login.php" method="POST">
                                                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                                        <button type="submit" class="btn btn-success">Login</button>
                                                                    </div>
                                                                </form>
                                                            </div>


                                                        <?php
                                                        } else { ?>
                                                            <div class="modal-content">
                                                                <div class="modal-header border-bottom-0">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Keranjang</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </div>
                                                                <form action="../admin/inputan/keranjang-input-user.php" method="POST">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="iduser">ID Barang</label><br>
                                                                            <input type="text" class="form-control" id="idsekolah" value="<?php echo $setsekolah['id_barang'] ?>" name="id_barang" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="iduser">Nama Barang</label>
                                                                            <input type="text" class="form-control" id="nama" value="<?php echo $setsekolah['nama_barang'] ?>" name="nama" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="iduser">Jumlah</label>
                                                                            <input type="number" class="form-control" id="nama" placeholder="Masukkan Jumlah Barang" name="kuantitas" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                                        <button type="submit" class="btn btn-success">Tambahkan Keranjang</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        <?php }
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="text-center product-content p-4" style="margin-top: 1rem;">
                                                <h6 class="mb-1"><a href="detail-barang.php?id=<?php echo $data['id_barang']; ?>" class="text-dark"><?php echo $data['nama_barang']; ?></a></h6>
                                                    <p class="text-muted font-size-13"><?php echo $data['nama_kategori']; ?></p>

                                                    <h7 class="mt-3 mb-0"><span class="text-muted me-2"></span> Rp <?php echo $data['harga']; ?></h7>
                                                    <ul class="list-inline mb-0 text-muted product-color">
                                                        <li class="list-inline-item"> Stok : <?php echo $data['stok']; ?> </li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>

                                    <?php endwhile; ?>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div> <!-- container-fluid -->
    </div>
    <?php
    include "../komponen/footer.php";
    ?>