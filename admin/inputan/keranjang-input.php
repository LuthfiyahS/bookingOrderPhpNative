<?php
include "../../koneksi.php";

$query = mysqli_query($test, "SELECT max(id_cart) as kodeTerbesar FROM keranjang");
$data = mysqli_fetch_array($query);
$kode = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kode, 4, 4);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

$huruf = "CRT";
$kode = $huruf . sprintf("%04s", $urutan);
//echo $kodeBarang;

$a = $kode;
$b= $_POST['barang'];
$c= $_POST['jml'];
$d= $_POST['user'];

//echo $a. $b;
$tampilan = "insert into keranjang(id_cart,id_barang,kuantitas, id_user) values ('$a','$b','$c','$d')";
$querycrud= mysqli_query($test, $tampilan);
if($querycrud){
    echo "<script language=javascript> window.alert('Insert Berhasil'); window.location='../keranjang.php';</script>";
    //echo "insert Berhasil";
    
}
else {
    echo "<script language=javascript> window.alert('Insert Gagal'); window.location='../keranjang.php';</script>";
    //echo "insert Gagal!";
}

//header("location:../prodi.php");
?>