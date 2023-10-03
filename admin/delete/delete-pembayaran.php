<?php
include "../../koneksi.php";
if (isset($_GET['id'])) {
 $x = $_GET['id'];
 $sql = "DELETE FROM pembayaran WHERE id_pembayaran='$x'";
 $query = mysqli_query($test, $sql);
 if ($query) {
    echo "<script language=javascript> window.alert('Hapus Data Berhasil'); window.location='../pembayaran.php';</script>";
 //header('Location: ../pendaftaran.php');
 } else {
 die("gagal menghapus...");
 }
} else {
 die("akses dilarang...");
}
?>