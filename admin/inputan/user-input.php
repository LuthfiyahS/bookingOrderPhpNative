<?php
include "../../koneksi.php";
$files = $_FILES;
// echo "<pre>";
// print_r($files);
// echo "</pre>";

$query = mysqli_query($test, "SELECT max(id_user) as kodeTerbesar FROM user");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

$urutan = (int) substr($kodeBarang, 4, 4);


$urutan++;
$huruf = "USR";
$kodeBarang = $huruf . sprintf("%04s", $urutan);
//echo $kodeBarang;

$a = $kodeBarang;
$b = $_POST['nama'];
$c = $_POST['email'];
$d = $_POST['nohp'];
$e = $_POST['password'];
//$e= md5($e);
$f = $_POST['level'];
$g = $_POST['status'];


// ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "foto profil/";
if (!is_dir($dirUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($dirUpload, 0777, $rekursif = true);
}

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    echo "Upload berhasil!<br/>";
    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    $lokasi=$dirUpload.$namaFile;
}
else {
    echo "Upload Gagal!";
}


// cek apakah email sudah terdaftar
$queryemail = "SELECT Email FROM user WHERE Email='$c'";
$find = mysqli_query($test, $queryemail);

if ($find && mysqli_num_rows($find) > 0) {
    echo "Email telah terdaftar";
} else {
    //echo $a. $b.$c.$d.$e.$f.$g;
    $tampilan = "insert into user(id_user,nama,email,telepon,passwd,foto_profil,level_user,status)
            values ('$a','$b','$c','$d','$e','$lokasi','$f','$g')";
    $set = mysqli_query($test, $tampilan);

    if ($set) {
        echo "<script language=javascript> window.alert('Insert Berhasil'); window.location='../pengguna.php';</script>";
        //echo "sukses db <br>";
        //header("location:../user.php");
    } else {
        echo "gagal insert, masukan data yang sesuai <br>";
    }
}
