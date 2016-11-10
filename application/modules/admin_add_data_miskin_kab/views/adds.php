              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Tambah data </h3></strong>
    </div>
    <div class="panel-body" id="data_umum">
    <div class="col-sm-6">

	<table class="table">
		<tbody>
			<tr>	
				<td></td>
				<td>
					<select class="form-control input-style select2" name="tahun" id="tahun" required>
						<option value=""> - Pilih Tahun - </option>
						<?php for($x=date("Y"); $x>=2014; $x--) { ?>
						
							<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
							
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>	
				<td width="200px"><strong>Kabupaten</strong></td>
				<td><strong>Jumlah</strong></td>
			</tr>
			<?php
				$x=1;
				$kabupaten = $this->db->get("tiger_kabupaten")->result();
				foreach($kabupaten as $row): 
			
			?>
			<tr>	
				<td><?php echo $row->nama_kab; ?></td>
				<td>
					<input type="hidden" name="<?php echo 'id_kab'.$x; ?>" value="<?php echo $row->id; ?>">
					<input type="number" id="<?php echo 'jumlah'.$x; ?>" name="<?php echo 'jumlah'.$x; ?>" class="form-control input-style kabupaten">
				</td>
			</tr>
			<?php $x++; endforeach; ?>
			<tr>	
				<td></td>
				<td>
				  <button id="tombolsubmitsimpan" style="border-radius: 8;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
				  <a href="<?php echo site_url("$this->controller"); ?>"><button style="border-radius: 8;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>				
				</td>
			</tr>
		</tbody>
	</table>
	    
          
      </div>

  </div>
  </div>
