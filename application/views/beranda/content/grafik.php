<h3>Grafik</h3>
<hr>
<script>
$(function () {
		
	$('#cari').click(function() {
		var nilai = $('#tahun').val();
		
		if(!nilai) {
			alert('Anda harus pilih tahun dulu');
			return false;
		}
		
		$('#grafik').html('<div style="text-align: center; padding-top: 70px;"><img src="<?php echo base_url('assets/images/35.gif'); ?>"><p>Ichal Ganteng</p></div>');
		
		$.ajax({
			
			url : '<?php echo site_url("beranda/get_grafik"); ?>',
            data : 'tahun=' + nilai + '&url=<?php echo $this->uri->segment(3); ?>',
            type : 'get', 
            success : function(result) {
                $("#grafik").html(result);
            }

			
		});
		
	});
	
});
</script>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-right: 20px;">
      <div class="navbar-form navbar-right" role="search">
        <div class="form-group">
			<select class="form-control" name="tahun" id="tahun">
				<option value="">- Pilih Tahun -</option>
				<?php for($x=date('Y'); $x>=2000; $x--) { ?>
					<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
				<?php } ?>
			</select>
		</div>
        <button class="btn btn-default" id="cari">Cari</button>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div id="grafik"></div>
