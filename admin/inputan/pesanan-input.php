<?php
include "../../koneksi.php";

session_start();
$query = mysqli_query($test, "SELECT max(id_pesanan) as kodeTerbesar FROM pesanan");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

$urutan = (int) substr($kodeBarang, 4, 4);

$urutan++;
$huruf = "ORD";
$kodeBarang = $huruf . sprintf("%04s", $urutan);

$a = $kodeBarang;
$aa = $_SESSION['id_user'];
$b = $_POST['nama'];
$c = $_POST['email'];
$d = $_POST['telepon'];
$e = $_POST['alamat'];
$f = $_POST['negara'];
$g = $_POST['kota'];
$h = $_POST['pos'];
$i = $_POST['pembayaran'];


$tampilan = "insert into pesanan(id_pesanan,id_user,nama_penerima,email_penerima,telepon_penerima,alamat_penerima,negara,kota,kode_pos,id_pembayaran,status) 
            values ('$a','$aa','$b','$c','$d','$e','$f','$g','$h','$i','Belum Bayar')";
$querycrud = mysqli_query($test, $tampilan);
if ($querycrud) {
    $bayar = "SELECT * FROM barang JOIN keranjang on barang.id_barang=keranjang.id_barang WHERE id_user ='$aa'";
    $eksekusibayar = mysqli_query($test, "$bayar");
    while ($data = mysqli_fetch_array($eksekusibayar)) :
        $b = $data["id_barang"];
        $c = $data["kuantitas"];
        $ambil = "select * from detail_pesanan where id_pesanan='$a' && id_barang='$b'";
        $cek = mysqli_query($test, $ambil);
        if ($cek && mysqli_num_rows($cek) > 0) {
            echo "data telah terdaftar";
        } else {
            $tampilan = "insert into detail_pesanan(id_pesanan,id_barang,kuantitas) 
        values ('$a','$b','$c')";
            $querycrud = mysqli_query($test, $tampilan);    
            $d= $data["stok"]-$data["kuantitas"];
            $kurangistok = mysqli_query($test, "UPDATE barang set stok='$d' WHERE id_barang='$b'");
        }
    endwhile;
    $hapuscart = mysqli_query($test, "DELETE FROM keranjang WHERE id_user='$aa'");
    $hasil = mysqli_query($test, "select * from user where id_user='$aa'");
    $data = mysqli_fetch_array($hasil);
    if ($data['level_user'] == 'User') {

        echo "<script language=javascript> window.alert('Pesanan Berhasil Dibuat Segera Lakukan Pembayaran'); window.location='../../user/myorder.php';</script>";
    } else {
        echo "<script language=javascript> window.alert('Insert Berhasil'); window.location='../pesanan.php';</script>";
    }
} else {
    echo "<script language=javascript> window.alert('Insert Gagal'); window.location='../pesanan.php';</script>";
    //echo "insert Gagal!";
}

//header("location:../prodi.php");
