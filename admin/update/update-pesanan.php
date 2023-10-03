<?php
include "../../koneksi.php";

$a = $_POST['id_pesanan'];
$b = $_POST['nama'];
$c = $_POST['email'];
$d = $_POST['telepon'];
$e = $_POST['alamat'];
$f = $_POST['negara'];
$g = $_POST['kota'];
$h = $_POST['pos'];
$i = $_POST['pembayaran'];
$j = $_POST['status'];

//$tampilan = "UPDATE  pesanan set nama_penerima='$b',email_penerima='$c',telepon_penerima='$d' ,alamat_penerima='$e', negara='$f',kota='$g',kode_pos='$h', id_pembayaran='$i',status='$j' where id_pesanan='$a'";
$tampilan = "UPDATE  pesanan set nama_penerima='$b',email_penerima='$c',telepon_penerima='$d', id_pembayaran='$i',status='$j' where id_pesanan='$a'";

$querycrud = mysqli_query($test, $tampilan);
if ($querycrud) {
    if ($j = 'Dikemas') {
        $query2 = mysqli_query($test, "SELECT max(id_pengiriman) as kodeTerbesar FROM info_pesanan");
        $data2 = mysqli_fetch_array($query2);
        $kode = $data2['kodeTerbesar'];

        $urutan = (int) substr($kode, 4, 4);

        $urutan++;
        $huruf = "SHP";
        $kode = $huruf . sprintf("%04s", $urutan);

        $kd = $kode;
        $tampilan2 = "insert into info_pesanan(id_pengiriman,jasa_kirim,no_resi,status_pengiriman,lokasi,id_pesanan) 
            values ('$kd','0','0','Penjual Menyiapkan Pesanan Anda','Purwakarta','$a')";
        $querycrud2 = mysqli_query($test, $tampilan2);
        echo "<script language=javascript> window.alert('Edit Berhasil'); window.location='../pesanan.php';</script>";
    }

    //echo "insert Berhasil";

} else {
    echo "<script language=javascript> window.alert('Edit Gagal'); window.location='../pesanan.php';</script>";
    //echo "insert Gagal!";
}

//header("location:../prodi.php");
