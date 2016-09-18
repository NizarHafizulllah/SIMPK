      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
     
        <!-- Main content -->
        <form id="form_data" class="form-horizontal" method="post" 
        action="" role="form"> 

 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Tambah data </h3></strong>
    </div>
    <div class="panel-body" id="data_umum">

    <div class="form-group">
      <label class="col-sm-3 control-label">Pekerjaan</label>
      <div class="col-sm-9">
        <input type="hidden" name="id" value="<?php echo isset($id)?$id:""; ?>">
        <input type="text" name="pekerjaan"  value="<?php echo isset($pekerjaan)?$pekerjaan:""; ?>" id="pekerjaan" class="form-control input-style" placeholder="Pekerjaan . . ."  style="border-radius: 8px;">
      </div>
    </div>
       
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="<?php echo $action ?>" style="border-radius: 8;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url("$this->controller"); ?>"><button style="border-radius: 8;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>