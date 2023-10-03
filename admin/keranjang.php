<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from keranjang";
$eksekusii = mysqli_query($test, "$tampil");
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Transactions</a></li>
                                <li class="breadcrumb-item active">Cart</li>
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
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Add Cart</button>
                        <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Cart</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="inputan/keranjang-input.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="iduser">Name</label>
                                                    <select class="form-control form-select" title="Country" name="user">
                                                        <option value="-">Choose User</option>
                                                        <?php $look = "select * from user";
                                                        $eksek = mysqli_query($test, "$look");
                                                        while ($data = mysqli_fetch_array($eksek)) : ?>
                                                            <option value="<?php echo $data['id_user'] ?>"><?php echo $data['nama']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Product Name</label>
                                                    <select class="form-control form-select" title="Country" name="barang">
                                                        <option value="-">Choose Product</option>
                                                        <?php $look = "select * from barang";
                                                        $eksek = mysqli_query($test, "$look");
                                                        while ($data = mysqli_fetch_array($eksek)) : ?>
                                                            <option value="<?php echo $data['id_barang'] ?>"><?php echo $data['nama_barang']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Quantinty</label>
                                                    <input type="number" class="form-control" id="resume" name="jml">
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
                                    <th>No</th>
                                    <th>ID Barang</th>
                                    <th>Jumlah</th>
                                    <th>Id User</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_array($eksekusii)) : ?>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $data['id_cart'], "<br>"; ?></a> </td>
                                        <td> <span><?php echo $data['id_barang'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['kuantitas'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['id_user'], "<br>"; ?></span> </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".edit<?php echo $data['id_cart']; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a class="btn btn-outline-secondary btn-sm " href="delete/delete-keranjang.php?id=<?php echo $data['id_cart']; ?>" name="del" onclick="return confirm('Want to delete data?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade edit<?php echo $data['id_cart']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <?php
                                        $x = $data['id_cart'];
                                        $datapro = mysqli_query($test, "SELECT * FROM keranjang where id_cart='$x' ");
                                        $setpro = mysqli_fetch_array($datapro);
                                        ?>
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Cart</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update/update-keranjang.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                    <label for="iduser">Id Cart</label>
                                                                <input type="text" class="form-control" id="nama" value="<?php echo $setpro['id_cart'] ?>" name="id_cart" readonly>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    
                                                                <label for="iduser">Id User</label>
                                                                <input type="text" class="form-control" id="nama" value="<?php echo $setpro['id_user'] ?>" name="id_user" readonly>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="iduser">Id Product</label>
                                                                <input type="text" class="form-control" id="nama" value="<?php echo $setpro['id_barang'] ?>" name="barang" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="iduser">Quantinty</label>
                                                                <input type="number" class="form-control" id="nama" value="<?php echo $setpro['kuantitas'] ?>" name="jml">
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