<!DOCTYPE html>
<html>
<?php 
include "koneksi.php";?>
  <head>
    <style>
      #map-canvas {
       min-height: 700px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCjviEPPRZvBG-PZnoFQ2JhVyTIlfXS4k"></script>
<script src="jquery.js"></script> 
<?php include('linkb.php'); ?>
</head>

<body>
       
  <!-- container section start -->
  <section id="container" class="">
    <!--main content start-->
    <section id="main-content">
      
      <section class="wrapper">
        <a class="btn btn-danger" data-toggle="modal" href="#myModal3" style="float: right;" >
                                  Keterangan
                              </a>
        <!-- Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Keterangan</h4>
                      </div>
                      <div class="modal-body">
                         <h4><img src="img/1.png"> = Sangat Baik</h4>
          <h4><img src="img/2.png"> = Baik</h4>
          <h4><img src="img/3.png"> = Cukup</h4>

                      </div>
                     
                    </div>
                  </div>
                </div>
                <!-- modal -->
        <!-- page start-->
           <script>
    var marker;
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }     
        var zom=15;
        var at=-7.557739;
        var ong= 110.809246;
        var uluru = {lat:at, lng: ong};
        var map = new google.maps.Map(
      document.getElementById('map-canvas'), {zoom: zom, center: uluru});
        var infoWindow = new google.maps.InfoWindow;      
        var bounds = new google.maps.LatLngBounds();
 
 
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
          function addMarker(lat, lng, info, id, cluster) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
                position: pt,
                icon: "img/"+cluster+".png"
            });       
            var contentString = '<h3 align="center">'  + info + '</h3>' +
            '<p align="center">';
            bindInfoWindow(marker, map, infoWindow, contentString);
          }
 
          <?php

          	$query = mysqli_query($connect,"SELECT * from data");
            
          while ($data = mysqli_fetch_array($query)) {
            $lat = $data['lat'];
            $lon = $data['lng'];
            $nama = $data['nama'];
            $id= $data['id_data'];
            $cluster= $data['cluster'];
            echo ("addMarker($lat, $lon, '<b>$nama</b>','$id','$cluster');\n");                        
          }
          ?>
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  
    <div id="map-canvas"></div>
 
	</section>
	<!--main-section-end-->
	<!--main-section alabaster-end-->

	
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