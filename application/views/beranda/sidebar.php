<script src="<?php echo base_url('assets/highcharts/highcharts.js'); ?>"></script>
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
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Brang Ene',
                    y: 56.33
                }, {
                    name: 'Brang Re',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Jereweh',
                    y: 10.38
                }, {
                    name: 'Maluk',
                    y: 4.77
                }, {
                    name: 'Poto Tano',
                    y: 0.91
                }, {
                    name: 'Proprietary or Undetectable',
                    y: 0.2
                }]
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
