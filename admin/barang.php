<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from barang";
$eksekusi = mysqli_query($test, "$tampil");
$bayar = "select * from katalog";
$eksekbayar = mysqli_query($test, "$bayar");
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Product</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                                <li class="breadcrumb-item active">Product</li>
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
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Add Product</button>



                        <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Product </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="inputan/barang-input.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Name</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="enter name.." name="nama">
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Foto</label>
                                                            <input type="file" class="form-control" id="resume" name="berkas">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Price</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="enter price" name="harga">
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Stock</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="enter stock" name="stok">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Description</label>
                                                    <textarea class="form-control" id="nama" placeholder="enter description" name="deskripsi"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <label for="iduser">category</label>
                                                            <select class="form-control form-select" title="Country" name="kategori">
                                                                <option value="-">choose category</option>
                                                                <?php while ($data = mysqli_fetch_array($eksekbayar)) : ?>
                                                                    <option value="<?php echo $data['nama_katalog'] ?>"> <?php echo $data['nama_katalog']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                                    </div>
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
                                    <th>ID Barang</th>
                                    <th>Name </th>
                                    <th>Foto </th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_array($eksekusi)) : ?>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $data['id_barang'], "<br>"; ?></a> </td>
                                        <td> <span><?php echo $data['nama_barang'], "<br>"; ?></span> </td>
                                        <td> <img src="<?php echo "inputan/" . $data["foto_barang"]; ?>" alt="" height="50" width="auto"> </td>
                                        <td> <span><?php echo $data['harga'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['stok'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['deskripsi'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['nama_kategori'], "<br>"; ?></span> </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".edituser<?php echo $data['id_barang']; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-outline-secondary btn-sm " href="delete/delete-barang.php?id=<?php echo $data['id_barang']; ?>" name="del" onclick="return confirm('Want to delete data?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade edituser<?php echo $data['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <?php
                                        $x = $data['id_barang'];
                                        $datapro = mysqli_query($test, "SELECT * FROM barang where id_barang='$x' ");
                                        $setpro = mysqli_fetch_array($datapro);
                                        ?>
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="update/update-barang.php" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="iduser">Id Product</label>
                                                                <input type="text" class="form-control" id="nama" value="<?php echo $setpro['id_barang'] ?>" name="id_barang" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <label for="iduser">Name</label>
                                                                        <input type="text" class="form-control" id="nama" value="<?php echo $setpro['nama_barang'] ?>" name="nama">
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <label for="iduser">Foto </label>
                                                                        <input type="file" class="form-control" id="resume" name="berkasfoto">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <label for="iduser">Price </label>
                                                                        <input type="number" class="form-control" id="nama" value="<?php echo $setpro['harga'] ?>" name="harga">
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <label for="iduser">Stock</label>
                                                                        <input type="number" class="form-control" id="nama" value="<?php echo $setpro['stok'] ?>" name="stok">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="iduser">Deskripsi</label>
                                                                <textarea class="form-control" id="nama" value="<?php echo $setpro['deskripsi'] ?>" name="deskripsi"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <label for="iduser">Category </label>
                                                                        <select class="form-control form-select" title="Country" name="kategori">
                                                                            <option value="-">Choose Category</option>
                                                                            <?php $bayar2 = "select * from katalog";
                                                                    $eksekbayar2 = mysqli_query($test, "$bayar2");
                                                                            while ($data = mysqli_fetch_array($eksekbayar2)) : ?>
                                                                                <option value="<?php echo $data['nama_katalog'] ?>"> <?php echo $data['nama_katalog']; ?></option>
                                                                            <?php endwhile; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                                                <button type="submit" name="add" class="btn btn-success">Add</button>
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