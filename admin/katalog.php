<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from katalog";
$eksekusi = mysqli_query($test, "$tampil");
?>
<div class="main-content">
	<div class="page-content">
		<div class="container-fluid">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box d-flex align-items-center justify-content-between">
						<h4 class="mb-0">Catalog</h4>
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
								<li class="breadcrumb-item active">Catalog</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- center modal -->
						<button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Add Catalog</button>

						<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Add Catalog</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
										</button>
									</div>
									<div class="modal-body">
										<form action="inputan/katalog-input.php" method="POST">
											<div class="modal-body">
												<div class="form-group">
													<label for="iduser">Name Catalog</label>
													<input type="text" class="form-control" id="nama" placeholder="Masukan Nama katalog" name="nama">
												</div>
											</div>
											<div class="modal-footer border-top-0 d-flex justify-content-center">
												<button type="submit" name="add" class="btn btn-success">Add</button>
											</div>
										</form>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
									<th>ID Catalog</th>
									<th>Name Catalog</th>
									<th>Action</th>
								</tr>
							</thead>


							<tbody>
								<?php while ($data = mysqli_fetch_array($eksekusi)) : ?>
									<tr>
										<td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $data['id_katalog'], "<br>"; ?></a> </td>
										<td> <span><?php echo $data['nama_katalog'], "<br>"; ?></span> </td>
										<td>
											<a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".editkatalog<?php echo $data['id_katalog']; ?>">
												<i class="fas fa-pencil-alt"></i>
											</a>
											<div class="modal fade editkatalog<?php echo $data['id_katalog']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
												<?php
												$x = $data['id_katalog'];
												$datapro = mysqli_query($test, "SELECT * FROM katalog where id_katalog='$x' ");
												$setpro = mysqli_fetch_array($datapro);
												?>
												<div class="modal-dialog modal-dialog-centered">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Edit Katalog</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
															</button>
														</div>
														<div class="modal-body">
															<form action="update/update-katalog.php" method="POST">
																<div class="modal-body">
																	<div class="form-group">
																		<label for="iduser">ID Catalog</label><br>
																		<input type="text" class="form-control" id="idprodi" value="<?php echo $setpro['id_katalog'] ?>" name="id_katalog" readonly>
																	</div>
																	<div class="form-group">
																		<label for="iduser">Name Catalog</label>
																		<input type="text" class="form-control" id="nama" value="<?php echo $setpro['nama_katalog'] ?>" name="nama">
																	</div>
																</div>
																<div class="modal-footer border-top-0 d-flex justify-content-center">
																	<button type="submit" class="btn btn-success">Update Data</button>
																</div>
															</form>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											<a class="btn btn-outline-secondary btn-sm " href="delete/delete-katalog.php?id=<?php echo $data['id_katalog']; ?>" name="del" onclick="return confirm('Want to delete data?');">
												<i class="fas fa-trash"></i>
											</a>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- container-fluid -->
	</div>
	<!-- End Page-content -->
	<?php include "../admkomponen/footer.php"; ?>