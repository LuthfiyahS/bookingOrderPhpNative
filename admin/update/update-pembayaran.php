<?php
include '../../koneksi.php'; // membuka koneksi
// menyimpan data kedalam variabel
$vid = $_POST['id_pembayaran'];
$vnama = $_POST['nama'];
$vnamaakun = $_POST['namaakun'];
$vnoakun = $_POST['noakun'];
$vmetode = $_POST['metode'];

// query SQL untuk insert data
$query = "UPDATE pembayaran set nama_pembayaran='$vnama',nama_akun='$vnamaakun',no_akun='$vnoakun',metode='$vmetode' WHERE id_pembayaran='$vid'";
$hasil = mysqli_query($test, $query);
   
if( $hasil )
{
    echo "<script language=javascript> window.alert('Edit Berhasil'); window.location='../pembayaran.php';</script>";
// header('Location: ../prodi.php');
} else 
 die("Gagal menyimpan perubahan...") ;