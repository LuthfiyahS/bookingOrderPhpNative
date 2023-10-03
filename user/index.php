<?php
//include "../jegal.php";
include "../komponen/header.php";
//include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from barang limit 8";
$eksekbarang = mysqli_query($test, "$tampil");
//$tampill = "select * from katalog limit 4";
$tampill = "SELECT nama_kategori,nama_katalog, COUNT(id_barang) as jumlah_barang,foto_barang
FROM barang JOIN katalog on barang.nama_kategori=katalog.id_katalog GROUP BY nama_kategori limit 4
"; //ini yang bener
$eksekpend = mysqli_query($test, "$tampill");


$tampilbarang = "select id_barang,COUNT(*) as jumlah_pesanan,ROUND((COUNT(id_barang)/(SELECT COUNT(*) FROM detail_pesanan))*100,0) AS Prosentase from detail_pesanan GROUP by id_barang limit 4";
$eksebarange = mysqli_query($test, "$tampilbarang");

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- end page title -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid" src="../assets/images/slide/1.png" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="../assets/images/slide/2.png" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="../assets/images/slide/3.png" alt="Third slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="../assets/images/slide/4.png" alt="Four slide">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-xl-4">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-8">
                                    <p class="text-white font-size-18">Make your loved ones happy with us</b> <i class="mdi mdi-arrow-right"></i></p>
                                    <div class="mt-4">
                                        <a href="cart.php" class="btn waves-effect waves-light" style="background-color: #F5F2E9;">Checkout Now!</a>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mt-4 mt-sm-0">
                                        <img src="../assets/images/bunga.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->

                    <div class="card" style="margin-top: -10px;">
                        <div class="card-body" style="margin-top: -10px;">

                            <h5 class="card-title mb-4">Best Selling Product</h5>


                            <?php while ($data = mysqli_fetch_array($eksebarange)) :
                                $x = $data['id_barang'];
                                $brg = mysqli_query($test, "SELECT nama_barang FROM barang where id_barang='$x'");
                                $nmbrg = mysqli_fetch_array($brg); ?>
                                <div class="row align-items-center g-0 mt-3" >
                                    <div class="col-sm-7">

                                        <p class="text-truncate mt-1 mb-0"><b><?php echo $nmbrg['nama_barang'] ?></b> </p>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="progress mt-1" style="height: 6px;">
                                            <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: <?php echo $data['Prosentase'] ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <p class="text-truncate mt-1 mb-0" style="color: #2B2220; margin-left: 2px;"><b><?php echo $data['jumlah_pesanan'] ?></b></p>
                                    </div>
                                </div>
                                <div class="row align-items-center g-0 mt-33">
                                    <hr>
                                </div>
                                <!-- end row-->

                            <?php endwhile; ?>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end Col -->
            </div> <!-- end row-->

            <div class="row">
                <?php while ($data = mysqli_fetch_array($eksekpend)) : ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div >
                                            <h4 class="mb-1 mt-1" ><?php echo $data['nama_katalog']; ?> </h4>
                                            <p class="text-muted mb-0"><span data-plugin="counterup"><?php echo $data['jumlah_barang']; ?></span> Produk</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <img src="<?php echo "../admin/inputan/" . $data["foto_barang"]; ?>" width="50%" class="float-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->
                <?php endwhile; ?>
            </div> <!-- end row-->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <ul class="nav nav-tabs nav-tabs-custom mt-3 mb-2 ecommerce-sortby-list">
                                    <li class="nav-item"> <a class="nav-link active" href="#">Recommendation</a> </li>
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
                                                                            <label for="iduser">ID Product</label><br>
                                                                            <input type="text" class="form-control" id="idsekolah" value="<?php echo $setsekolah['id_barang'] ?>" name="id_barang" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="iduser">Name </label>
                                                                            <input type="text" class="form-control" id="nama" value="<?php echo $setsekolah['nama_barang'] ?>" name="nama" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="iduser">Quantinty</label>
                                                                            <input type="number" class="form-control" id="nama" placeholder="[1,2,3,4....]" name="kuantitas" min="1" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                                        <button type="submit" class="btn btn-success">Add to cart</button>
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
                                                        <li class="list-inline-item"> Stock : <?php echo $data['stok']; ?> </li>
                                                    </ul>
                                                </div>

                                            </div>

                                        </div>

                                    <?php endwhile; ?>
                                </div>
                                <!-- end row -->
                                <div class="row align-items-center">
                                        <a href="semuabarang.php" class="btn waves-effect waves-light" style="background-color: #F5F2E9;">Lihat Selengkapnya</a>
                                    
                                </div>
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