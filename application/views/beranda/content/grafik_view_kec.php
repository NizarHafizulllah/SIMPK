<script src="<?php echo base_url('assets/highcharts/highcharts.js'); ?>"></script>
<script>
$(function () {
		
    $('#view').highcharts({
        title: {
            text: '<?php echo $title; ?>',
            x: -20 //center
        },
		subtitle: {
            text: 'per Kecamatan Tahun :<?php echo $tahun; ?>',
            x: -20
        },
        xAxis: {
            categories: [
				<?php
					
					foreach($kec as $row) {
						echo "'.$row->kecamatan.'".",";
					}
				
				?>
			]
        },
        yAxis: {
            title: {
                text: '<?php echo $title.' Tahun '.$tahun; ?>'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
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
            name: 'Jumlah',
            data: [
				<?php
					
					if($jml == null ) {
						
						for($x=1; $x<=count($kec); $x++){
							echo '0, ';
						}
						
					} else {
						
						foreach($kec as $list): 
							foreach($jml as $row): 
								if($list->kecamatan == $row->kecamatan) {
									$nilai = $row->jumlah.', ';
									break;
								} else {
									$nilai = '0, ';
								}
							endforeach;
							
							echo $nilai;
							
						endforeach;
						
					}				
					
				?>
			]
        }]
    });
		
});
</script>
<div id="view"></div>