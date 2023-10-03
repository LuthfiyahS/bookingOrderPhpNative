<?php
//include "../jegal.php";
include "../admkomponen/header.php";
include "../admkomponen/sidebar.php";
include "../koneksi.php";
//@session_start();
$tampil = "select * from user";
$eksekusi = mysqli_query($test, "$tampil");
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">User</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                                <li class="breadcrumb-item active">User</li>
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
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".modal" style="margin-bottom: 1rem;"><i class="mdi mdi-plus me-1"></i>Add User</button>

                        <div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="inputan/user-input.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Name</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="Enter Name" name="nama">
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Telepon</label>
                                                            <input type="text" class="form-control" id="nama" placeholder="Enter Telepon" name="nohp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Email</label>
                                                    <input type="email" class="form-control" id="nama" placeholder="Enter Email" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Password</label>
                                                    <input type="password" class="form-control" id="nama" placeholder="Enter Password" name="password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="iduser">Foto Profil</label>
                                                    <input type="file" class="form-control" id="resume" name="berkas">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Level User</label>
                                                            <select class="form-control form-select" title="Country" name="level">
                                                                <option value="-">Choose Level</option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="User">User</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <label for="iduser">Status User</label>
                                                            <select class="form-control form-select" title="Country" name="status">
                                                                <option value="-">Choose Status</option>
                                                                <option value="Aktif">Active</option>
                                                                <option value="Tidak Aktif">DeActive</option>
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
                                    <th>ID User</th>
                                    <th>Name</th>
                                    <th>Foto Profil</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Level User</th>
                                    <th>Status</th>
                                    <th>Join Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_array($eksekusi)) : ?>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-dark fw-bold"><?php echo $data['id_user'], "<br>"; ?></a> </td>
                                        <td> <span><?php echo $data['nama'], "<br>"; ?></span> </td>
                                        <td> <img src="<?php echo "inputan/" . $data["foto_profil"]; ?>" alt="" height="50" width="auto"> </td>
                                        <td> <span><?php echo $data['email'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['telepon'], "<br>"; ?></span> </td>
                                        <td> <span><?php echo $data['level_user'], "<br>"; ?></span> </td>
                                        <td> <?php if ($data['status'] == 'Tidak Aktif') {
														echo "<div class='badge bg-pill bg-soft-danger font-size-12'>" . $data['status'], "<br></div>";
													} else {
														echo "<div class='badge bg-pill bg-soft-success font-size-12'>" . $data['status'], "<br></div>";
													}
													?> </td>
                                        <td> <span><?php echo $data['tgl_daftar'], "<br>"; ?></span> </td>
                                        <td>
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target=".editkatalog<?php echo $data['id_user']; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            
                                            <a class="btn btn-outline-secondary btn-sm " href="delete/delete-pengguna.php?id=<?php echo $data['id_user']; ?>" name="del" onclick="return confirm('Want to delete data?');">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade editkatalog<?php echo $data['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <?php
                                                $x = $data['id_user'];
                                                $datapro = mysqli_query($test, "SELECT * FROM user where id_user='$x' ");
                                                $setpro = mysqli_fetch_array($datapro);
                                                ?>
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update/update-pengguna.php" method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    
                                                                <div class="form-group">
                                                                        <label for="iduser">Id User</label>
                                                                        <input type="text" class="form-control" id="nama" value="<?php echo $setpro['id_user'] ?>" name="id_user" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <label for="iduser">Name</label>
                                                                                <input type="text" class="form-control" id="nama" value="<?php echo $setpro['nama'] ?>" name="nama">
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <label for="iduser">Telepon</label>
                                                                                <input type="text" class="form-control" id="nama" value="<?php echo $setpro['telepon'] ?>" name="nohp">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="iduser">Email</label>
                                                                        <input type="email" class="form-control" id="nama" value="<?php echo $setpro['email'] ?>" name="email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="iduser">Password</label>
                                                                        <input type="password" class="form-control" id="nama" value="<?php echo $setpro['passwd'] ?>" name="password">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="iduser">Foto Profil</label>
                                                                        <input type="file" class="form-control" id="resume" name="pp">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <label for="iduser">Level User</label>
                                                                                <select class="form-control form-select" title="Country" name="level">
                                                                                    <option value="-">Choose Level</option>
                                                                                    <option value="Administrator">Administrator</option>
                                                                                    <option value="User">User</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <label for="iduser">Status User</label>
                                                                                <select class="form-control form-select" title="Country" name="status">
                                                                                    <option value="-">Choose Status</option>
                                                                                    <option value="Aktif">Active</option>
                                                                                    <option value="Tidak Aktif">DeActive</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
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