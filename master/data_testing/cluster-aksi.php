<!DOCTYPE html>
<html lang="en">

<head>
 
<script src="jquery.js"></script> 
<script type="text/javascript">
	function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<?php include('linkb.php'); ?>
<?php 
//-tampilkan pusat cluster
//jadikan array 3d $pcguru[0][1][1]
include "koneksi.php";
set_time_limit(0);
$count=1;

$sql = 'SELECT * FROM cluster ORDER BY id_cluster' ;
$result = $db->query($sql);
//-- menyiapkan variable penampung berupa array
$pcluster=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
foreach ($result as $row) {
    $pcluster[0][$count][1]=$row['c1'];
    $pcluster[0][$count][2]=$row['c2'];
    $pcluster[0][$count][3]=$row['c3'];
    $count=$count+1;
    }
    

$count=1;
$filterhasil=0;

$sql = 'SELECT * FROM data ORDER BY id_data' ;
$result = $db->query($sql);
$data=array();
$cluzbowl=array();
$jumlahc=array();
$keterangan=0;

foreach ($result as $row) {
    $data[0][$count][1]=$row['id_data'];
    $data[0][$count][2]=$row['nama'];
    $data[0][$count][3]=$row['guru'];
    $data[0][$count][4]=$row['fasilitas'];
    $data[0][$count][5]=$row['tanah'];
    //perhitungan cluster
    $cluzbowl[1]=sqrt(pow(($row['guru']-$pcluster[0][1][1]),2)+pow(($row['fasilitas']-$pcluster[0][1][2]),2)+pow(($row['tanah']-$pcluster[0][1][3]),2));
    $cluzbowl[2]=sqrt(pow(($row['guru']-$pcluster[0][2][1]),2)+pow(($row['fasilitas']-$pcluster[0][2][2]),2)+pow(($row['tanah']-$pcluster[0][2][3]),2));
    $cluzbowl[3]=sqrt(pow(($row['guru']-$pcluster[0][3][1]),2)+pow(($row['fasilitas']-$pcluster[0][3][2]),2)+pow(($row['tanah']-$pcluster[0][3][3]),2));
    $data[0][$count][6]=$cluzbowl[1];
    $data[0][$count][7]=$cluzbowl[2];
    $data[0][$count][8]=$cluzbowl[3];
    $min=MIN($cluzbowl[1],$cluzbowl[2],$cluzbowl[3]);
    for($i=1;$i<=count($cluzbowl);$i++){
	if($min==$cluzbowl[$i]){
		$keterangan=$i;	
		if(!isset($pcluster[1][$i][1])){
		$pcluster[1][$i][1]=$row['guru'];
		$pcluster[1][$i][2]=$row['fasilitas'];
		$pcluster[1][$i][3]=$row['tanah'];
		$jumlahc[1][$i]=1;
		}else{
		$pcluster[1][$i][1]=$pcluster[1][$i][1]+$row['guru'];
		$pcluster[1][$i][2]=$pcluster[1][$i][2]+$row['fasilitas'];
		$pcluster[1][$i][3]=$pcluster[1][$i][3]+$row['tanah'];
		$jumlahc[1][$i]=$jumlahc[1][$i]+1;
		}
	}
	}
	$data[0][$count][9]=$keterangan;
    $count=$count+1;
    }









    for($i=1;$i<100;$i++){
    	$w=$i-1;
    	$v=$i+1;
    for($j=1;$j<=count($pcluster[0]);$j++){
    	for($k=1;$k<=count($pcluster[0][$j]);$k++){
    		$pcluster[$i][$j][$k]=$pcluster[$i][$j][$k]/$jumlahc[$i][$j];
    	}
	}
	$sama=0;
    for($j=1;$j<=count($data[0]);$j++){
    	$data[$i][$j][1]=$data[$w][$j][1];
    	$data[$i][$j][2]=$data[$w][$j][2];
    	$data[$i][$j][3]=$data[$w][$j][3];
    	$data[$i][$j][4]=$data[$w][$j][4];
    	$data[$i][$j][5]=$data[$w][$j][5];
    	for($k=1;$k<=count($pcluster[0]);$k++){
    		$cluzbowl[$k]=sqrt(pow(($data[$i][$j][3]-$pcluster[$i][$k][1]),2)+pow(($data[$i][$j][4]-$pcluster[$i][$k][2]),2)+pow(($data[$i][$j][5]-$pcluster[$i][$k][3]),2));
		}
		$data[$i][$j][6]=$cluzbowl[1];
    	$data[$i][$j][7]=$cluzbowl[2];
    	$data[$i][$j][8]=$cluzbowl[3];
    	$min=MIN($cluzbowl[1],$cluzbowl[2],$cluzbowl[3]);
    	for($k=1;$k<=count($cluzbowl);$k++){
			if($min==$cluzbowl[$k]){
			$keterangan=$k;	
			if(!isset($pcluster[$v][$k][1])){
			$pcluster[$v][$k][1]=$data[$i][$j][6];
			$pcluster[$v][$k][2]=$data[$i][$j][7];
			$pcluster[$v][$k][3]=$data[$i][$j][8];
			$jumlahc[$v][$k]=1;
			}else{
			$pcluster[$v][$k][1]=$pcluster[$v][$k][1]+$data[$i][$j][6];
			$pcluster[$v][$k][2]=$pcluster[$v][$k][2]+$data[$i][$j][7];
			$pcluster[$v][$k][3]=$pcluster[$v][$k][3]+$data[$i][$j][8];
			$jumlahc[$v][$k]=$jumlahc[$v][$k]+1;
			}
			}
		}
		$data[$i][$j][9]=$keterangan;
		if($data[$i][$j][9]==$data[$w][$j][9]){
			$filterhasil=$filterhasil+1;
		}
		
    }
    if($filterhasil==count($data[0])){
    	if($i==1){

    	}else{
    			$i=100;
    			echo $filterhasil;
    		}
    }
    $filterhasil=0;
}


