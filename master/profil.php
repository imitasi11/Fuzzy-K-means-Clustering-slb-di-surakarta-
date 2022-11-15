<!DOCTYPE html>
<html lang="en">

<head>
 
<script src="jquery.js"></script> 
<?php include('linka.php'); ?>
<?php 
  include "koneksi.php";
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

  $id = $_GET['id'];
  $query_mysql = mysqli_query($connect,"SELECT * FROM data WHERE id_data='$id'")or die(mysql_error());
  $nomor = 1;
  
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
        	<section class="main-section alabaster" style="min-height: 520px;">
		<?php while($data = mysqli_fetch_array($query_mysql)){ 
      if(!empty($data['p_fasilitas'])&&!empty($data['p_layanan'])){
      $fex = explode (",", $data['p_fasilitas']);  
$lex = explode (",", $data['p_layanan']);  ?>
		<div class="container wow fadeInUp delay-04s" align="center" >
		<div style="width: 340px;display:inline-block;">
			<h3 align="left"><?php echo $data['nama'] ?></h3>
			
		<div style="width:340px;display:inline-block;">
			<ul class="list-group" align="left" style="float:top;display:inline-block;margin-top: 13px;">
				
				
				<li class="list-group-item"><i class="fa fa-user"></i>&nbsp;&nbsp;Fasilitas : <br><br>
					<?php for($i=1;$i<=$jml_fasilitas;$i++){
            if($fex[$i-1]==1){
            echo "- ".$fasilitas[$i];
            echo "<br>";
            }
          }?>

				</li>
				<li class="list-group-item"><i class="fa fa-user"></i>&nbsp;&nbsp;Layanan : <br><br>
          <?php for($i=1;$i<=$jml_layanan;$i++){
            if($lex[$i-1]==1){
            echo "- ".$layanan[$i];
            echo "<br>";
          }
          }?>

        </li>
				<li align="center"class="list-group-item"><a class="btn btn-xs btn-primary" href="rute.php?id=<?php echo $data['id_tempat']; ?>" >Tampilkan Rute</a></li>
			</ul>
		</div>
			
		</div>
		</div>
		</section>
	<?php }} ?>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">

    </div>
  </section>
  


</body>

</html>
