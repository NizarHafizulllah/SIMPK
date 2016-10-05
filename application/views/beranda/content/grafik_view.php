<script src="<?php echo base_url('assets/highcharts/highcharts.js'); ?>"></script>
<script>
$(function () {
		
    $('#view').highcharts({
        title: {
            text: '<?php echo $title; ?>',
            x: -20 //center
        },
		subtitle: {
            text: 'per Kabupaten Tahun :<?php echo $tahun; ?>',
            x: -20
        },
        xAxis: {
            categories: [
				<?php
					
					foreach($kab as $row) {
						echo "'.$row->nama_kab.'".",";
					}
				
				?>
			]
        },
        yAxis: {
            title: {
                text: 'Jumlah Penduduk <?php echo 'Tahun '.$tahun; ?>'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#f1c40f'
            }]
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Penduduk Miskin',
            data: [
				<?php
					
					if($jml_penmis == null ) {
						for($x=1; $x<=count($kab); $x++){
							echo '0, ';
						}
					} else {
						foreach($jml_penmis as $row) {
							echo $row->jumlah.', ';
						}
					}
					
				?>
				],
		}, {
            name: 'Garis Miskin',
            data: [
				<?php
					
					if($jml_gamis == null ) {
						for($x=1; $x<=count($kab); $x++){
							echo '0, ';
						}
					} else {
						foreach($jml_gamis as $row) {
							echo $row->jumlah.', ';
						}
					}
					
				?>				
			]
        }]
    });
		
});
</script>
<div id="view"></div>