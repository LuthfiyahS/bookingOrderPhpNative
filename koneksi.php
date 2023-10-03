<?php
$lokasi='localhost';
$db='cekin';
$user='root';
$pass='';

$test = mysqli_connect($lokasi,$user,$pass,$db);
if (!$test) {
 echo "gagal nih: " . mysqli_connect_error();
exit();
}
/*echo 'Koneksi berhasil';
         
$tampil="select * from sekolah";
$eksekusi=mysqli_query($test,"$tampil");
echo "<br>";
while($data =mysqli_fetch_array($eksekusi)){
    echo $data['nama_sekolah'],"<br>";
}
*/


?>