?>
</head>

<body>
       
  <!-- container section start -->
  <section id="container" class="">
    <div id="linkb"></div>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!-- page start-->
        <div class="row">
          <div align="center" valign="center">
          	<h3> Perhitungan Akhir Cluster </h3>

    <?php 
          $i=count($data)-1;
	?>
	<table border="1" class="table table-bordered">
		<tr>
			<td>#</td>
			<td>NAMA</td>
			<td>SDM</td>
			<td>FASILITAS</td>
			<td>TANAH</td>
			<td>c1</td>
			<td>c2</td>
			<td>c3</td>
			<td>kriteria</td>
		</tr>
		<?php for($j=1;$j<=count($data[0]);$j++){ ?>
		<tr>
			<?php for($k=1;$k<=9;$k++){?>
				<td><?php echo $data[$i][$j][$k];?></td>
			<?php }
			$wid_data=$data[$i][$j][1];
			$inputcluster=$data[$i][$j][9];
			 mysqli_query($connect,"UPDATE data SET cluster='$inputcluster' WHERE id_data ='$wid_data'");
		} ?>
		</tr>
	</table>
	<br><br>
	
          </div>

          <div align="center" valign="center">
          	<h3> Hasil Akhir Cluster </h3>
    <?php 
          $i=count($data)-1;
          $v=$i+1;
    	
	?>
	<table border="1" align="center" class="table-striped">
		<tr>
			<td align="center">#</td>
			<td>C1</td>
			<td>C2</td>
			<td>C3</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td><?php echo $jumlahc[$v][1];?></td>
			<td><?php echo $jumlahc[$v][2];?></td>
			<td><?php echo $jumlahc[$v][3];?></td>
		</tr>
	</table>
	<br><br>
	<div id="div1">
	<table border="1" align="center" class="table table-striped">
		<tr>
			<td>C1(Sangat Baik)</td>
			<td>C2(Baik)</td>
			<td>C3(Cukup)</td>
		</tr>
		<tr>
			<td valign="top">
				<?php for($j=1;$j<=count($data[0]);$j++){ ?>
				<?php 
				if($data[$i][$j][9]==1){?>
					<?php
					echo $data[$i][$j][2];?>
					<br>
				<?php }} ?>


			</td>
			<td valign="top"><?php for($j=1;$j<=count($data[0]);$j++){ ?>
				<?php 
				if($data[$i][$j][9]==2){?>
					<?php
					echo $data[$i][$j][2];?>
					<br>
				<?php }} ?>
			</td>
			<td valign="top">
			<?php for($j=1;$j<=count($data[0]);$j++){ ?>
				<?php 
				if($data[$i][$j][9]==3){?>
					<?php
					echo $data[$i][$j][2];?>
					<br>
				<?php }} ?>
			</td>
		</tr>
	</table>
</div>
	
          </div>

        </div>
        <!-- page end-->

          <a class="btn btn-primary" align="center" onclick="printContent('div1')" href="#">Print</a></div>
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">

    </div>
  </section>
  


</body>

</html>
