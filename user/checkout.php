<?php
//include "../jegal.php";
include "../komponen/header.php";
//include "../admkomponen/sidebar.php";
//include "koneksi.php";
//@session_start();

$query = mysqli_query($test, "SELECT max(id_pesanan) as kodeTerbesar FROM pesanan");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

$urutan = (int) substr($kodeBarang, 4, 4);

$urutan++;
$huruf = "ORD";
$kodeBarang = $huruf . sprintf("%04s", $urutan);

$a = $kodeBarang;


$bayar = "select * from pembayaran";
$eksekbayar = mysqli_query($test, "$bayar");

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
						<h4 class="mb-0">Checkout</h4>
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Cekin Shop</a></li>
								<li class="breadcrumb-item active">Checkout</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- end page title -->
			<form action="../admin/inputan/pesanan-input.php" method="POST">
			<div class="row">
				<div class="col-xl-7">
					<div class="custom-accordion">
						<div class="card">
							<a href="#checkout-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse">
								<div class="p-4">
									<div class="d-flex align-items-center">
										<div class="flex-shrink-0 me-3"> <i class="uil uil-receipt text-primary h2"></i> </div>
										<div class="flex-grow-1 overflow-hidden">
											<h5 class="font-size-16 mb-1">Info Pengiriman</h5>
											<p class="text-muted text-truncate mb-0">Masukan data pengiriman yang sesuai</p>
										</div>
										<div class="flex-shrink-0"> <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i> </div>
									</div>
								</div>
							</a>
							<div id="checkout-billinginfo-collapse" class="collapse show">
								<div class="p-4 border-top">
									
										<div>
											<div class="row">
												<div class="col-lg-4">
													<div class="mb-3 mb-4">
														<label class="form-label" for="billing-name">Nama</label>
														<input type="text" class="form-control" id="billing-name" name="nama" placeholder="Masukan nama" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="mb-3 mb-4">
														<label class="form-label" for="billing-email-address">Email Penerima</label>
														<input type="email" class="form-control" id="billing-email-address" name="email" placeholder="Masukan email" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="mb-3 mb-4">
														<label class="form-label" for="billing-phone">Telepon</label>
														<input type="text" class="form-control" id="billing-phone" name="telepon" placeholder="Masukan No Telepon" required>
													</div>
												</div>
											</div>
											<div class="mb-4">
												<label class="form-label" for="billing-address">Alamat</label>
												<textarea class="form-control" id="billing-address" rows="3" name="alamat" placeholder="Masukan Alamat Lengkap" required></textarea>
											</div>
											<div class="row">
												<div class="col-lg-4">
													<div class="mb-4 mb-lg-0">
														<label class="form-label">Negara</label>
														<select class="form-control form-select" title="Country" name="negara" required>
															<option value="0">Select Country</option>
															<option value="AF">Afghanistan</option>
															<option value="AR">Argentina</option>
															<option value="AM">Armenia</option>
															<option value="AW">Aruba</option>
															<option value="AU">Australia</option>
															<option value="AT">Austria</option>
															<option value="AZ">Azerbaijan</option>
															<option value="BZ">Belize</option>
															<option value="BJ">Benin</option>
															<option value="BV">Bouvet Island</option>
															<option value="CX">Christmas Island</option>
															<option value="CC">Cocos (Keeling) Islands</option>
															<option value="CO">Colombia</option>
															<option value="KM">Comoros</option>
															<option value="CG">Congo</option>
															<option value="DK">Denmark</option>
															<option value="DJ">Djibouti</option>
															<option value="EC">Ecuador</option>
															<option value="EG">Egypt</option>
															<option value="ET">Ethiopia</option>
															<option value="FI">Finland</option>
															<option value="FR">France</option>
															<option value="GF">French Guiana</option>
															<option value="PF">French Polynesia</option>
															<option value="GE">Georgia</option>
															<option value="DE">Germany</option>
															<option value="GT">Guatemala</option>
															<option value="HT">Haiti</option>
															<option value="HK">Hong Kong</option>
															<option value="HU">Hungary</option>
															<option value="IN">India</option>
															<option value="ID">Indonesia</option>
															<option value="IQ">Iraq</option>
															<option value="IE">Ireland</option>
															<option value="IL">Israel</option>
															<option value="IT">Italy</option>
															<option value="JP">Japan</option>
															<option value="JO">Jordan</option>
															<option value="KZ">Kazakhstan</option>
															<option value="KR">Korea, Republic of</option>
															<option value="KW">Kuwait</option>
															<option value="MO">Macau</option>
															<option value="MG">Madagascar</option>
															<option value="MW">Malawi</option>
															<option value="MY">Malaysia</option>
															<option value="MV">Maldives</option>
															<option value="ML">Mali</option>
															<option value="MT">Malta</option>
															<option value="MH">Marshall Islands</option>
															<option value="MQ">Martinique</option>
															<option value="MR">Mauritania</option>
															<option value="MU">Mauritius</option>
															<option value="YT">Mayotte</option>
															<option value="MX">Mexico</option>
															<option value="MD">Moldova, Republic of</option>
															<option value="MC">Monaco</option>
															<option value="MN">Mongolia</option>
															<option value="NZ">New Zealand</option>
															<option value="NI">Nicaragua</option>
															<option value="PG">Papua New Guinea</option>
															<option value="PY">Paraguay</option>
															<option value="PE">Peru</option>
															<option value="PH">Philippines</option>
															<option value="SA">Saudi Arabia</option>
															<option value="SG">Singapore</option>
															<option value="SY">Syrian Arab Republic</option>
															<option value="TW">Taiwan, Province of China</option>
															<option value="AE">United Arab Emirates</option>
															<option value="GB">United Kingdom</option>
															<option value="US">United States</option>
															<option value="YE">Yemen</option>
															<option value="ZM">Zambia</option>
															<option value="ZW">Zimbabwe</option>
														</select>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="mb-4 mb-lg-0">
														<label class="form-label" for="billing-city">Kota/Provinsi</label>
														<input type="text" class="form-control" id="billing-city" name="kota" placeholder="Masukkan Kota" required>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="mb-0">
														<label class="form-label" for="zip-code">Kode Pos</label>
														<input type="text" class="form-control" id="zip-code" name="pos" placeholder="Masukkan Kode Pos" required>
													</div>
												</div>
											</div>
											<div class="row" style="margin-top: 20px;">
													<div class="mb-12 mb-12">
														<label class="form-label" for="billing-name">Metode Pembayaran</label>
														<select class="form-control form-select" title="Country" name="pembayaran">
                                                        <option value="-">Pilih Metode</option>
                                                        <?php while ($data = mysqli_fetch_array($eksekbayar)) : ?>
                                                            <option value="<?php echo $data['id_pembayaran'] ?>"><?php echo $data['nama_pembayaran']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
													</div>
											</div>
										</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-5">
					<div class="card checkout-order-summary">
						<div class="card-body">
							<div class="p-3 bg-light mb-4">
								<h5 class="font-size-16 mb-0">Rangkuman Pesanan <span class="float-end ms-2"># <?php echo $a ?></span></h5>
							</div>
							<div class="table-responsive">
								<table class="table table-centered mb-0 table-nowrap">
									<thead>
										<tr>
											<th class="border-top-0" style="width: 110px;" scope="col">Product</th>
											<th class="border-top-0" scope="row" style="max-width: 110px;">Product Desc</th>
											<th class="border-top-0" scope="col">Price</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$bayar = "SELECT * FROM barang JOIN keranjang on barang.id_barang=keranjang.id_barang WHERE id_user ='$x'";
										$eksekusibayar = mysqli_query($test, "$bayar");
										while ($data = mysqli_fetch_array($eksekusibayar)) : ?>
											<tr>
												<th scope="row"><img src="<?php echo "../admin/inputan/" . $data["foto_barang"]; ?>" alt="product-img" title="product-img" class="avatar-md"></th>
												<td scope="row" style="max-width: 200px;">
													<h5 class="font-size-14 text-truncate"><a href="detail-barang.php?id=<?php echo $data['id_barang']; ?>" class="text-dark"><?php echo $data["nama_barang"]; ?></a></h5>
													<p class="text-muted mb-0">Rp <?php echo $data["harga"]; ?> x <?php echo $data["kuantitas"]; ?></p>
												</td>
												<td>Rp <?php echo $data["harga"] * $data["kuantitas"]; ?></td>
											</tr>
										<?php endwhile;
										$subtot = mysqli_query($test, "SELECT sum(kuantitas) as jmlorder, sum(harga*kuantitas) as subtotal FROM barang JOIN keranjang on barang.id_barang=keranjang.id_barang WHERE id_user ='$x'");
										$datasub = mysqli_fetch_array($subtot); ?>
										<tr>
											<td colspan="2">
												<h5 class="font-size-14 m-0">Sub Total :</h5>
											</td>
											<td> Rp <?php echo $datasub['subtotal'], "<br>"; ?></td>
										</tr>
										<tr>
											<td colspan="2">
												<h5 class="font-size-14 m-0">Biaya Kirim :</h5>
											</td>
											<td>
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
										<tr class="bg-light">
											<td colspan="2">
												<h5 class="font-size-14 m-0">Total:</h5>
											</td>
											<td>
												<b>
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
													?></b>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row my-4">
						<div class="col">
							<div class="text-end mt-2 mt-sm-0">
								<button type="submit" name="add" class="btn btn-success"> <i class="uil uil-shopping-cart-alt me-1"></i> Memproses Pesanan </button>
							</div>
						</div>
						<!-- end col -->
					</div>
					<!-- end row-->
			</div>
			<!-- end row -->
			</form>
		</div>
		<!-- container-fluid -->
	</div>
	<!-- End Page-content -->


	<?php
	include "../komponen/footer.php";
	?>