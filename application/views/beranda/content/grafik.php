<h3>Grafik Data Penduduk Miskin dan Garis Kemiskinan</h3>
<hr>
<script>
$(function () {
		
	$('#cari').click(function() {
		var nilai = $('#tahun').val();
		
		if(!nilai) {
			alert('Anda harus pilih tahun dulu');
			return false;
		}
		
		$('#grafik').html('<div style="text-align: center; padding-top: 70px;"><img src="<?php echo base_url('assets/images/35.gif'); ?>"></div>');
		
		$.ajax({
			
			url : '<?php echo site_url("beranda/get_grafik"); ?>',
            data : 'tahun=' + nilai,
            type : 'get', 
            success : function(result) {
                $("#grafik").html(result);
            }

			
		});
		
	});
	
});
</script>

<div class="panel panel-default" style="background-image: linear-gradient(#54b4eb, #2fa4e7 60%, #1d9ce5);">
  <div class="panel-body">
	<span class="col-md-5  col-md-offset-7">
	<div class="input-group" style="margin-top: -7px; margin-bottom: -7px">
		<select class="form-control" name="tahun" id="tahun">
			<option value="">- Pilih Tahun -</option>
			<?php for($x=date('Y'); $x>=2000; $x--) { ?>
				<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
			<?php } ?>
		</select>
      <span class="input-group-btn">
		<button class="btn btn-default" id="cari">Cari</button>
      </span>
    </div><!-- /input-group -->
	</span>
  </div>
</div>

<div id="grafik"></div>
