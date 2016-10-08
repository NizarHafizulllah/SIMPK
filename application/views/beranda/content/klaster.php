<script>
$(function () {
		
	$('#cari').click(function() {
		var nilai = $('#tahun').val();
		
		if(!nilai) {
			alert('Anda harus pilih tahun dulu');
			return false;
		}
				
		$.ajax({
			
			url : '<?php echo site_url("beranda/get_klaster"); ?>',
            data : 'tahun=' + nilai,
            type : 'get', 
            success : function(result) {
                $("#klaster").html(result);
            }

			
		});
		
	});
	
});
</script>
<h3>Profil Program</h3>
<hr>
<div class="col-md-4 col-md-offset-8">
	<div class="input-group">
		<select class="form-control" name="tahun" id="tahun">
			<option value="">- Pilih Tahun -</option>
			<?php for($x=date('Y'); $x>=2000; $x--) { ?>
				<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
			<?php } ?>
		</select>
		<span class="input-group-btn">
			<button class="btn btn-default" id="cari">cari</button>
		</span>
	</div>
</div>
<br><br>
<div id="klaster">
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
