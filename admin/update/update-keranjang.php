<?php
include "../../koneksi.php";
$a = $_POST['id_cart'];
$b= $_POST['barang'];
$c= $_POST['jml'];
$d= $_POST['id_user'];

$tampilan = "UPDATE keranjang set kuantitas='$c' WHERE id_cart='$a'";
$querycrud= mysqli_query($test, $tampilan);
if($querycrud){
    echo "<script language=javascript> window.alert('Update Berhasil'); window.location='../keranjang.php';</script>";
    
}
else {
    echo "<script language=javascript> window.alert('Update Gagal'); window.location='../keranjang.php';</script>";
}
?>