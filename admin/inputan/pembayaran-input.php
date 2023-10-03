<?php
include "../../koneksi.php";

$query = mysqli_query($test, "SELECT max(id_pembayaran) as kodeTerbesar FROM pembayaran");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
 
$urutan = (int) substr($kodeBarang, 4, 4);
 

$urutan++;
 
$huruf = "PAY";
$kodeBarang = $huruf . sprintf("%04s", $urutan);
//echo $kodeBarang;

$a = $kodeBarang;
$b= $_POST['nama'];
$c= $_POST['namaakun'];
$d= $_POST['noakun'];
$e= $_POST['metode'];

//echo $a. $b;
$tampilan = "insert into pembayaran(id_pembayaran,nama_pembayaran,nama_akun,no_akun,metode) values ('$a','$b','$c','$d','$e')";
$querycrud= mysqli_query($test, $tampilan);
if($querycrud){
    echo "<script language=javascript> window.alert('Insert Berhasil'); window.location='../pembayaran.php';</script>";
    //echo "insert Berhasil";
    
}
else {
    echo "<script language=javascript> window.alert('Insert Gagal'); window.location='../pembayaran.php';</script>";
    //echo "insert Gagal!";
}

//header("location:../prodi.php");
