<!DOCTYPE html>
<html lang="en">

<head>
 
<script src="jquery.js"></script> 
<?php include('linka.php'); ?>
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
<section class="main-section paddind" id="Portfolio">
		<!--main-section-start-->
		<div class="container">
			<h2>Halaman Pencarian</h2>
			<h6>SLB SURAKARTA</h6>
	
	<?php 
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di tambahkan.</p>";
	}
	?>
 
	<div style=" width:1179px;">
		<!--c-logo-part-start-->
		<div class="container"  align="center">      
        <form action="search.php" method="get"style="display: inline-block;">
        	<table>
        		<tr>
        			<td>
        	<input  class="form-control" type="text" placeholder="Search. . ." name="cari">
        	</td><td><button  style="margin-left: 10px;"class="btn btn-success">Refresh</button>
        	</td>
        </tr>
        	</table>
        </form>
    </div>
    </div>
    <?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
}
?>
    <div class="table-responsive" style="width: 1179px;">

	<div style="height: 370px;overflow-y: scroll;">
	<table border="1px" class="table table-bordered table-hover table-striped" width="100%">
		<thead class="thead-dark">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Link</th>
			
		</tr>
		</thead>
		<tbody>
			
			
		
		<?php 
		include 'koneksi.php';
		$no=1;
		if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$data = mysqli_query($connect,"select * from data where nama like '%".$cari."%'");		
		}else{
		$data = mysqli_query($connect,"select * from data");		
		}
		
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama']; ?></td>		
				<td>
                <a class="btn btn-xs btn-warning" href="profil.php?id=<?php echo $d['id_data']; ?>">Profil</a>
            	</td>
			</tr>
			<?php 
		}
		?>
		 
 </tbody>

	</table>
 </div>
</div>
 </div>
	<!--main-section-end-->
	<!--main-section alabaster-end-->
	<script type="text/javascript">
		$(document).ready(function(e) {

			$('#test').scrollToFixed();
			$('.res-nav_click').click(function() {
				$('.main-nav').slideToggle();
				return false

			});

      $('.Portfolio-box').magnificPopup({
        delegate: 'a',
        type: 'image'
      });

		});
	</script>

	<script>
		wow = new WOW({
			animateClass: 'animated',
			offset: 100
		});
		wow.init();
	</script>


	<script type="text/javascript">
		$(window).load(function() {

			$('.main-nav li a, .servicelink').bind('click', function(event) {
				var $anchor = $(this);

				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top - 102
				}, 1500, 'easeInOutExpo');
				/*
				if you don't want to use the easing effects:
				$('html, body').stop().animate({
					scrollTop: $($anchor.attr('href')).offset().top
				}, 1000);
				*/
				if ($(window).width() < 768) {
					$('.main-nav').hide();
				}
				event.preventDefault();
			});
		})
	</script>

	<script type="text/javascript">
		$(window).load(function() {


			var $container = $('.portfolioContainer'),
				$body = $('body'),
				colW = 375,
				columns = null;


			$container.isotope({
				// disable window resizing
				resizable: true,
				masonry: {
					columnWidth: colW
				}
			});

			$(window).smartresize(function() {
				// check if columns has changed
				var currentColumns = Math.floor(($body.width() - 30) / colW);
				if (currentColumns !== columns) {
					// set new column count
					columns = currentColumns;
					// apply width to container manually, then trigger relayout
					$container.width(columns * colW)
						.isotope('reLayout');
				}

			}).smartresize(); // trigger resize to set container width
			$('.portfolioFilter a').click(function() {
				$('.portfolioFilter .current').removeClass('current');
				$(this).addClass('current');

				var selector = $(this).attr('data-filter');
				$container.isotope({

					filter: selector,
				});
				return false;
			});

		});
	</script>
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
