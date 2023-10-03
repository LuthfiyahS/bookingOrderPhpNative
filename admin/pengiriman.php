<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from info_pesanan";
$eksekusi = mysqli_query($test, "$tampil");
$tampilpes = "select * from pesanan";
$eksekusi2 = mysqli_query($test, "$tampilpes");
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Shipping</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Transactions</a></li>
                                <li class="breadcrumb-item active">Shipping</li>
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
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Add Shipping Info</button>



                        <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Shipping Info</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="inputan/info-input.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="iduser">Id Order</label>
                                                    <select class="form-control form-select" title="Country" name="pesanan">
                                                        <option value="-">Choose Id Shipping</option>
                                                        <?php while ($data1 = mysqli_fetch_array($eksekusi2)) : ?>
                                                            <option value="<?php echo $data1['id_pesanan']?>"><?php echo $data1['id_pesanan']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Status</label>
                                                    <textarea class="form-control" id="nama" placeholder="Enter Status" name="status"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Location</label>
                                                    <input type="text" class="form-control" id="nama" placeholder="Enter Location" name="lokasi">
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
                                    <th>ID Pesanan</th>
                                    <th>Status </th>
                                    <th>Loacation</th>
                                    <th>Update Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_array($eksekusi)) : ?>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $data['id_pesanan'], "<br>"; ?></a> </td>
                                        <td> <span><?php echo $data['status_pengiriman'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['lokasi'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['tgl_update'], "<br>"; ?></span> </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".edituser<?php echo $data['id_pengiriman']; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-outline-secondary btn-sm " href="delete/delete-info.php?id=<?php echo $data['id_pengiriman']; ?>" name="del" onclick="return confirm('Want to delete data?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade edituser<?php echo $data['id_pengiriman']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <?php
                                        $x = $data['id_pengiriman'];
                                        $datapro = mysqli_query($test, "SELECT * FROM info_pesanan where id_pengiriman='$x' ");
                                        $setpro = mysqli_fetch_array($datapro);
                                        ?>
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Info</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update/update-pengiriman.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                            
                                                                    <input type="text" class="form-control" id="nama" value="<?php echo $setpro['id_pengiriman'] ?>"  name="id_pengiriman" readonly style="border: none; background-color:transparent; color:transparent; margin-top: -3.5rem;">
                                                            
                                                                <div class="form-group">
                                                                    <label for="iduser">Id Pesanan</label>
                                                                    <input type="text" class="form-control" id="nama" value="<?php echo $setpro['id_pesanan'] ?>"  name="id_pesanan" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="iduser">Status</label>
                                                                    <input type="text" class="form-control" id="nama" value="<?php echo $setpro['status_pengiriman'] ?>"  name="status">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="iduser">Location</label>
                                                                    <input type="text" class="form-control" id="nama" value="<?php echo $setpro['lokasi'] ?>"  name="lokasi">
                                                                </div>

                                                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                                    <button type="submit" name="add" class="btn btn-success">Update Data</button>
                                                                </div>
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