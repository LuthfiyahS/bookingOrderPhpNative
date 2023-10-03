<?php
include "../../koneksi.php";
$files = $_FILES;
// echo "<pre>";
// print_r($files);
// echo "</pre>";

$query = mysqli_query($test, "SELECT max(id_barang) as kodeTerbesar FROM barang");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

$urutan = (int) substr($kodeBarang, 4, 4);


$urutan++;
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%04s", $urutan);
//echo $kodeBarang;

$a = $kodeBarang;
$b = $_POST['nama'];
$c = $_POST['harga'];
$d = $_POST['stok'];
$e = $_POST['deskripsi'];
//$e= md5($e);
$f = $_POST['merk'];
$g = $_POST['kategori'];


// ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "foto produk/";
if (!is_dir($dirUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($dirUpload, 0777, $rekursif = true);
}

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

if ($terupload) {
    //echo "Upload berhasil!<br/>";
    //echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    $lokasi = $dirUpload . $namaFile;
} else {
    //echo "Upload Gagal!";
}

$tampilan = "insert into barang(id_barang,nama_barang,foto_barang,harga,stok,deskripsi,merek,nama_kategori)
            values ('$a','$b','$lokasi','$c','$d','$e','$f','$g')";
$set = mysqli_query($test, $tampilan);

if ($set) {
    echo "<script language=javascript> window.alert('Insert Berhasil'); window.location='../barang.php';</script>";
} else {
    echo "gagal insert, masukan data yang sesuai <br>";
}
