  
<?php 

include "../koneksi.php";
  $count=1;
$jml_fasilitas=0;
$jml_layanan=0;

$sqlf = 'SELECT * FROM fasilitas ORDER BY id_fasilitas' ;

$resultf = $db->query($sqlf);
$fasilitas=array();
$nofasilitas=array();
foreach ($resultf as $row) {
    $fasilitas[$row['id_fasilitas']]=$row['fasilitas'];
    $nofasilitas[$count]=$row['id_fasilitas'];
    $jml_fasilitas=$jml_fasilitas+1 ;
    $count=$count+1;
    }

$count=1;
$sqll = 'SELECT * FROM layanan ORDER BY id_layanan' ;
$resultl = $db->query($sqll);
$layanan=array();
$nolayanan=array();
foreach ($resultl as $row) {
    $layanan[$row['id_layanan']]=$row['layanan'];
    $nolayanan[$count]=$row['id_layanan'];
    $jml_layanan=$jml_layanan+1 ;
    $count=$count+1;
    }

$inputfasilitas=array();
$hasilfasilitas="";
for($i=1;$i<=$jml_fasilitas;$i++){
	 if(!empty($_POST['fasilitas'.$nofasilitas[$i]])){
        $inputfasilitas[$i]=1;
    }else{
        $inputfasilitas[$i]=0;
    }
if($i==$jml_fasilitas){
	for($i=1;$i<=$jml_fasilitas;$i++){
		if($i==1){
			$hasilfasilitas=$inputfasilitas[$i];
		}else{
			$hasilfasilitas=$hasilfasilitas.",".$inputfasilitas[$i];
		}
	}

}
}
$inputlayanan=array();
$hasillayanan="";
for($i=1;$i<=$jml_layanan;$i++){
	if(!empty($_POST['layanan'.$nolayanan[$i]])){
        $inputlayanan[$i]=1;
    }else{
        $inputlayanan[$i]=0;
    }
if($i==$jml_layanan){
	for($i=1;$i<=$jml_layanan;$i++){
		if($i==1){
			$hasillayanan=$inputlayanan[$i];
		}else{
			$hasillayanan=$hasillayanan.",".$inputlayanan[$i];
		}
		
	}

}
}


$nama = $_POST['nama'];
$satu = $_POST['1'];
$dua = $_POST['2'];
$tiga = $_POST['3'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

    $input = "INSERT INTO data VALUES(NULL,'$nama','$satu','$dua','$tiga',1,'$lng','$lat','$hasilfasilitas','$hasillayanan') ";
    $responden_result = $db->query($input);

?>