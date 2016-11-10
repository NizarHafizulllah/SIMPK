<h3>Pivot Data Jumlah Penduduk Miskin per Kecamatan</h3>
<hr>
<script>
$(function () {
		
	$('#cari').click(function() {
		var nilai1 = $('#tahun1').val();
		var nilai2 = $('#tahun2').val();
		
		if(!nilai1 || !nilai2) {
			alert('Anda harus pilih tahun dulu');
			return false;
		}
		
		if(nilai2 < nilai1 ) {
			alert('Tahun kedua tidak boleh lebih kecil dari tahun pertama');
			return false;
		}
		
		var range = nilai2 - nilai1;
		if(range > 7) {
			alert('range tidak boleh lebih dari 8');
			return false;			
		}
		
		$('#pivot').html('<div style="text-align: center; padding-top: 70px;"><img src="<?php echo base_url('assets/images/35.gif'); ?>"></div>');
		
		$.ajax({
			
			url : '<?php echo site_url("beranda/get_pivot_kec"); ?>',
            data : 'tahun1=' + nilai1 + '&tahun2=' + nilai2,
            type : 'get', 
            success : function(result) {
                $("#pivot").html(result);
            }

			
		});
		
	});
	
});
</script>

<div class="panel panel-default" style="background-image: linear-gradient(#54b4eb, #2fa4e7 60%, #1d9ce5);">
	<div class="panel-body" >
		<div class="col-md-8 col-md-offset-4" >
			<div class="navbar-form" style="margin-top: -7px; margin-bottom: -7px">
				<div class="form-group">
					<select class="form-control" name="tahun1" id="tahun1">
						<option value="">- Pilih Tahun -</option>
						<?php for($x=date('Y'); $x>=2014; $x--) { ?>
							<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
						<?php } ?>
					</select>
					Sampai
					<select class="form-control" name="tahun2" id="tahun2">
						<option value="">- Pilih Tahun -</option>
						<?php for($x=date('Y'); $x>=2014; $x--) { ?>
							<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
						<?php } ?>
					</select>
				</div>
				<button type="submit" class="btn btn-default" id="cari">Cari</button>
			</div>  
		</div>
	</div>
</div>

<div id="pivot"></div>