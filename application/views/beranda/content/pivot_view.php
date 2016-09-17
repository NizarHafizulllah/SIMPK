<h3 align="center">Data Pivot</h3>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nama Kabupaten</th>
			<th>Tahun 2000</th>
			<th>Tahun 2001</th>
			<th>Tahun 2002</th>
			<th>Tahun 2003</th>
			<th>Tahun 2004</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($pivot as $row): ?>
		<tr>
			<td><?php echo $row->nama_kab; ?></td>
			<td><?php echo $row->t2000; ?></td>
			<td><?php echo $row->t2001; ?></td>
			<td><?php echo $row->t2002; ?></td>
			<td><?php echo $row->t2003; ?></td>
			<td><?php echo $row->t2004; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>