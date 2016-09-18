<h3 align="center"><?php echo $title; ?></h3>
<p align="center"><strong><?php echo 'Tahun : '.($tahun-7).' - '.$tahun; ?><strong></p>
<table class="table table-bordered">
	<thead>
		<tr style="background-color: #2fa4e7">
			<th>Nama Kabupaten</th>
			<?php for($x=$tahun-7; $x<=$tahun; $x++) { ?>
				
				<th><?php echo $x; ?></th>
				
			<?php } ?>
		</tr>
	</thead>
	<tbody>
	<?php foreach($pivot as $row): ?>
		<tr>
			<td style="background-color: #57bef9"><?php echo $row->nama_kab; ?></td>
			<?php for($x=$tahun-7; $x<=$tahun; $x++) { ?>
				
				<td><?php $y='t'.$x; echo $row->$y; ?></td>
				
			<?php } ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>