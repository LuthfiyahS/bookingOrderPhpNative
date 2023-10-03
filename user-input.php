<?php
include "koneksi.php";

$query = mysqli_query($test, "SELECT max(id_user) as kodeTerbesar FROM user");
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
$huruf = "USR";
$kodeBarang = $huruf . sprintf("%04s", $urutan);

$a = $kodeBarang;
$b = $_POST['nama'];
$c = $_POST['email'];
$d = $_POST['nohp'];
$e = $_POST['password'];
//$e=md5($_POST['password']); //input
//$e= md5($e); //masuk
$f = "User";
$g = "Aktif";


// cek apakah email sudah terdaftar
$queryemail = "SELECT Email FROM user WHERE Email='$c'";
$find = mysqli_query($test, $queryemail);

if ($find && mysqli_num_rows($find) > 0) {
    echo "<script language=javascript> window.alert('Email telah terdaftar'); window.location='signup.php';</script>";
} else {
    $tampilan = "insert into user(id_user,nama,email,telepon,passwd,foto_profil,level_user,status)
            values ('$a','$b','$c','$d','$e','../inputan/foto profil/usr.png','$f','$g')";
    $set = mysqli_query($test, $tampilan);

    if ($set) {
        echo "<script language=javascript> window.alert('Registrasi Berhasil'); window.location='login.php';</script>";
    } else {
        echo "<script language=javascript> window.alert('Registrasi Gagal'); window.location='signup.php';</script>";
    }
}
