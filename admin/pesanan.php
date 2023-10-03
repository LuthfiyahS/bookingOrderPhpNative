<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from pesanan";
$eksekusi = mysqli_query($test, "$tampil");
$bayar = "select * from pembayaran";
$eksekbayar = mysqli_query($test, "$bayar");

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Order</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Transactions</a></li>
                                <li class="breadcrumb-item active">Order</li>
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
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Add Order</button>



                        <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Order</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="inputan/pesanan-input.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="iduser">Name recipient's </label>
                                                    <input type="text" class="form-control" id="nama" placeholder="Enter recipient's name" name="nama">

                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6">
                                                            <label for="iduser">Email recipient's </label>
                                                            <input type="text" class="form-control" id="nama" placeholder="Emter recipient's email" name="email">
                                                        </div>
                                                        <div class="col-xl-6 col-xl-6">
                                                            <label for="iduser">Telepon recipient's </label>
                                                            <input type="text" class="form-control" id="nama" placeholder="Enter recipient's telepon" name="telepon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Alamat</label>
                                                    <textarea class="form-control" id="nama" placeholder="Masukan Alamat" name="alamat"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-4">
                                                            <label for="iduser">Country</label>
                                                            <select class="form-control form-select" title="Country" name="negara">
                                                                <option value="0">Pilih Negara</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AS">American Samoa</option>
                                                                <option value="AQ">Antarctica</option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AU">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="BS">Bahamas</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BD">Bangladesh</option>
                                                                <option value="BO">Bolivia</option>
                                                                <option value="BW">Botswana</option>
                                                                <option value="BV">Bouvet Island</option>
                                                                <option value="BR">Brazil</option>
                                                                <option value="BN">Brunei Darussalam</option>
                                                                <option value="BG">Bulgaria</option>
                                                                <option value="CA">Canada</option>
                                                                <option value="CL">Chile</option>
                                                                <option value="CN">China</option>
                                                                <option value="CO">Colombia</option>
                                                                <option value="CG">Congo</option>
                                                                <option value="DK">Denmark</option>
                                                                <option value="DJ">Djibouti</option>
                                                                <option value="EC">Ecuador</option>
                                                                <option value="EG">Egypt</option>
                                                                <option value="SV">El Salvador</option>
                                                                <option value="EE">Estonia</option>
                                                                <option value="ET">Ethiopia</option>
                                                                <option value="FI">Finland</option>
                                                                <option value="FR">France</option>
                                                                <option value="GF">French Guiana</option>
                                                                <option value="PF">French Polynesia</option>
                                                                <option value="GE">Georgia</option>
                                                                <option value="DE">Germany</option>
                                                                <option value="GH">Ghana</option>
                                                                <option value="GI">Gibraltar</option>
                                                                <option value="GR">Greece</option>
                                                                <option value="GL">Greenland</option>
                                                                <option value="GD">Grenada</option>
                                                                <option value="GT">Guatemala</option>
                                                                <option value="HT">Haiti</option>
                                                                <option value="HK">Hong Kong</option>
                                                                <option value="HU">Hungary</option>
                                                                <option value="IS">Iceland</option>
                                                                <option value="IN">India</option>
                                                                <option value="ID">Indonesia</option>
                                                                <option value="IQ">Iraq</option>
                                                                <option value="IE">Ireland</option>
                                                                <option value="IL">Israel</option>
                                                                <option value="IT">Italy</option>
                                                                <option value="JM">Jamaica</option>
                                                                <option value="JP">Japan</option>
                                                                <option value="KR">Korea, Republic of</option>
                                                                <option value="KW">Kuwait</option>
                                                                <option value="MG">Madagascar</option>
                                                                <option value="MY">Malaysia</option>
                                                                <option value="MV">Maldives</option>
                                                                <option value="MX">Mexico</option>
                                                                <option value="MD">Moldova, Republic of</option>
                                                                <option value="NL">Netherlands</option>
                                                                <option value="AN">Netherlands Antilles</option>
                                                                <option value="NC">New Caledonia</option>
                                                                <option value="NZ">New Zealand</option>
                                                                <option value="NG">Nigeria</option>
                                                                <option value="PG">Papua New Guinea</option>
                                                                <option value="PY">Paraguay</option>
                                                                <option value="PE">Peru</option>
                                                                <option value="PH">Philippines</option>
                                                                <option value="PL">Poland</option>
                                                                <option value="PT">Portugal</option>
                                                                <option value="QA">Qatar</option>
                                                                <option value="RE">Reunion</option>
                                                                <option value="RO">Romania</option>
                                                                <option value="RU">Russian Federation</option>
                                                                <option value="SI">Slovenia</option>
                                                                <option value="SB">Solomon Islands</option>
                                                                <option value="SO">Somalia</option>
                                                                <option value="SD">Sudan</option>
                                                                <option value="SR">Suriname</option>
                                                                <option value="SZ">Swaziland</option>
                                                                <option value="CH">Switzerland</option>
                                                                <option value="SY">Syrian Arab Republic</option>
                                                                <option value="TW">Taiwan, Province of China</option>
                                                                <option value="TJ">Tajikistan</option>
                                                                <option value="TZ">Tanzania, United Republic of</option>
                                                                <option value="UA">Ukraine</option>
                                                                <option value="AE">United Arab Emirates</option>
                                                                <option value="GB">United Kingdom</option>
                                                                <option value="YE">Yemen</option>
                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-4">
                                                            <label for="iduser">City</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Kota atau Provinsi" name="kota">
                                                        </div>
                                                        <div class="col-xl-4">
                                                            <label for="iduser">Postal Code</label>
                                                            <input type="number" class="form-control" id="nama" placeholder="Masukan Kode Pos" name="pos">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="iduser">Payment Method</label>
                                                    <select class="form-control form-select" title="Country" name="pembayaran">
                                                        <option value="-">Choose Metode</option>
                                                        <?php while ($data = mysqli_fetch_array($eksekbayar)) : ?>
                                                            <option value="<?php echo $data['id_pembayaran'] ?>"><?php echo $data['nama_pembayaran']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                <button type="submit" name="add" class="btn btn-success">Add Order</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID Pesanan</th>
                                    <th>ID User</th>
                                    <th>Recipient Name</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Address</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
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
                                        <td> <?php if ($data['status'] == 'Belum Bayar') {
														echo "<div class='badge bg-pill bg-soft-danger font-size-12'>" . $data['status'], "<br></div>";
													} elseif($data['status'] == 'Dikemas') {
														echo "<div class='badge bg-pill bg-soft-warning font-size-12'>" . $data['status'], "<br></div>";
													} elseif($data['status'] == 'Dikirim') {
														echo "<div class='badge bg-pill bg-soft-info font-size-12'>" . $data['status'], "<br></div>";
													} elseif($data['status'] == 'Selesai') {
														echo "<div class='badge bg-pill bg-soft-success font-size-12'>" . $data['status'], "<br></div>";
													}
                                                    
													?> </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".edituser<?php echo $data['id_pesanan']; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-outline-secondary btn-sm " title="Hapus" href="delete/delete-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" name="del" onclick="return confirm('Yakin Hapus data?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a class="btn btn-outline-secondary btn-sm" title="View Detail" href="detail-pesanan.php?id=<?php echo $data['id_pesanan']; ?>" name="detail">
                                                <i class="bx bx-spreadsheet"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade edituser<?php echo $data['id_pesanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <?php
                                        $x = $data['id_pesanan'];
                                        $datapro = mysqli_query($test, "SELECT * FROM pesanan where id_pesanan='$x' ");
                                        $setpro = mysqli_fetch_array($datapro);
                                        ?>
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit recipient's </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update/update-pesanan.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="iduser">Id Order</label>
                                                                <input type="text" class="form-control" id="nama" value="<?php echo $setpro['id_pesanan'] ?>" name="id_pesanan" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="iduser">Nama recipient's </label>
                                                                <input type="text" class="form-control" id="nama" value="<?php echo $setpro['nama_penerima'] ?>" name="nama">
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-md-6">
                                                                        <label for="iduser">Email recipient's </label>
                                                                        <input type="text" class="form-control" id="nama" value="<?php echo $setpro['email_penerima'] ?>" name="email">
                                                                    </div>
                                                                    <div class="col-xl-6 col-xl-6">
                                                                        <label for="iduser">Telepon recipient's </label>
                                                                        <input type="text" class="form-control" id="nama" value="<?php echo $setpro['telepon_penerima'] ?>" name="telepon">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="iduser">Alamat</label>
                                                                <textarea class="form-control" id="nama" name="alamat"><?php echo $setpro['alamat_penerima'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xl-4">
                                                                        <label for="iduser">Country</label>
                                                                        <select class="form-control form-select" title="Country" value="<?php echo $setpro['negara'] ?>" name="negara">
                                                                            <option value="0">Pilih Negara</option>
                                                                            <option value="AF">Afghanistan</option>
                                                                            <option value="AS">American Samoa</option>
                                                                            <option value="AQ">Antarctica</option>
                                                                            <option value="AR">Argentina</option>
                                                                            <option value="AU">Australia</option>
                                                                            <option value="AT">Austria</option>
                                                                            <option value="BS">Bahamas</option>
                                                                            <option value="BH">Bahrain</option>
                                                                            <option value="BD">Bangladesh</option>
                                                                            <option value="BO">Bolivia</option>
                                                                            <option value="BW">Botswana</option>
                                                                            <option value="BV">Bouvet Island</option>
                                                                            <option value="BR">Brazil</option>
                                                                            <option value="BN">Brunei Darussalam</option>
                                                                            <option value="BG">Bulgaria</option>
                                                                            <option value="CA">Canada</option>
                                                                            <option value="CL">Chile</option>
                                                                            <option value="CN">China</option>
                                                                            <option value="CO">Colombia</option>
                                                                            <option value="CG">Congo</option>
                                                                            <option value="DK">Denmark</option>
                                                                            <option value="DJ">Djibouti</option>
                                                                            <option value="EC">Ecuador</option>
                                                                            <option value="EG">Egypt</option>
                                                                            <option value="SV">El Salvador</option>
                                                                            <option value="EE">Estonia</option>
                                                                            <option value="ET">Ethiopia</option>
                                                                            <option value="FI">Finland</option>
                                                                            <option value="FR">France</option>
                                                                            <option value="GF">French Guiana</option>
                                                                            <option value="PF">French Polynesia</option>
                                                                            <option value="GE">Georgia</option>
                                                                            <option value="DE">Germany</option>
                                                                            <option value="GH">Ghana</option>
                                                                            <option value="GI">Gibraltar</option>
                                                                            <option value="GR">Greece</option>
                                                                            <option value="GL">Greenland</option>
                                                                            <option value="GD">Grenada</option>
                                                                            <option value="GT">Guatemala</option>
                                                                            <option value="HT">Haiti</option>
                                                                            <option value="HK">Hong Kong</option>
                                                                            <option value="HU">Hungary</option>
                                                                            <option value="IS">Iceland</option>
                                                                            <option value="IN">India</option>
                                                                            <option value="ID">Indonesia</option>
                                                                            <option value="IQ">Iraq</option>
                                                                            <option value="IE">Ireland</option>
                                                                            <option value="IL">Israel</option>
                                                                            <option value="IT">Italy</option>
                                                                            <option value="JM">Jamaica</option>
                                                                            <option value="JP">Japan</option>
                                                                            <option value="KR">Korea, Republic of</option>
                                                                            <option value="KW">Kuwait</option>
                                                                            <option value="MG">Madagascar</option>
                                                                            <option value="MY">Malaysia</option>
                                                                            <option value="MV">Maldives</option>
                                                                            <option value="MX">Mexico</option>
                                                                            <option value="MD">Moldova, Republic of</option>
                                                                            <option value="NL">Netherlands</option>
                                                                            <option value="AN">Netherlands Antilles</option>
                                                                            <option value="NC">New Caledonia</option>
                                                                            <option value="NZ">New Zealand</option>
                                                                            <option value="NG">Nigeria</option>
                                                                            <option value="PG">Papua New Guinea</option>
                                                                            <option value="PY">Paraguay</option>
                                                                            <option value="PE">Peru</option>
                                                                            <option value="PH">Philippines</option>
                                                                            <option value="PL">Poland</option>
                                                                            <option value="PT">Portugal</option>
                                                                            <option value="QA">Qatar</option>
                                                                            <option value="RE">Reunion</option>
                                                                            <option value="RO">Romania</option>
                                                                            <option value="RU">Russian Federation</option>
                                                                            <option value="SI">Slovenia</option>
                                                                            <option value="SB">Solomon Islands</option>
                                                                            <option value="SO">Somalia</option>
                                                                            <option value="SD">Sudan</option>
                                                                            <option value="SR">Suriname</option>
                                                                            <option value="SZ">Swaziland</option>
                                                                            <option value="CH">Switzerland</option>
                                                                            <option value="SY">Syrian Arab Republic</option>
                                                                            <option value="TW">Taiwan, Province of China</option>
                                                                            <option value="TJ">Tajikistan</option>
                                                                            <option value="TZ">Tanzania, United Republic of</option>
                                                                            <option value="UA">Ukraine</option>
                                                                            <option value="AE">United Arab Emirates</option>
                                                                            <option value="GB">United Kingdom</option>
                                                                            <option value="YE">Yemen</option>
                                                                            <option value="ZM">Zambia</option>
                                                                            <option value="ZW">Zimbabwe</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label for="iduser">City</label>
                                                                        <input type="text" class="form-control" id="nama" value="<?php echo $setpro['kota'] ?>" name="kota">
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label for="iduser">Postal Code</label>
                                                                        <input type="number" class="form-control" id="nama" value="<?php echo $setpro['kode_pos'] ?>" name="pos">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="iduser">Payment Method</label>
                                                                <select class="form-control form-select" title="Country" name="pembayaran">
                                                                    <option value="<?php echo $setpro['id_pembayaran'] ?>">Choose Method</option>
                                                                    <?php $bayar2 = "select * from pembayaran";
                                                                    $eksekbayar2 = mysqli_query($test, "$bayar2");
                                                                    while ($data = mysqli_fetch_array($eksekbayar2)) : ?>
                                                                        <option value="<?php echo $data['id_pembayaran'] ?>"><?php echo $data['nama_pembayaran']; ?></option>
                                                                    <?php endwhile; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="iduser">Status Order</label>
                                                                <select class="form-control form-select" title="Country" name="status" value="<?php echo $setpro['status'] ?>">
                                                                    <option  value="<?php echo $setpro['status'] ?>">Pilih Status</option>
                                                                    <option value="Belum Bayar">UnPaid</option>
                                                                    <option value="Dikemas">Packed</option>
                                                                    <option value="Dikirim">Shipping</option>
                                                                    <option value="Selesai">Finish</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                            <button type="submit" name="add" class="btn btn-success">Update Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
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