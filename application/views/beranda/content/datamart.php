<h3>Datamart</h3>
<hr>

	
<table width="100%" >
	<tr style="font-size: 30px; background-color: grey;">
		<td height="60px" align="center">Jenis</td>
		<td align="center">Nama File</td>
		<td align="center">#</td>
	</tr>
	
	<?php $rs = $this->db->get('datamart');
	$result = $rs->result_array();
		  foreach ($result as $row) :?>
		<tr>
		<td width="20%"><img width="100%" src="<?php echo base_url('assets/img/pdf.png'); ?>"></td>
		<td width="60%" style="font-size: 30px;"><?php echo $row['nama_file'] ?></td>
		<td width="20%"><div class="col-md-4"><a href="<?php echo $row['link'] ?>" target="_blank"><button class="btn btn-primary" style="font-size: 30px;">Download</button></a></div></td>	
	</tr>

	<?php 
	endforeach;
		  
	 ?>


	

</table>
