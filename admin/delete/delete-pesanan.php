<?php
include "../../koneksi.php";
if (isset($_GET['id'])) {
 $x = $_GET['id'];
 $sql = "DELETE FROM pesanan WHERE id_pesanan='$x'";
 $query = mysqli_query($test, $sql);
 if ($query) {
    echo "<script language=javascript> window.alert('Hapus Data Berhasil'); window.location='../pesanan.php';</script>";
 //header('Location: ../pendaftaran.php');
 } else {
 die("gagal menghapus...");
 }
} else {
 die("akses dilarang...");
}
?>