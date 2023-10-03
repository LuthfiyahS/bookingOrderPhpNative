<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($test,"select * from user where email='$username' and passwd='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);



// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level_user']=="Administrator"){
		$dt = mysqli_query($test,"select * from user where email='$username' and passwd='$password'");
		//$data2 = mysqli_num_rows($dt);
		$data1 = mysqli_fetch_array($dt);
		$_SESSION['id_user'] = $data1['id_user'];
		$_SESSION['nama'] = $data1['nama'];
		$_SESSION['hp'] = $data1['telepon'];
		$_SESSION['pw'] = $data1['passwd'];
		$_SESSION['tgl'] = $data1['tgl_Daftar'];
		$_SESSION['pp'] = "inputan/".$data["foto_profil"];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Administrator";
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");

	}
    else{
		$dt = mysqli_query($test,"select * from user where email='$username' and passwd='$password'");
		//$data2 = mysqli_num_rows($dt);
		$data1 = mysqli_fetch_array($dt);
		$_SESSION['id_user'] = $data1['id_user'];
		$_SESSION['nama'] = $data1['nama'];
		$_SESSION['hp'] = $data1['telepon'];
		$_SESSION['pw'] = $data1['passwd'];
		$_SESSION['tgl'] = $data1['tgl_Daftar'];
		$_SESSION['pp'] = "../admin/inputan/".$data1["foto_profil"];
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "User";
		// alihkan ke halaman dashboard admin
		header("location:user/index.php");

	}
	$_SESSION['pp'] = "../admin/inputan/".$data1["foto_profil"];
	
}else{
    
	echo "<script language=javascript> window.alert('Email yang anda masukkan salah'); window.location='login.php';</script>";
	
}



?>
