<html>
<head>
   
<?php 
include "koneksi.php";
?>  
<script src="jquery.js"></script> 

    <?php
    $count=1;
$jml_fasilitas=0;
$jml_layanan=0;

$sqlf = 'SELECT * FROM fasilitas ORDER BY id_fasilitas' ;

$resultf = $db->query($sqlf);
//-- menyiapkan variable penampung berupa array
$fasilitas=array();
$nofasilitas=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
foreach ($resultf as $row) {
    $fasilitas[$row['id_fasilitas']]=$row['fasilitas'];
    $nofasilitas[$count]=$row['id_fasilitas'];
    $jml_fasilitas=$jml_fasilitas+1 ;
    $count=$count+1;
    }

$count=1;
$sqll = 'SELECT * FROM layanan ORDER BY id_layanan' ;
$resultl = $db->query($sqll);
//-- menyiapkan variable penampung berupa array
$layanan=array();
$nolayanan=array();
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat
foreach ($resultl as $row) {
    $layanan[$row['id_layanan']]=$row['layanan'];
    $nolayanan[$count]=$row['id_layanan'];
    $jml_layanan=$jml_layanan+1 ;
    $count=$count+1;
    }?>
<?php include('linkb.php');

?>


</head>
<body style="overflow-y : auto;">
  

  <!-- container section start -->
  <section id="container" class="">
    <div id="linkb"></div>
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <?php 
        ?>
        <!-- page start-->
        <div class="row">
          <div class="col-sm-12">
            <div class="tampildata"></div>
          </div></div>
            <div class="row">
          <div class="col-sm-12">
            <section class="panel">
              <header class="panel-heading" align="center">
                Input Data
              </header>
              <form method="post" class="form-input" enctype="multipart/form-data">
              <table class="table table-striped">
                    
                <thead>
                  <tr>
          <th>Nama Sekolah</th>
          <th>SDM</th>
          <th>FASILITAS</th>
          <th>TANAH</th>
          <th>Latitude</th>
          <th>Longitude</th>
          </tr>
                </thead>
                   <tbody>
                       <tr>
              <td><input type="text" class="form-control" name="nama"></td>
              <?php
              for($i=1;$i<=3;$i++){ 
                ?>
              <td>
                <?php echo '<select class="form-control input-sm m-bot15" name="'.$i.'">' ?>
                  <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
              </td>
              <?php } ?>
              <td><input class="form-control" name="lat"></td>
              <td><input class="form-control" name="lng"></td>
      </tr>
      </tbody>
              </table>
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>Layanan Pendidikan</th>
                  <th>Kelengkapan Fasilitas</th>
                </tr>
              </thead>
              <tbody>
              <tr>
                <td style="border-right: solid black 1px; ">
                  <div align="left" valign="top">
                    <?php
                    for($i=1;$i<=$jml_layanan;$i++){
                        $numba=$i-1;
                    if ($numba == 0) {
                    ?><div style="display: inline-block;width: 200px;height: 100px;margin-left: 50px;vertical-align: top;">
                    <?php }elseif ($numba % 4 == 0) {
                    ?></div>
                    <div style="display: inline-block;width: 200px;height: 200px;margin-left: 50px;vertical-align: top;">
                    <?php } ?>

                                <div class="form-group" style="margin-right: 10px;">
                                <label>
                                    <input type="checkbox" name="<?php echo 'layanan'.$nolayanan[$i]?>" id="optionsRadios1" value="y">
                                    <?php echo $layanan[$nolayanan[$i]]?>
                                </label>
                                </div>
                    <?php }?>
                  </div>
                </div>
                </td>
                <td >
                  <div align="left" valign="top">
                    <?php
                    for($i=1;$i<=$jml_fasilitas;$i++){
                        $numba=$i-1;
                    if ($numba == 0) {
                    ?><div style="display: inline-block;width: 200px;height: 200px;margin-left: 50px;vertical-align: top;">
                    <?php }elseif ($numba % 4 == 0) {
                    ?></div>
                    <div style="display: inline-block;width: 200px;height: 200px;margin-left: 50px;vertical-align: top;">
                    <?php } ?>

                                <div class="form-group" style="margin-right: 10px;">
                                <label>
                                    <input type="checkbox" name="<?php echo 'fasilitas'.$nofasilitas[$i]?>" id="optionsRadios1" value="y">
                                    <?php echo $fasilitas[$nofasilitas[$i]]?>
                                </label>
                                </div>
                    <?php }?>
                  </div>
                </div>
                <td>
              </tr>
      <tr>
        <td colspan="2"><button type="button" class="btn btn-success" id="simpan"> Simpan </button></td>
      </tr>
                </table>
            </form>

            </section>
            
            <script type="text/javascript">
  $(document).ready(function(){
    $('.tampildata').load("data_testing/tampil.php");
    $("#simpan").click(function(){
      var data = $('.form-input').serialize();
      $.ajax({
        type: 'POST',
        url: "data_testing/aksi.php",
        data: data,
        success: function() {
          $('.tampildata').load("data_testing/tampil.php");
          document.getElementById("form-input").reset();
        }
      });
    });
  });
  </script>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </section>
  


</body>

</html>


