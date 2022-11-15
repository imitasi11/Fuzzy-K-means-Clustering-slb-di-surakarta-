<!DOCTYPE html>
<?php
  include "../koneksi.php";
    ?>
<?php
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
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>Cluster Hayat</title>
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />

<!--header start-->
 <section id="container" class="">
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo">Cluster  <span class="lite">Sekolah</span></a>
      <!--logo end-->
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="">
            <a class="" href="../omah.php">
                          <i class="icon_desktop"></i>
                            <span>Home</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="../cluster.php">
                          <i class="icon_document_alt"></i>
                            <span>Cluster Sekolah</span>
                      </a>
          </li>
          <li class="">
            <a class="" href="../map.php">
                          <i class="icon_house_alt"></i>
                            <span>Peta Sekolah</span>
                      </a>
          </li>
                
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> EDIT Data</h3>
            <section class="panel" style="padding-left: 400px;padding-top: 34px;">
              <div style="width: 60%; border-style: solid;padding: 40px; ">
                <form action="update.php" method="post" enctype="multipart/form-data">    
    <table>
  <?php 

  $ids = $_GET['id'];
  $query_mysql = "SELECT * FROM data WHERE id_data='$ids'";
  $result = $db->query($query_mysql);

  foreach($result as $id){

$fex = explode (",", $id['p_fasilitas']);  
$lex = explode (",", $id['p_layanan']);  
  ?>
  
      Nama
        <input type="hidden" name="id" value="<?php echo $id['id_data'] ?>">
        <input type="text" class="form-control" name="nama" value="<?php echo $id['nama'] ?>"><br>
      Guru
        <select class="form-control input-sm m-bot15" name="1">
                  <option value="<?php echo $id['guru'] ?>"><?php echo $id['guru'] ?></option>
                  <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
        </select>
       Fasilitas
        <select class="form-control input-sm m-bot15" name="2">
          <option value="<?php echo $id['fasilitas'] ?>"><?php echo $id['fasilitas'] ?></option>
                  <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
        </select>
       Tanah
        <select class="form-control input-sm m-bot15" name="3">
          <option value="<?php echo $id['tanah'] ?>"><?php echo $id['tanah'] ?></option>
                  <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
        </select>
        Fasilitas<br><br>
         <div align="left" valign="top">
                    <?php
                    for($i=1;$i<=$jml_fasilitas;$i++){
                        $numba=$i-1;
                    if ($numba == 0) {
                    ?><div style="display: inline-block;width: 140px;height: 200px;margin-left: 50px;vertical-align: top;">
                    <?php }elseif ($numba % 4 == 0) {
                    ?></div>
                    <div style="display: inline-block;width: 140px;height: 200px;margin-left: 50px;vertical-align: top;">
                    <?php } ?>

                                <div class="form-group" style="margin-right: 10px;">
                                <label>
                                    <input type="checkbox" name="<?php echo 'fasilitas'.$nofasilitas[$i]?>" id="optionsRadios1" value="y"
                                    <?php if(!empty($fex[$numba])&&$fex[$numba]==1){ echo "checked";}?>>
                                    <?php echo $fasilitas[$nofasilitas[$i]]?>
                                </label>
                                </div>
                    <?php }?>
                  </div>
                </div>
          Layanan<br><br>
         <div align="left" valign="top">
                    <?php
                    for($i=1;$i<=$jml_layanan;$i++){
                        $numba=$i-1;
                    if ($numba == 0) {
                    ?><div style="display: inline-block;width: 140px;height: 200px;margin-left: 50px;vertical-align: top;">
                    <?php }elseif ($numba % 4 == 0) {
                    ?></div>
                    <div style="display: inline-block;width: 140px;height: 200px;margin-left: 50px;vertical-align: top;">
                    <?php } ?>

                                <div class="form-group" style="margin-right: 10px;">
                                <label>
                                    <input type="checkbox" name="<?php echo 'layanan'.$nolayanan[$i]?>" id="optionsRadios1" value="y"
                                    <?php if(!empty($lex[$numba])&&$lex[$numba]==1){ echo "checked";}?>>
                                    <?php echo $layanan[$nolayanan[$i]]?>
                                </label>
                                </div>
                    <?php }?>
                  </div>
                </div>
         Latitude
        <input class="form-control" name="lat" value="<?php echo $id['lat'] ?>"><br>
         Longitude
        <input class="form-control" name="lng" value="<?php echo $id['lng'] ?>"><br>

      <tr>
        <td></td>
        <td><input style="margin-top: 10px;" class="btn btn-primary" type="submit" name="upload" value="Upload"></td>         
      </tr>    

  <?php }?>
  </table>
  </form>
<script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="../js/scripts.js"></script>

</section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    
  </section>
  


</body>

</html>