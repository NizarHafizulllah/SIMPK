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
				text: 'Tahun :<?php echo $tahun; ?>',
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
									
					$total = 0;
					foreach($jml as $row): 
	
						$total = $total + $row->jumlah;

					endforeach;					
					
					foreach($kec as $list):
						
						if(!$jml) {
							$nilai = '0.0';
						} else {
						
							foreach($jml as $row): 
								if($list->kecamatan == $row->kecamatan) {
									$nilai = $row->jumlah/$total*100;
									break;
								} else {
									$nilai = '0.0';
								}
							endforeach;
							
						}
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
