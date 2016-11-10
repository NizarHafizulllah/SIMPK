<script>
$(function () {
		
	$('#cari').click(function() {
		var nilai = $('#tahun').val();
		var klaster = $('#klaster').val();
		
		if(!nilai) {
			alert('Anda harus pilih tahun dulu');
			return false;
		}
				
		$.ajax({
			
			url : '<?php echo site_url("beranda/get_klaster"); ?>',
            data : 'tahun=' + nilai +'&klaster=' + klaster ,
            type : 'get', 
            success : function(result) {
                $("#view").html(result);
            }

			
		});
		
	});
	
});
</script>
<h3>Profil Program</h3>
<hr>
<div class="panel panel-default" style="background-image: linear-gradient(#54b4eb, #2fa4e7 60%, #1d9ce5);">
	<div class="panel-body" >
		<div class="col-md-8 col-md-offset-5" >
			<div class="navbar-form" style="margin-top: -7px; margin-bottom: -7px">
				<div class="form-group">
					<select class="form-control" name="tahun" id="tahun">
						<option value="">- Pilih Tahun -</option>
						<?php for($x=date('Y'); $x>=2014; $x--) { ?>
							<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
						<?php } ?>
					</select>
					<select class="form-control" name="klaster" id="klaster">
						<option value="">- Semua Klaster -</option>
						<?php foreach($arr_klaster as $row): ?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->klaster; ?></option>
						<?php endforeach; ?>
					</select>				
				</div>
				<button class="btn btn-default" id="cari">Cari</button>
			</div>  
		</div>
	</div>
</div>
<br><br>
<div id="view">
<h3 align="center">Profil Program Tahun : <?php echo date('Y') - 1; ?></h3><br>
<table class="table table-striped">
<?php 
	if(!$klaster) { echo "<p align='center'><strong>- Data Masih Kosong -</strong></p>"; } else { 
		$a = '';
		foreach($klaster as $x => $row):

?>
	<tr>
		<?php 
			
			if($row->klaster != $a) { 

		?>
		<td width="20%" valign="top"><div style="font-size: 20px;"><b><?php echo $row->klaster; ?></b></div></td>
		<td width="3%" valign="top" style="font-size: 16px;">:</td>
		<?php
		$a = $row->klaster;
			} else {
		?>
		<td width="15px" valign="top"><div style="font-size: 20px;"></div></td>
		<td width="10px" valign="top" style="font-size: 16px;"></td>
		<?php } ?>
		<td style="font-size: 16px;">
			
			<b><li style="margin-bottom: -20px;"><?php echo $row->program; ?></li></b><br>
			<?php echo $row->keterangan; ?>
				
		</td>
	</tr>
<?php 
	
		endforeach;

	} 

?>
</table>
</div>
