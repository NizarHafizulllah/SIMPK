      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
     
        <!-- Main content -->
        <form id="fxorm_data" class="form-horizontal" method="post" 
        action="<?php echo site_url('kegiatan/simpan'); ?>" role="form" enctype="multipart/form-data"> 

 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Tambah data </h3></strong>
    </div>
    <div class="panel-body" id="data_umum">
	<?php echo $this->session->flashdata('message'); ?>

    <div class="form-group">
      <label class="col-sm-3 control-label">Judul</label>
      <div class="col-sm-5">
        <input type="hidden" name="id" value="<?php echo isset($id)?$id:""; ?>">
        <input type="text" name="judul" value="<?php echo isset($judul)?$judul:""; ?>" id="judul" class="form-control input-style" placeholder="Judul . . ."  style="border-radius: 8px;">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Keterangan</label>
      <div class="col-sm-6">
		<textarea id="keterangan" name="keterangan" class="form-control input-style" placeholder="Keterangan . . ."  style="border-radius: 8px;"><?php echo isset($judul)?$judul:""; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Foto</label>
      <div class="col-sm-5">
        <input type="file" name="photo" id="photo" class="form-control input-style" placeholder="Photo . . ."  style="border-radius: 8px;">
      </div>
    </div>
       
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button jid="<?php echo $action ?>" style="border-radius: 8;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url("$this->controller"); ?>"><button style="border-radius: 8;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>