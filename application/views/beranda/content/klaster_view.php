<h3 align="center"><?php echo $title; ?></h3><br>
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