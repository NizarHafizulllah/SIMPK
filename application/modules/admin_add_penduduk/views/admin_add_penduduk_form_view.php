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



    <div class="form-group">
      <label class="col-sm-3 control-label">NIK </label>
      <div class="col-sm-9">
       
        <input type="text" name="nik" id="nik" class="form-control input-style" placeholder="NIK" 
        value="<?php echo isset($nik)?$nik:""; ?>" style="border-radius: 8px;">
      </div>
    </div>
    
    
    <div class="form-group">
      <label class="col-sm-3 control-label">Nomor KK</label>
      <div class="col-sm-9">
        <input type="text" name="nomor_kk"  value="<?php echo isset($nomor_kk)?$nomor_kk:""; ?>" id="nomor_kk" class="form-control input-style" placeholder="Nomor KK . . ."  style="border-radius: 8px;">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Hubungan Keluarga</label>
      <div class="col-sm-9">
        <select class="form-control select2" name="hubungan_keluarga">
          <option value="" selected="">--Hubungan Dalam Keluarga--</option>
          <option value="1">Kepala Keluarga</option>
          <option value="2">Bukan Kepala Keluarga</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Nama</label>
      <div class="col-sm-9">
        <input type="text" name="nama"  value="<?php echo isset($nama)?$nama:""; ?>" id="nama" class="form-control input-style" placeholder="Nama . . ."  style="border-radius: 8px;">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tempat Lahir</label>
      <div class="col-sm-9">
        <input type="text" name="tempat_lahir"  value="<?php echo isset($tempat_lahir)?$tempat_lahir:""; ?>" id="tempat_lahir" class="form-control input-style" placeholder="Tempat Lahir . . ." style="border-radius: 8px;" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tanggal Lahir</label>
      <div class="col-sm-9">
        <input type="text" id="datemask" name="tanggal_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask style="border-radius: 8px;" value="<?php echo isset($tanggal_lahir)?$tanggal_lahir:""; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Jenis Kelamin</label>
      <div class="col-sm-9">
        <select class="form-control select2" name="jk">
          <option value="" <option value="">--Jenis Kelamin--</option>>--Jenis Kelamin--</option>
          <option value="l">Laki-laki</option>
          <option value="p">Perempuan</option>
        </select>
      </div>
    </div>
     <div class="form-group">
      <label class="col-sm-3 control-label">Kecamatan </label>
      <div class="col-sm-9">
       
        
        <?php echo form_dropdown("kecamatan",$arr_kecamatan,isset($id_kecamatan)?$id_kecamatan:'','id="id_kecamatan" class="form-control select2" style="width: 100%;"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Desa </label>
      <div class="col-sm-9">
       
        <?php echo form_dropdown("id_desa",array(),'','id="id_desa" class="form-control input-style select2"'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Alamat</label>
      <div class="col-sm-9">
      <textarea name="alamat" id="alamat" class="form-control input-style" placeholder="Alamat . . ." style="border-radius: 8px;"><?php echo isset($alamat)?$alamat:""; ?></textarea>
      </div>
    </div>
        <div class="form-group">
      <label class="col-sm-3 control-label">RT</label>
      <div class="col-sm-4">
        <input type="text" name="rt"  value="<?php echo isset($rt)?$rt:""; ?>" id="rt" class="form-control input-style" placeholder="RT . . ."  style="border-radius: 8px;">
      </div>
      <label class="col-sm-1 control-label">RW</label>
      <div class="col-sm-4">
        <input type="text" name="rw"  value="<?php echo isset($rw)?$rw:""; ?>" id="rw" class="form-control input-style" placeholder="RW . . ."  style="border-radius: 8px;">
      </div>
    </div>
       
    <div class="form-group pull-center">
        <div class="col-sm-offset-3 col-sm-9">
          <button id="tombolsubmitsimpan" style="border-radius: 8;" type="submit" class="btn btn-lg btn-primary"  >Simpan</button>
          <a href="<?php echo site_url("$this->controller"); ?>"><button style="border-radius: 8;" id="reset" type="button" class="btn btn-lg btn-danger">Cancel</button></a>
        </div>
      </div>

  </div>
  </form>


      <?php 
$this->load->view($this->controller."_form_view_js");
?>