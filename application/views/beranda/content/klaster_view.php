<?php $this->load->helper("tanggal"); ?>
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
			
			<b><li style="margin-bottom: -20px;"><?php echo $row->kegiatan; ?></li></b><br>
			<?php echo $row->keterangan; ?>
			<li><?php echo $row->program; ?></li>
			<li><?php echo rupiah($row->jumlah_pagu); ?></li>
			<li><?php echo $row->skpd; ?></li>
				
		</td>
	</tr>
<?php 
	
		endforeach;

	} 

?>
	<tr>
		<td width="20%" valign="top"><div style="font-size: 20px;">Total</div></td>
		<td width="80%" valign="top" colspan="2"><div style="font-size: 12px;"><?php echo $total; ?></div></td>
	</tr>
	<tr>
		<td width="20%" valign="top"><div style="font-size: 20px;">Ket</div></td>
		<td width="80%" valign="top" colspan="2"><div style="font-size: 12px;"><li>Program/Kegiatan juga termasuk dari Dana DAK/APBN</li><li>Kegiatan Pembangunan Pengairan di DPU juga termasuk Dana DAK/APBN</li></div></td>
	</tr>
	
	
</table>
</div>