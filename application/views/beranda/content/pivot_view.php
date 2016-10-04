<h3 align="center"><?php echo $title; ?></h3>
<p align="center"><strong><?php echo 'Tahun : '.$tahun1.' - '.$tahun2; ?><strong></p>
<table class="table table-bordered">
	<thead>
		<tr style="background-color: #2fa4e7">
			<th>Nama Kabupaten</th>
			<?php for($x=$tahun1; $x<=$tahun2; $x++) { ?>
				
				<th><?php echo $x; ?></th>
				
			<?php } ?>
		</tr>
	</thead>
	<tbody>
	<?php
		if($pivot == null) {
		foreach($kab as $row):
	?>
		
		<tr> 
			<td><?php echo $row->nama_kab; ?></td>
			<?php for($x=0; $x<=$batas; $x++){?>
				<td><?php echo '0'; ?></td>
			<?php } ?>
		</tr> 
	<?php
		endforeach;
	} else {
		foreach($pivot as $row): 
		
	?>
		<tr>
			<td style="background-color: #57bef9"><?php echo $row->nama_kab; ?></td>
			<?php for($x=$tahun1; $x<=$tahun2; $x++) { ?>
				
				<td><?php $y='t'.$x; echo $row->$y; ?></td>
				
			<?php } ?>
		</tr>
	<?php endforeach; } ?>
	</tbody>
</table>