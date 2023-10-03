<?php
include "../komponen/header.php";
$x = $_SESSION['id_user'];
$tampil = "select * from pesanan where id_user='$x'";
$eksekusi = mysqli_query($test, "$tampil");
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
						<h4 class="mb-0">My Order</h4>
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Cekin Shop</a></li>
								<li class="breadcrumb-item active">My Order</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<div class="row">
				<div class="col-xl-12">
					<div class="card mb-0">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-bs-toggle="tab" href="#semua" role="tab"> <i class="uil uil-user-circle font-size-20"></i> <span class="d-none d-sm-block">All</span> </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#belumbayar" role="tab"> <i class="uil uil-clipboard-notes font-size-20"></i> <span class="d-none d-sm-block">UnPaid</span> </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#dikemas" role="tab"> <i class="uil uil-envelope-alt font-size-20"></i> <span class="d-none d-sm-block">Packed</span> </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#dikirim" role="tab"> <i class="uil uil-envelope-alt font-size-20"></i> <span class="d-none d-sm-block">Shipping</span> </a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#selesai" role="tab"> <i class="uil uil-clipboard-notes font-size-20"></i> <span class="d-none d-sm-block">Finish</span> </a>
							</li>
						</ul>
						<!-- Tab content -->
						<div class="tab-content p-4">
							<div class="tab-pane active" id="semua" role="tabpanel">
								<div>
									<div>
										<h5 class="font-size-16 mb-4">All Order</h5>
										<div class="table-responsive">
											<table class="table table-nowrap table-hover mb-0">
												<thead>
													<tr>
														<th scope="col">#ID Pesanan</th>
														<th scope="col">Date</th>
														<th scope="col">Status</th>
														<th scope="col" style="width: 120px;">Invoice</th>
													</tr>
												</thead>
												<tbody><?php
														if ($eksekusi == null) {
															echo "Tidak ada pesanan";
														} else {
															while ($data = mysqli_fetch_array($eksekusi)) : ?>
															<tr>
																<th scope="row"><?php echo $data['id_pesanan'], "<br>"; ?></th>
																<td><?php echo $data['tgl_pesanan'], "<br>"; ?></td>
																<td> <?php if ($data['status'] == 'Belum Bayar') {
																			echo "<div class='badge bg-pill bg-soft-secondary font-size-12'>" . $data['status'], "<br></div>";
																		} elseif ($data['status'] == 'Dikemas') {
																			echo "<div class='badge bg-pill bg-soft-warning font-size-12'>" . $data['status'], "<br></div>";
																		} elseif ($data['status'] == 'Dikirim') {
																			echo "<div class='badge bg-pill bg-soft-info font-size-12'>" . $data['status'], "<br></div>";
																		} elseif ($data['status'] == 'Selesai') {
																			echo "<div class='badge bg-pill bg-soft-success font-size-12'>" . $data['status'], "<br></div>";
																		}

																		?></td>
																<td>

																	<a class="btn btn-outline-secondary btn-sm" title="View Detail" href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" name="detail">
																		<i class="bx bx-spreadsheet"></i>
																	</a>
																</td>
															</tr>
													<?php endwhile;
														} ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="belumbayar" role="tabpanel">
								<div>
									<h5 class="font-size-16 mb-4">UnPaid</h5>
									<div class="table-responsive">
										<table class="table table-nowrap table-hover mb-0">
											<thead>
												<tr>
													<th scope="col">#ID Pesanan</th>
													<th scope="col">Date</th>
													<th scope="col">Status</th>
													<th scope="col" style="width: 120px;">Invoice</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$tampilbelumbayar = "select * from pesanan where id_user='$x' && status='Belum Bayar'";
												$eksekusibelumbayar = mysqli_query($test, "$tampilbelumbayar");
												if ($eksekusibelumbayar == null) {
													echo "Tidak ada pesanan";
												} else {
													while ($data = mysqli_fetch_array($eksekusibelumbayar)) : ?>
														<tr>
															<td> <a href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" class="fw-bold text-dark"><?php echo $data['id_pesanan'], "<br>"; ?></a> </td>
															<td><?php echo "Bayar Sebelum ";
																$sesudah = date('d-m-Y', strtotime('+3 days'));
																echo  $sesudah ?></td>
															<td><span class="badge bg-soft-secondary font-size-12">Menunggu Pembayaran</span></td>
															<td>

																<a class="btn btn-outline-secondary btn-sm" title="View Detail" href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" name="detail">
																	<i class="bx bx-spreadsheet"></i>
																</a>
															</td>
														</tr>
												<?php endwhile;
												} ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="dikemas" role="tabpanel">
								<div>
									<div>
										<h5 class="font-size-16 mb-4">Dikemas</h5>
										<div class="table-responsive">
											<table class="table table-nowrap table-hover mb-0">
												<thead>
													<tr>
														<th scope="col">#ID Pesanan</th>
														<th scope="col">Shipping Date</th>
														<th scope="col">Status</th>
														<th scope="col" style="width: 120px;">Invoice</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$tampilDikemas = "select * from pesanan where id_user='$x' && status='Dikemas'";
													$eksekusiDikemas = mysqli_query($test, "$tampilDikemas");
													if ($eksekusiDikemas == null) {
														echo "Tidak ada pesanan";
													} else {
														while ($data = mysqli_fetch_array($eksekusiDikemas)) : ?>
															<tr>
																<td> <a href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" class="fw-bold text-dark"><?php echo $data['id_pesanan'], "<br>"; ?></a> </td>
																<td><?php echo "Dikirim Sebelum ";
																	$sesudah = date('d-m-Y', strtotime('+3 days'));
																	echo  $sesudah ?></td>
																<td><span class="badge bg-soft-secondary font-size-12">Shipping</span></td>
																<td>

																	<a class="btn btn-outline-secondary btn-sm" title="View Detail" href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" name="detail">
																		<i class="bx bx-spreadsheet"></i> invoice
																	</a>
																</td>
															</tr>
													<?php endwhile;
													} ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="dikirim" role="tabpanel">
								<div>
									<div>
										<h5 class="font-size-16 mb-4">Shipping</h5>
										<div class="table-responsive">
											<table class="table table-nowrap table-hover mb-0">
												<thead>
													<tr>
														<th scope="col">#ID Pesanan</th>
														<th scope="col">Alamat Kirim</th>
														<th scope="col">Status</th>
														<th scope="col" style="width: 120px;">Invoice</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$tampilsend = "select * from pesanan where id_user='$x' && status='Dikirim'";
													$eksekusisends = mysqli_query($test, "$tampilsend");
													if ($eksekusisends == null) {
														echo "Tidak ada pesanan";
													} else {
														while ($data = mysqli_fetch_array($eksekusisends)) : ?>
															<tr>
																<td> <a href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" class="fw-bold text-dark"><?php echo $data['id_pesanan'], "<br>"; ?></a> </td>
																<td><?php echo $data['alamat_penerima']; ?></td>
																<td><span class="badge bg-soft-info font-size-12">Shipping</span></td>
																<td>
																	<a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".see<?php echo $data['id_pesanan']; ?>">
																		<i class="bx bxs-car"></i> Detail Shipping
																	</a>
																	<div class="modal fade see<?php echo $data['id_pesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
																		<?php
																		$x = $data['id_pesanan'];
																		$tampilDikemas = "select * from info_pesanan where id_pesanan='$x'";
																		$eksekusiDikemas = mysqli_query($test, "$tampilDikemas"); ?>
																		<div class="modal-dialog modal-dialog-scrollable">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h5 class="modal-title">Detail Shipping</h5>
																					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
																					</button>
																				</div>
																				<div class="modal-body">
																					<div class="modal-body">
																						<div class="form-group">
																							<label for="iduser">ID Pesanan #<?php echo $x ?></label><br>

																							<h5 class="font-size-16 mb-4">Status </h5>
																							<ul class="activity-feed mb-0 ps-2">
																								<?php while ($setpro = mysqli_fetch_array($eksekusiDikemas)) : ?>
																									<li class="feed-item">
																										<div class="feed-item-list">
																											<p class="text-muted mb-1"><?php echo $setpro['tgl_update'] ?></p>
																											<p class="text-muted"><?php echo $setpro['status_pengiriman'] ?></p>
																										</div>
																									</li>
																								<?php endwhile;
																								?>

																							</ul>
																						</div>
																					</div>
																				</div>
																			</div><!-- /.modal-content -->
																		</div><!-- /.modal-dialog -->
																	</div><!-- /.modal -->

																	<a class="btn btn-outline-secondary btn-sm" title="View Detail" href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" name="detail">
																		<i class="bx bx-spreadsheet"></i> invoice
																	</a>
																</td>
															</tr>
													<?php endwhile;
													} ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="selesai" role="tabpanel">
								<div>
									<div>
										<h5 class="font-size-16 mb-4">Selesai</h5>
										<div class="table-responsive">
											<table class="table table-nowrap table-hover mb-0">
												<thead>
													<tr>
														<th scope="col">#ID Pesanan</th>
														<th scope="col">Alamat Kirim</th>
														<th scope="col">Status</th>
														<th scope="col" style="width: 120px;">Invoice</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$tampilsend = "select * from pesanan where id_user='$x' && status='Dikirim'";
													$eksekusisends = mysqli_query($test, "$tampilsend");
													if ($eksekusisends == null) {
														echo "Tidak ada pesanan";
													} else {
														while ($data = mysqli_fetch_array($eksekusisends)) : ?>
															<tr>
																<td> <a href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" class="fw-bold text-dark"><?php echo $data['id_pesanan'], "<br>"; ?></a> </td>
																<td><?php echo $data['alamat_penerima']; ?></td>
																<td><span class="badge bg-soft-success font-size-12">Selesai</span></td>
																<td>
																	<a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".see<?php echo $data['id_pesanan']; ?>">
																		<i class="bx bxs-car"></i> Detail Pengiriman
																	</a>
																	<div class="modal fade see<?php echo $data['id_pesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
																		<?php
																		$x = $data['id_pesanan'];
																		$tampilDikemas = "select * from info_pesanan where id_pesanan='$x'";
																		$eksekusiDikemas = mysqli_query($test, "$tampilDikemas"); ?>
																		<div class="modal-dialog modal-dialog-scrollable">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h5 class="modal-title">Detail Pengiriman</h5>
																					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
																					</button>
																				</div>
																				<div class="modal-body">
																					<div class="modal-body">
																						<div class="form-group">
																							<label for="iduser">ID Pesanan #<?php echo $x ?></label><br>

																							<h5 class="font-size-16 mb-4">Status Pengiriman</h5>
																							<ul class="activity-feed mb-0 ps-2">
																								<?php while ($setpro = mysqli_fetch_array($eksekusiDikemas)) : ?>
																									<li class="feed-item">
																										<div class="feed-item-list">
																											<p class="text-muted mb-1"><?php echo $setpro['tgl_update'] ?></p>
																											<h5 class="font-size-16"><?php echo $setpro['no_resi'] ?></h5>
																											<p><?php echo $setpro['jasa_kirim'] ?></p>
																											<p class="text-muted"><?php echo $setpro['status_pengiriman'] ?></p>
																										</div>
																									</li>
																								<?php endwhile;
																								?>

																							</ul>
																						</div>
																					</div>
																				</div>
																			</div><!-- /.modal-content -->
																		</div><!-- /.modal-dialog -->
																	</div><!-- /.modal -->

																	<a class="btn btn-outline-secondary btn-sm" title="View Detail" href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" name="detail">
																		<i class="bx bx-spreadsheet"></i> invoice
																	</a>
																</td>
															</tr>
													<?php endwhile;
													} ?>
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
			<!-- end row -->
		</div>
		<!-- container-fluid -->
	</div>



	<?php
	include "../komponen/footer.php";
	?>