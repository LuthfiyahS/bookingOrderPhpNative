<?php
include "../../koneksi.php";


$a = $_POST['id_pengiriman'];
$d= $_POST['status'];
$e= $_POST['lokasi'];
$f= $_POST['pesanan'];


$tampilan = "UPDATE info_pesanan set status_pengiriman='$d',lokasi='$e'
            where id_pengiriman='$a'";
$querycrud= mysqli_query($test, $tampilan);
if($querycrud){
    echo "<script language=javascript> window.alert('Edit Berhasil'); window.location='../pengiriman.php';</script>";    
}
else {
    echo "<script language=javascript> window.alert('Edit Gagal'); window.location='../pengiriman.php';</script>";
 
}
?>
