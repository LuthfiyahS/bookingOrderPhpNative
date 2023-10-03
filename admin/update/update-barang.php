<?php
include '../../koneksi.php'; // membuka koneksi

$a = $_POST['id_barang'];
$b = $_POST['nama'];
$c = $_POST['harga'];
$d = $_POST['stok'];
$e = $_POST['deskripsi'];
$f = $_POST['merk'];
$g = $_POST['kategori'];


// ambil data file
$namaFile = $_FILES['berkasfoto']['name'];
$namaSementara = $_FILES['berkasfoto']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "../inputan/foto produk/";
if (!is_dir($dirUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($dirUpload, 0777, $rekursif = true);
}

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

if ($terupload) {
    //echo "Upload berhasil!<br/>";
    //echo "Link: <a href='" . $dirUpload . $namaFile . "'>" . $namaFile . "</a>";
    $lokasi = $dirUpload . $namaFile;
} else {
    //echo "Upload Gagal!";
}

$tampilan = "UPDATE barang set nama_barang='$b',foto_barang='$lokasi',harga='$c',stok='$d',deskripsi='$e',merek='$f',nama_kategori='$g' WHERE id_barang='$a'";
$set = mysqli_query($test, $tampilan);

if ($set) {
    echo "<script language=javascript> window.alert('Edit Berhasil'); window.location='../barang.php';</script>";
} else {
    echo "<script language=javascript> window.alert('Edit Gagal,  masukan data yang sesuai'); window.location='../barang.php';</script>";
}
