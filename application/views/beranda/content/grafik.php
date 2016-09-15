<h3>Grafik</h3>
<hr>
<script>
$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#grafik').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'line'
            },
            title: {
                text: 'Data Jumlah Penduduk Miskin per Kabupaten'
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

<div id="grafik">
</div>