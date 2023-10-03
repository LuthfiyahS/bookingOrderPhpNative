<?php
include "../../koneksi.php";

$query = mysqli_query($test, "SELECT max(id_katalog) as kodeTerbesar FROM katalog");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 4, 4);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "CTL";
$kodeBarang = $huruf . sprintf("%04s", $urutan);
//echo $kodeBarang;

$a = $kodeBarang;
$b= $_POST['nama'];

//echo $a. $b;
$tampilan = "insert into katalog(id_katalog,nama_katalog) values ('$a','$b')";
$querycrud= mysqli_query($test, $tampilan);
if($querycrud){
    echo "<script language=javascript> window.alert('Insert Berhasil'); window.location='../katalog.php';</script>";
    //echo "insert Berhasil";
    
}
else {
    echo "<script language=javascript> window.alert('Insert Gagal'); window.location='../katalog.php';</script>";
    //echo "insert Gagal!";
}

//header("location:../prodi.php");
?>