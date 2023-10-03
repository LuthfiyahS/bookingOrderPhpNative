<?php
include '../../koneksi.php'; // membuka koneksi

$a = $_POST['id_user'];
$b = $_POST['nama'];
$c = $_POST['email'];
$d = $_POST['nohp'];
$e = $_POST['password'];
//$e= md5($e);
$f = $_POST['level'];
$g = $_POST['status'];


// ambil data file
$namaFile = $_FILES['pp']['name'];
$namaSementara = $_FILES['pp']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "../inputan/foto profil/";
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

$tampilan = "UPDATE user set nama='$b',email='$c',telepon='$d',passwd='$e',foto_profil='$lokasi',level_user='$f',status='$g' WHERE id_user='$a'";
$set = mysqli_query($test, $tampilan);

if ($set) {
    echo "<script language=javascript> window.alert('Edit Berhasil'); window.location='../pengguna.php';</script>";
} else {
    echo "<script language=javascript> window.alert('Edit Gagal,  masukan data yang sesuai'); window.location='../pengguna.php';</script>";
}
