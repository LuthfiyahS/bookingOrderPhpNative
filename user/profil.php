<?php
include "../jegal.php";
include "../komponen/header.php";

?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content" >
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">My Profile</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Cekin Shop</a></li>
                                <li class="breadcrumb-item active">My Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row" >
                <div class="col-xl-4" style="margin-bottom: 1rem;">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown float-end">
                                    <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"> <i class="uil uil-ellipsis-v"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-end"> <a class="dropdown-item" href="#">Edit</a> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Remove</a> </div>
                                </div>
                                <div class="clearfix"></div>
                                <div> <img src="<?php echo $_SESSION['pp'];?>" alt="" class="avatar-lg rounded-circle img-thumbnail"> </div>
                                <h5 class="mt-3 mb-1"><?php echo $_SESSION['nama'];?></h5> 
                                <p class="text-muted"><?php echo $_SESSION['level'];?></p>
                            </div>
                            <hr class="my-4">
                            <div class="text-muted">
                                <div class="table-responsive mt-4">
                                    <div>
                                        <p class="mb-1">Name :</p>
                                        <h5 class="font-size-16"><?php echo $_SESSION['nama'];?></h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">Telepon :</p>
                                        <h5 class="font-size-16"><?php echo $_SESSION['hp'];?></h5>
                                    </div>
                                    <div class="mt-4">
                                        <p class="mb-1">E-mail :</p>
                                        <h5 class="font-size-16"><?php echo $_SESSION['username'];?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card mb-0">
                        <div class="card-body">
                            <h4 class="card-title">Setting Account</h4>
                            <?php
			$username = $_SESSION['username']; // mengambil username dari session yang login
			
			$sql = $test->query("SELECT * FROM user WHERE email='$username'"); // query memilih entri username pada database
			if(mysqli_num_rows($sql) == 0){
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
                            <form action="../admin/update/proses-edit-akun.php" method="POST" class="needs-validation"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom01">Name</label>
                                            <input type="text" class="form-control" id="validationCustom01" placeholder="name" name="nama" value="<?php echo $row['nama'];?>">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="basicpill">Upload Profil</label>
                                                    <input type="file" class="form-control" id="resume" name="berkas" value="<?php echo $row['foto_profil'];?>">

                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom02">Email</label>
                                            <input type="Email" class="form-control" id="validationCustom02" placeholder="email" name="email"value="<?php echo $row['email'];?>" >
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom03">No Hp</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="" name="hp" value="<?php echo $row['telepon'];?>" >
                                            <div class="invalid-feedback">
                                                Please provide a valid number.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="validationCustom04">Password</label>
                                            <input type="password" class="form-control" name="passwd" id="validationCustom04" placeholder="" value="<?php echo $row['passwd'];?>">
                                            <div class="invalid-feedback">
                                                Please provide a valid state.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        </div>

        <?php
        include "../komponen/footer.php";
        ?>