<script src="../jquery.js"></script> 
<?php   
include "../koneksi.php"; 
set_time_limit(0);

     

$count=1; 
$sql = 'SELECT * FROM cluster ORDER BY id_cluster DESC'  ;
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
?>

              <header class="panel-heading">
                <p align="center">TABEL DATA</p>
                <div align ="right"style="margin-right: 0px;">
                 <a class="btn btn-success" onclick="return confirm('Cluster data?')" href="cluster-aksi.php">Cluster</a>
               
            </div>
              </header>
              <div style="height: 300px;overflow-y : auto;">
              <table class="table table-striped">

                 
                <thead>
                  <tr>
                    <th>#</th>
                    <th>nama</th>
                    <th>SDM</th>
                    <th>FASILITAS</th>
                    <th>TANAH</th>
                    <th>c1(sangat baik)</th>
                    <th>c2(baik)</th>
                    <th>c3(cukup)</th>
                    <th>keterangan</th>
                    <th colspan="2">aksi</th>
                  </tr>
                </thead>
                   <tbody>
                        <?php
                        for ($i=1; $i <=count($data[0]) ; $i++) { 
                            echo " <td>{$data[0][$i][1]}</td>
                            <td>{$data[0][$i][2]}</td>
                            <td>{$data[0][$i][3]}</td>
                            <td>{$data[0][$i][4]}</td>
                            <td>{$data[0][$i][5]}</td>
                            <td>{$data[0][$i][6]}</td>
                            <td>{$data[0][$i][7]}</td>
                            <td>{$data[0][$i][8]}</td>
                            <td>C{$data[0][$i][9]}</td>";
                             ?>  
                             <td><a class="btn btn-primary" href="data_testing/edit.php?id=<?php echo $data[0][$i][1]; ?>">edit</a></td>
                            <td><a class="btn btn-danger" href="data_testing/delete.php?id=<?php echo $data[0][$i][1]; ?>">delete</a></td></tr> <?php
                        }
                        ?>
                 </tbody>
              </table>
           </div>