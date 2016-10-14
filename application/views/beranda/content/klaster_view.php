<?php $this->load->helper("tanggal"); ?>
<h3 align="center"><?php echo $title; ?></h3><br>

<table class="table table-striped">
<?php 
	if(!$klaster) { echo "<p align='center'><strong>- Data Masih Kosong -</strong></p>"; } else { 
		$a = '';
		$jml = 0;
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
			
			<table width="100%">
				<tr>
					<td colspan="3">&nbsp;
					</td>
				</tr>
				<tr>
					<td valign="top" width="35%"><strong>Program/Kegiatan</strong></td>
					<td valign="top" width="2%">:</td>
					<td width="63%"><?php echo $row->program; ?></td>
				</tr>
				<tr>
					<td width="35%"><strong>Jumlah Pagu (Rp)</strong></td>
					<td width="2%">:</td>
					<td width="63%"><?php echo rupiah($row->jumlah_pagu); ?></td>
				</tr>
				<tr>
					<td width="35%"><strong>SKPD</strong></td>
					<td width="2%">:</td>
					<td width="63%"><?php echo $row->skpd; ?></td>
				</tr>
				<tr>
					<td colspan="3">&nbsp;
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
<?php 
	
		$jml = $jml + $row->jumlah_pagu;
		endforeach;
?>

	<tr>
		<td width="20%" valign="top"><div style="font-size: 20px;"><strong>Total</strong></div></td>
		<td width="80%" valign="top" colspan="2"><div style="font-size: 20px; color: green">Rp. <?php echo rupiah($jml); ?></div></td>
	</tr>
	<tr>
		<td width="20%" valign="top"><div style="font-size: 17px;"><strong>Keterangan</strong></div></td>
		<td width="80%" valign="top" colspan="2"><div style="font-size: 17px; color: red; "><i><li>Program/Kegiatan juga termasuk dari Dana DAK/APBN</li><li>Kegiatan Pembangunan Pengairan di DPU juga termasuk Dana DAK/APBN</li></i></div></td>
	</tr>
<?php	
	
	} 

?>
	
	
</table>
