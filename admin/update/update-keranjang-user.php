<?php
include "../../koneksi.php";
$a = $_POST['id_cart'];
$c= $_POST['kuantitas'];

$tampilan = "UPDATE keranjang set kuantitas='$c' WHERE id_cart='$a'";
$querycrud= mysqli_query($test, $tampilan);
if($querycrud){
    echo "<script language=javascript> window.alert('Update Berhasil'); window.location='../../user/cart.php';</script>";
    
}
else {
    echo "<script language=javascript> window.alert('Update Gagal'); window.location='../../user/cart.php';</script>";
}
?>