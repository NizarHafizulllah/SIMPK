<h3>Grafik</h3>
<hr>
<script>
$(function () {
		
    $('#grafik').highcharts({
        title: {
            text: '<?php echo $title ?>',
            x: -20 //center
        },
		subtitle: {
            text: 'Tahun <?php echo $tahun ?>',
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
                text: 'Jumlah Penduduk Miskin Tahun <?php echo $tahun; ?>'
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
						for($x=1; $x<=count($kab); $x++){
							echo '0, ';
						}
					} else {
						foreach($jml as $row) {
							echo $row->jumlah.', ';
						}
					}
					
				?>
			]
        }]
    });
	
	$('#cari').click(function() {
		var nilai = $('#tahun').val();
		
		if(!nilai) {
			alert('Anda harus pilih tahun dulu');
			return false;
		} 
	});
	
});
</script>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-right: 20px;">
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
			<select class="form-control" name="tahun" id="tahun">
				<option value="">- Pilih Tahun -</option>
				<?php for($x=date('Y'); $x>=2000; $x--) { ?>
					<option <?php echo $x == $tahun ? 'selected' : ''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
				<?php } ?>
			</select>
		</div>
        <button type="submit" class="btn btn-default" id="cari">Cari</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php if(isset($_GET['tahun'])){ ?>
	<div id="grafik"></div>
<?php } ?>