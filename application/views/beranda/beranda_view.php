<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title;  ?></title>
    <link rel="icon" href="<?php echo base_url(); ?>ksb.png" type="image/x-icon" />
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/costum.css'); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/responsiveslides.css'); ?>">

	<!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrapValidator.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/responsiveslides.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/highcharts/highcharts.js'); ?>"></script>


  </head>
  <body style="margin: 0">
  <div class="header">
  </div>
<nav class="navbar navbar-default">
  <div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav menu">
    <li class="<?php echo $subtitle=='Beranda'?'active':''; ?>"><a href="<?php echo site_url() ?>">Beranda <span class="sr-only">(current)</span></a></li>
    <li class="<?php echo $subtitle=='Profil Dearah'?'active':''; ?>"><a href="<?php echo site_url('beranda/profil_daerah') ?>">Profil Daerah<span class="sr-only">(current)</span></a></li>
    <li class="<?php echo $subtitle=='Profil Program'?'active':''; ?>"><a href="<?php echo site_url('beranda/klaster') ?>">Profil Program<span class="sr-only">(current)</span></a></li>
 <!--    <li class="dropdown <?php //echo $aktif=='pendaftar'?'active':''; ?>">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil Daerah<span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li><a href="<?php echo site_url('beranda/klaster1'); ?>">Klaster 1</a></li>
      <li><a href="<?php echo site_url('beranda/klaster2'); ?>">Klaster 2</a></li>
      <li><a href="<?php echo site_url('beranda/klaster3'); ?>">Klaster 3</a></li>
      <li><a href="<?php echo site_url('beranda/klaster4'); ?>">Klaster 4</a></li>
      </ul>
    </li> -->
    <li class="<?php echo $subtitle=='Datamart'?'active':''; ?>"><a href="<?php echo site_url('beranda/datamart') ?>">Datamart <span class="sr-only">(current)</span></a></li>
    <!--li class="<?php echo $subtitle=='Grafik'?'active':''; ?>"><a href="<?php echo site_url('beranda/grafik') ?>">Grafik<span class="sr-only">(current)</span></a></li-->
	<li class="dropdown <?php echo $subtitle=='Grafik'?'active':''; ?>">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grafik <span class="caret"></span></a>
		<ul class="dropdown-menu">
		  <li><a href="<?php echo site_url('beranda/grafik/1'); ?>">Penduduk Miskin per Kabupaten</a></li>
		  <li><a href="<?php echo site_url('beranda/grafik/2'); ?>">Garis Kemiskinan per Kabupaten</a></li>
		  <li><a href="<?php echo site_url('beranda/grafik_kec'); ?>">Penduduk Miskin Per Kecamatan</a></li>
		</ul>
    </li>
    <li class="<?php echo $subtitle=='Tematik'?'active':''; ?>"><a href="<?php echo site_url('beranda/tematik') ?>">Tematik<span class="sr-only">(current)</span></a></li>
 	<li class="dropdown <?php echo $subtitle=='Pivot'?'active':''; ?>">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pivot <span class="caret"></span></a>
		<ul class="dropdown-menu">
		  <li><a href="<?php echo site_url('beranda/pivot/1'); ?>">Penduduk Miskin per Kabupaten</a></li>
		  <li><a href="<?php echo site_url('beranda/pivot/2'); ?>">Garis Kemiskinan per Kabupaten</a></li>
		</ul>
    </li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container main">
  <div class="col-md-8">

<?php

  echo $content;

?>
<script>
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Data Jumlah Kemiskinan Menurut Kecamatan'
            },
			subtitle: {
				text: 'Tahun :<?php echo date('Y')-1; ?>',
			},
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Persentasi',
                colorByPoint: true,
                data: [
			
				<?php
				
					$kec 	= $this->db->get_where('tiger_kecamatan', array('id_kota' => '52_7'))->result();
					$query	= "SELECT tk.kecamatan, COUNT(dk.nik) jumlah FROM data_kemiskinan dk
							   LEFT JOIN penduduk p on p.nik = dk.nik
							   LEFT JOIN tiger_desa td on td.id = p.id_desa
							   LEFT JOIN tiger_kecamatan tk on tk.id = td.id_kecamatan
							   WHERE dk.tahun = ".(date('Y')-1)."
							   GROUP BY(tk.id)";
					$jml	= $this->db->query($query)->result();

					$total = 0;
					foreach($jml as $row): 
	
						$total = $total + $row->jumlah;

					endforeach;					
					
					foreach($kec as $list): 
						foreach($jml as $row): 
							if($list->kecamatan == $row->kecamatan) {
								$nilai = $row->jumlah/$total*100;
								break;
							} else {
								$nilai = 0;
							}
						endforeach;
				?>		
					{
						name: <?php echo "'$list->kecamatan'"; ?>,
						y: <?php echo $nilai; ?>
					},
						
				<?php endforeach; ?>
					
				]
            }]
        });
    });
});

</script>
</div>
<div class="col-md-4">
  <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Grafik</h3>
    </div>
  </div>
  <div id="container">
  </div>
  <div class="panel panel-default">
    <ul class="list-group">
      <a href="<?php echo site_url('beranda/tematik'); ?>" class="list-group-item">Tematik</a>
      <a href="<?php echo site_url('beranda/pivot'); ?>" class="list-group-item">Pivot</a>
      <a href="<?php echo site_url('beranda/statistik'); ?>" class="list-group-item">Statistik Situs</a>
      <a href="<?php echo site_url('beranda/kegiatan'); ?>" class="list-group-item">Foto Kegiatan</a>   
    </ul>       
  </div>
</div>
  </div>
  
  <div class="container-fluid footer">
    &copy; PEMDA Kab. Sumbawa Barat
  </div>
  
  <script>
  // You can also use "$(window).load(function() {"
  $(function () {
      $("#slider1").responsiveSlides({
        maxwidth: 800,
        speed: 3000
      });
  });
  </script>
  </body>
</html>
