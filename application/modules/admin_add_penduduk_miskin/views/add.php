      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >

    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
     
        <!-- Main content -->
 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Tambah data </h3></strong>
    </div>
    <div class="panel-body" id="data_umum">
            <div class="box-body">


			<div class="row">
            

            <form role="form" action="" id="btn-cari">
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">Kecamatan</label>
                <?php echo form_dropdown("id_kecamatan",$arr_kecamatan,'','id="id_kecamatan" class="form-control input-style select2"'); ?>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">Desa</label>
                <?php echo form_dropdown("id_desa",array(),'','id="id_desa" class="form-control input-style select2"'); ?>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">nama</label>
                <?php echo form_dropdown("id_desa",array(),'','id="id_desa" class="form-control input-style select2"'); ?>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="submit" class="btn btn-primary form-control" id="btn_submit"><i class="fa">Cari</i></button>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <label></label>
                <button type="reset" class="btn btn-danger form-control" id="btn_reset"><i class="fa">Reset</i></button>
              </div>
            </div>
            </form>
		</div>          
			<br>
			<form id="form_data" class="form-horizontal" method="post" action="<?php echo site_url("$this->controller/$action"); ?>" role="form"> 
			<div class="row">
				<div class="col-md-4">
					<select class="form-control input-style select2" name="tahun" id="tahun">
						<option selected value="0"> - Tahun - </option>
							<?php for($x=date("Y"); $x>=2000; $x--) { ?>
						
							<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
						
						<?php } ?>
					</select>
				</div>
			</div>
			<br>
			<div class="col-md-12">
				<div class="table-responsive">

				<table width="100%" border="0" id="biro_jasa" class="table table-striped table-hover dataTable no-footer" role="grid">
				<thead>
				  <tr>    
						<th width="5%">#</th>
						<th width="7%">NIK</th>
						<th width="13%">Nama</th>        
						<th width="20%">Alamat</th>
						<th width="7%">Pekerjaan</th>
						<th width="10%">Desa</th>
					</tr>
				  
				</thead>
				</table>
				</div>
				<button id="tombolsubmitsimpan" style="border-radius: 8;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
				<a href="<?php echo site_url("$this->controller"); ?>"><button style="border-radius: 8;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>				
			</div>
			</form>
            </div>
           



<?php 
$this->load->view("view_penduduk_js");
?>
  </div>
  </div>
<?php 
$this->load->view("add_js");
?>