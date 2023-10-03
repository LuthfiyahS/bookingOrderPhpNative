<?php include "../komponen/header.php";
$eksekusi = mysqli_query($test, "select count(*) as total from pembayaran");
$nmbrg = mysqli_fetch_array($eksekusi);
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
                        <h4 class="mb-0">How To Order</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Cekin Shop</a></li>
                                <li class="breadcrumb-item active">How To Order</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Cara Pemesanan</h4>
                            <div class="">
                                <ul class="verti-timeline list-unstyled">
                                    <li class="event-list" style="padding: 0 0 0px 20px;">
                                        <div class="event-date text-primar">Step 01</div>
                                        <h6>Sign Up</h6>
                                        <p class="text-muted">If you want to shop but don't have an account yet, then register first by pressing sign up in the top right corner</p>
                                    </li>
                                    <li class="event-list" style="padding: 0 0 0px 20px;">
                                        <div class="event-date text-primar">Step 02</div>
                                        <h6>Sign In</h6>
                                        <p class="text-muted">You need to log in to connect with all your transactions</p>
                                    </li>
                                    <li class="event-list" style="padding: 0 0 0px 20px;">
                                        <div class="event-date text-primar">Step 03</div>
                                        <h6>Select and Add Cart</h6>
                                        <p class="text-muted">View the items and choose the one you want to buy then add it to the cart</p>
                                    </li>
                                    <li class="event-list" style="padding: 0 0 0px 20px;">
                                        <div class="event-date text-primar">Step 04</div>
                                        <h6>Checkout</h6>
                                        <p class="text-muted">Order everything in the cart, you can adjust the amount or delete the items in the cart. Then you are asked to fill in the delivery data.</p>
                                    </li>
                                    <li class="event-list" style="padding: 0 0 0px 20px;">
                                        <div class="event-date text-primar">Step 05</div>
                                        <h6>Make Payment</h6>
                                        <p class="text-muted">Make Payment and send proof of payment to our email Cekin.shop@gmail.com. Then the seller will process your order after all the steps are followed. happy shopping</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Payment</h4>
                            <div class="text-center">
                                <div class="avatar-sm mx-auto mb-4"> <span class="avatar-title bg-white rounded-circle font-size-16">
                                        <i class="uil-shopping-basket"><img src="../assets/images/payment-methods.jpg" alt="" class="avatar-title  rounded-circle font-size-16"></i>

                                    </span> </div>
                                <p class="font-16 text-muted mb-2"></p>
                                <h5><a href="#" class="text-dark"><?php echo $nmbrg['total'] ?> <span class="text-muted font-16">Payment Method</span> </a></h5>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3"> <span class="avatar-title bg-white rounded-circle font-size-18">
                                                    <i class="uil-shopping-basket"><img src="../assets/images/bca-bank-central-asia-logo.png" alt="" class="avatar-title bg-white rounded-circle font-size-16"></i>
                                                </span> </div>
                                            <h5 class="font-size-16">BCA</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3"> <span class="avatar-title bg-white  font-size-16">
                                                    <i class="uil-shopping-basket"><img src="../assets/images/BNI_logo.svg.png" alt="" class="avatar-title  bg-white font-size-16"></i>
                                                </span> </div>
                                            <h5 class="font-size-16">BNI</h5>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3"> <span class="avatar-title rounded-circle bg-white font-size-16">
                                                    <i class="uil-shopping-basket"><img src="../assets/images/dana-min.png" alt="" class="avatar-title bg-white  rounded-circle font-size-16"></i>
                                                </span> </div>
                                            <h5 class="font-size-16">DANA</h5>
                                            <!--<p class="text-muted mb-0">104 sales</p>-->
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="social-source text-center mt-3">
                                            <div class="avatar-xs mx-auto mb-3"> <span class="avatar-title rounded-circle bg-white font-size-16">
                                                    <i class="uil-shopping-basket"><img src="../assets/images/unnamed.png" alt="" class="avatar-title bg-white  rounded-circle font-size-16"></i>
                                                </span> </div>
                                            <h5 class="font-size-15">GOPAY</h5>
                                            <!--<p class="text-muted mb-0">104 sales</p>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        </div>
        <?php include "../komponen/footer.php"; ?>