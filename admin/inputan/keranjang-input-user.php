<?php
include "../../koneksi.php";
session_start();
$b= $_POST['id_barang'];
$c= $_POST['kuantitas'];
$d= $_SESSION['id_user'];


$qu = mysqli_query($test,"select * from  keranjang where id_barang='$b' and id_user='$d'");
$find = mysqli_fetch_array($qu);
if ($find && mysqli_num_rows($qu) > 0) {
    $bb=$find['kuantitas'];
    $id=$find['id_cart'];
    echo $bb;
    $baru=$bb+$c;
    $tampilan = "UPDATE keranjang set kuantitas='$baru' where id_cart='$id'";
    $set = mysqli_query($test, $tampilan);
    echo "<script language=javascript> window.alert('Menambakan data keranjang Berhasil'); window.location='../../user/cart.php';</script>";
} else {
    $query = mysqli_query($test, "SELECT max(id_cart) as kodeTerbesar FROM keranjang");
$data = mysqli_fetch_array($query);
$kode = $data['kodeTerbesar'];
 
$urutan = (int) substr($kode, 4, 4);
 
$urutan++;

$huruf = "CRT";
$kode = $huruf . sprintf("%04s", $urutan);
$a = $kode;
$b= $_POST['id_barang'];
$c= $_POST['kuantitas'];
$d= $_SESSION['id_user'];
    $tampilan = "insert into keranjang(id_cart,id_barang,kuantitas, id_user) values ('$a','$b','$c','$d')";
$querycrud= mysqli_query($test, $tampilan);

    if ($querycrud) {
        echo "<script language=javascript> window.alert('Memasukan data kekeranjang Berhasil'); window.location='../../user/index.php';</script>";
    } else {
       echo "<script language=javascript> window.alert('Memasukan data kekeranjang Gagal'); window.location='../../user/index.php';</script>";
    }
}
