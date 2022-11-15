<!-- www.malasngoding.com -->
 
<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>
 
<?php
set_time_limit(0);
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
$count=4;
$count1=3;
$count2=1;
for ($i=1; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nama=$data->val($i,1);
	$lat=$data->val($i,2);
	$long=$data->val($i,3);
	$id=$data->val($i,4);
	$cluster=$data->val($i,5);

	if($id !="" ){
		 mysqli_query($connect,"UPDATE data SET cluster='$cluster',lat='$lat',lng='$long' WHERE id_data ='$id'");
	}
 }
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);
 
// alihkan halaman ke index.php

?>