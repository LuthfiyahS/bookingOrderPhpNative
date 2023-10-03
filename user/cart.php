<?php
include "../jegal.php";
include "../komponen/header.php";
//include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from keranjang";
$eksekusi = mysqli_query($test, "$tampil");

$tampil = "select * from barang";
$eksekbarang = mysqli_query($test, "$tampil");
?>
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-flex align-items-center justify-content-between">
						<h4 class="mb-0">Cart</h4>
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Cekin Shop</a></li>
								<li class="breadcrumb-item active">Cart</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row mb-3">
				<div class="col-xl-12">
					<?php
					$bayar = "SELECT * FROM barang JOIN keranjang on barang.id_barang=keranjang.id_barang WHERE id_user ='$x'";
					$eksekusibayar = mysqli_query($test, "$bayar");
					while ($data = mysqli_fetch_array($eksekusibayar)) : ?>
						<div class="card border shadow-none">
							<div class="card-body">
								<div class="d-flex align-items-start border-bottom pb-3">
									<div class="flex-shrink-0 me-4"> <img src="<?php echo "../admin/inputan/" . $data["foto_barang"]; ?>" alt="" class="avatar-lg"> </div>
									<div class="flex-grow-1 align-self-center overflow-hidden">
										<div>
										<h5 class="mb-1"><a href="detail-barang.php?id=<?php echo $data['id_barang']; ?>" class="text-dark"><?php echo $data['nama_barang']; ?></a></h5>
											<p class="mb-1"> <span class="fw-medium"><?php //echo $data['id_barang'] 
																						?></span></p>
										</div>
									</div>
									<div class="ms-2">
										<ul class="list-inline mb-0 font-size-16">
											<li class="list-inline-item">
												<a class="text-muted px-2" title="Ubah Kuantitas" data-bs-toggle="modal" data-bs-target=".add<?php echo $data['id_cart']; ?>"> <i class="bx bx-pencil"></i> </a>
											</li>
											<li class="list-inline-item">
												<a href="../admin/delete/delete-keranjang user.php?id=<?php  echo $data['id_cart']; ?>" class="text-muted px-2" title="Hapus Keranjang"> <i class="bx bx-trash"></i> </a>
											</li>
										</ul>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<div class="mt-3">
												<p class="text-muted mb-2">Price</p>

												<input class="form-control" type="text" value="<?php echo $data['harga'] ?>" style="border: none; background:transparent" readonly>

											</div>
										</div>
										<div class="col-md-4">
											<div class="mt-3">
												<p class="text-muted mb-2">Quantinty</p>

												<input class="form-control" type="text" value="<?php echo $data['kuantitas'] ?>" style="border: none; background:transparent" readonly>

											</div>
										</div>
										<div class="col-md-4">
											<div class="mt-3">
												<p class="text-muted mb-2">Total</p>
												<input class="form-control" type="text" value="<?php echo $data['harga'] * $data['kuantitas']  ?>" style="border: none; background:transparent" readonly>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade add<?php echo $data['id_cart']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
						
						<?php
						$x = $data['id_cart'];
						$datanya = mysqli_query($test, "SELECT * FROM barang JOIN keranjang on barang.id_barang=keranjang.id_barang WHERE id_cart ='$x' ");
						$set = mysqli_fetch_array($datanya);
						?>
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header border-bottom-0">
										<h5 class="modal-title" id="exampleModalLabel">Edit Cart</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									</div>
									<form action="../admin/update/update-keranjang-user.php" method="POST">
										<div class="modal-body">
											<div class="form-group">
												<div class='row'>
													<div class='col-md-6'>
												<input type="text" class="form-control"  value="<?php echo $set['id_barang'] ?>" name="id_barang" readonly>
													</div>
													<div class='col-md-6'>
													<input type="text" class="form-control"  value="<?php echo $set['id_cart'] ?>" name="id_cart" readonly >
													</div>
												</div>
												
											</div>
											<div class="form-group">
												<label for="iduser">Product</label>
												<input type="text" class="form-control" id="nama" value="<?php echo $set['nama_barang'] ?>" name="nama" readonly>
											</div>
											<div class="form-group">
												<label for="iduser">Quantinty</label>
												<input type="number" class="form-control" id="nama" value="<?php echo $set['kuantitas'] ?>" name="kuantitas" min="1">
											</div>
										</div>
										<div class="modal-footer border-top-0 d-flex justify-content-center">
											<button type="submit" class="btn btn-success">Perbaharui Data Keranjang</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- end card -->
					<?php endwhile; ?>
					<!-- end card -->
					<div class="row mt-4">
						<div class="col-sm-6">
							<a href="index.php" class="btn btn-link text-muted"> <i class="uil uil-arrow-left me-1"></i> Lanjutkan Berbelanja </a>
						</div>
						<!-- end col -->
                                    <div class="col-sm-6">
							<div class="text-sm-end mt-2 mt-sm-0">
								<a href="checkout.php" class="btn btn-success"> <i class="uil uil-shopping-cart-alt me-1"></i> Pesan Semua Sekarang </a>
							</div>
						</div>
						<!-- end col -->
						
					</div>
					<!-- end row-->
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