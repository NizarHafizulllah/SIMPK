      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
     
        <!-- Main content -->
        <form id="form_data" class="form-horizontal" method="post" 
        action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 

 


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
					<select class="form-control input-style" name="tahun" id="tahun">
						<option> - Pilih Tahun - </option>
						<?php for($x=2000; $x<=date("Y"); $x++) { ?>
						
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
					<input type="post" name="<?php echo 'jumlah'.$x; ?>" class="form-control input-style">
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
  </form>


<?php 
$this->load->view("add_js");
?>