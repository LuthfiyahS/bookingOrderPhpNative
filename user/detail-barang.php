<?php
//include "../jegal.php";
include "../komponen/header.php";
//include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$x = $_GET['id'];
$ambil = mysqli_query($test, "SELECT * FROM barang where id_barang='$x'");
$databarang = mysqli_fetch_array($ambil);
$nama = $databarang['nama_barang'];
$eksekusi = mysqli_query($test, "SELECT * FROM barang JOIN katalog ON barang.nama_kategori = katalog.id_katalog  WHERE nama_barang='$nama'");
$data = mysqli_fetch_array($eksekusi);

?>

<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-flex align-items-center justify-content-between">
						<h4 class="mb-0">Detail Produk</h4>
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo "$x"; ?></a></li>
								<li class="breadcrumb-item active">Detail Produk</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-4">
									<div class="product-detail">
										<div class="row">
											<div class="col-10">
												<div class="tab-content position-relative" id="v-pills-tabContent">
													<div class="tab-pane fade show active" id="product-1" role="tabpanel">
														<div class="product-img"> <img src="<?php echo "../admin/inputan/" . $data["foto_barang"]; ?>" alt="" class="img-fluid mx-auto d-block" data-zoom="assets/images/product/img-1.png"> </div>
													</div>
												</div>
												<div class="row text-center mt-2">
													<div class="col-sm-12">
														<div class="d-grid">
															<button type="button" data-bs-toggle="modal" data-bs-target=".add<?php echo $data['id_barang']; ?>" class="btn btn-primary waves-effect waves-light mt-2 me-1"> <i class="uil uil-shopping-cart-alt me-2"></i> Tambahkan Ke Keranjang </button>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xl-8">
									<div class="mt-4 mt-xl-3 ps-xl-4">
										<h5 class="font-size-14"><a href="#" class="text-muted"><?php echo $data['merek'] ?></a></h5>
										<h4 class="font-size-20 mb-3"><?php echo $data['nama_barang'] ?></h4>

										<?php
										$tejual = mysqli_query($test, "SELECT SUM(kuantitas) as terjual FROM barang INNER JOIN katalog ON barang.nama_kategori = katalog.id_katalog INNER JOIN detail_pesanan ON barang.id_barang = detail_pesanan.id_barang WHERE nama_barang='$nama'");
										$dataq = mysqli_fetch_array($tejual);
										if ($dataq['terjual'] != null) {
											echo "<div class='text-muted'> <span class='badge bg-success font-size-14 me-1'>" . $dataq['terjual'];
										} else {
											echo "<div class='text-muted'> <span class='badge bg-success font-size-14 me-1'>0";
										}
										?></span> Terjual
									</div>
									<h5 class="mt-4 pt-2">Rp <?php echo $data['harga'] ?> </h5>
									<div>
										<div class="mt-4">
											<h5 class="font-size-14 mb-3">Deskripsi Produk: </h5>
											<div class="product-desc">
												<ul class="nav nav-tabs nav-tabs-custom" role="tablist">
													<li class="nav-item"> <a class="nav-link" id="desc-tab" data-bs-toggle="tab" href="#desc" role="tab">Description</a> </li>
													<li class="nav-item"> <a class="nav-link active" id="specifi-tab" data-bs-toggle="tab" href="#specifi" role="tab">Specifications</a> </li>
												</ul>
												<div class="tab-content border border-top-0 p-4">
													<div class="tab-pane fade" id="desc" role="tabpanel">
														<div class="row">
															<div class="col-sm-3 col-md-2">
																<div> <img src="<?php echo "../admin/inputan/" . $data["foto_barang"]; ?>" alt="" class="img-fluid mx-auto d-block"> </div>
															</div>
															<div class="col-sm-9 col-md-10">
																<div class="text-muted p-2">
																	<p><?php echo $data['deskripsi'] ?></p>
																</div>
															</div>
														</div>
													</div>
													<div class="tab-pane fade show active" id="specifi" role="tabpanel">
														<div class="table-responsive">
															<table class="table table-nowrap mb-0">
																<tbody>
																	<tr>
																		<th scope="row" style="width: 20%;">Kategori</th>
																		<td><?php echo $data['nama_katalog'] ?></td>
																	</tr>
																	<tr>
																		<th scope="row">Merek</th>
																		<td><?php echo $data['merek'] ?></td>
																	</tr>
																	<tr>
																		<th scope="row">Kualitas</th>
																		<td>High</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end row -->

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
				</div>
			</div>
		</div>
		<!-- end row -->
	</div>
	<!-- container-fluid -->
</div>
<!-- End Page-content -->
<?php
include "../komponen/footer.php";
?>