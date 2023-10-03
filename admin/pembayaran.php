<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from pembayaran";
$eksekusi = mysqli_query($test, "$tampil");
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Payment</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                                <li class="breadcrumb-item active">Payment</li>
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
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Add Payment</button>

                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Payment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="inputan/pembayaran-input.php" method="POST">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="iduser">Name Payment</label>
                                                    <input type="text" class="form-control" id="nama" placeholder="Enter Payment Name" name="nama">
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Account</label>
                                                    <input type="text" class="form-control" id="nama" placeholder="Enter Account Name" name="namaakun">
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">No Account</label>
                                                    <input type="text" class="form-control" id="nama" placeholder="Enter No Account" name="noakun">
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Method Payment</label>
                                                    <select class="form-control form-select" title="Country" name="metode">
                                                        <option value="-">choose method</option>
                                                        <option value="Bank">Bank</option>
                                                        <option value="Paypal">Paypal</option>
                                                    </select>
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
                                    <th>ID Pembayaran</th>
                                    <th>Nama Pembayaran</th>
                                    <th>Nama Akun</th>
                                    <th>No Akun</th>
                                    <th>Metode</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php while ($data = mysqli_fetch_array($eksekusi)) : ?>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $data['id_pembayaran'], "<br>"; ?></a> </td>
                                        <td> <span><?php echo $data['nama_pembayaran'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['nama_akun'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['no_akun'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['metode'], "<br>"; ?></span> </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".editpembayaran<?php echo $data['id_pembayaran']; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-outline-secondary btn-sm " href="delete/delete-pembayaran.php?id=<?php echo $data['id_pembayaran']; ?>" name="del" onclick="return confirm('Want to delete data?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade editpembayaran<?php echo $data['id_pembayaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <?php
                                                $x = $data['id_pembayaran'];
                                                $datapro = mysqli_query($test, "SELECT * FROM pembayaran where id_pembayaran='$x' ");
                                                $setpro = mysqli_fetch_array($datapro);
                                                ?>
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Payment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update/update-pembayaran.php" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="iduser">ID Payment</label><br>
                                                                        <input type="text" class="form-control" id="idprodi" value="<?php echo $setpro['id_pembayaran'] ?>" name="id_pembayaran" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="iduser">Name Payment</label>
                                                                        <input type="text" class="form-control" id="nama" value="<?php echo $setpro['nama_pembayaran'] ?>" name="nama">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="iduser">Name Account</label>
                                                                        <input type="text" class="form-control" id="nama" value="<?php echo $setpro['nama_akun'] ?>" name="namaakun">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="iduser">No Account</label>
                                                                        <input type="text" class="form-control" id="nama" value="<?php echo $setpro['no_akun'] ?>" name="noakun">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="iduser">Payment Method</label>
                                                                        <select class="form-control form-select" title="Country" name="metode">
                                                                            <option value="<?php echo $setpro['metode'] ?>">choose method</option>
                                                                            <option value="Bank">Bank</option>
                                                                            <option value="Paypal">Paypal</option>
                                                                        </select>
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