<?php
include '../../koneksi.php'; // membuka koneksi
// menyimpan data kedalam variabel
$vid = $_POST['id_katalog'];
$vnama = $_POST['nama'];
//echo $vid. 'Koneksi berhasil'.$vnama;
// query SQL untuk insert data
$query = "UPDATE katalog set nama_katalog='$vnama' WHERE id_katalog='$vid'";
$hasil = mysqli_query($test, $query);
   
if( $hasil )
{
    echo "<script language=javascript> window.alert('Edit Berhasil'); window.location='../katalog.php';</script>";
// header('Location: ../prodi.php');
} else 
 die("Gagal menyimpan perubahan...") ;