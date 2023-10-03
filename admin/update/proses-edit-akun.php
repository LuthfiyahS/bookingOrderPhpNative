<?php
include '../../koneksi.php'; 
session_start();

$vid = $_SESSION['id_user'];
$vnama = $_POST['nama'];
$vemail = $_POST['email'];
$vnohp = $_POST['hp'];
$vpw = $_POST['passwd'];

// ambil data file
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "../inputan/foto profil/";
if (!is_dir($dirUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($dirUpload, 0777, $rekursif = true);
}

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if ($terupload) {
    $lokasi = $dirUpload . $namaFile;
}
else {
    //echo "Upload Gagal!";
}

$query = "UPDATE user set nama='$vnama',email='$vemail',telepon='$vnohp',passwd='$vpw',foto_profil='$lokasi' WHERE id_user='$vid'";
$hasil = mysqli_query($test, $query);

if( $hasil )
{
    $username = $_SESSION['username'];
$password = $_SESSION['pw'];
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($test,"select * from user where email='$username' and passwd='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);



// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level_user']=="Administrator"){
        echo "<script language=javascript> window.alert('Update Berhasil, Login Kembali Untuk Melihat Perubahan'); window.location='../../logout.php';</script>";
        
    }
    if($data['level_user']=="User"){
        echo "<script language=javascript> window.alert('Update Berhasil, Login Kembali Untuk Melihat Perubahan'); window.location='../../logout.php';</script>";
    }
 //header('Location: ../user.php');
} else 
 die("Gagal menyimpan perubahan...") ;}