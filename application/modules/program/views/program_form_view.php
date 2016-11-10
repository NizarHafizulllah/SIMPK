      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >
    <script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>
     
        <!-- Main content -->
        <form id="form_data" class="form-horizontal" method="post" 
        action="" role="form"> 

 


              <div class="panel panel-primary">
      <div class="panel-heading">
      <strong><h3 class="panel-title">Tambah data </h3></strong>
    </div>
    <div class="panel-body" id="data_umum">

    <div class="form-group">
      <label class="col-sm-3 control-label">Klaster</label>
      <div class="col-sm-9">
      <input type="hidden" name="id" value="<?php echo isset($id)?$id:""; ?>">
      <?php echo form_dropdown("id_klaster",$arr_klaster,isset($id_klaster)?$id_klaster:'','id="id_klaster" class="form-control input-style select2"'); ?>

        <!-- 
		<select class="form-control input-style select2" name="id_klaster">
			<option value=""> - Pilih Klaster - </option>
			<?php foreach($arr_klaster as $row): ?>
				<option <?php if(isset($id_klaster)) echo $row->id==$id_klaster?'selected':''; ?> value="<?php echo $row->id; ?>"> <?php echo $row->klaster; ?> </option>
			<?php endforeach; ?>
		</select> -->
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Program</label>
      <div class="col-sm-9">
		<input type="text" name="program"  value="<?php echo isset($program)?$program:""; ?>" id="program" class="form-control input-style" placeholder="Program . . ."  style="border-radius: 8px;">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Kegiatan</label>
      <div class="col-sm-9">
    <input type="text" name="kegiatan"  value="<?php echo isset($kegiatan)?$kegiatan:""; ?>" id="kegiatan" class="form-control input-style" placeholder="Kegiatan . . ."  style="border-radius: 8px;">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Jumlah Pagu</label>
      <div class="col-sm-9">
    <input type="text" name="jumlah_pagu"  value="<?php echo isset($jumlah_pagu)?$jumlah_pagu:""; ?>" id="jumlah_pagu" class="rupiah form-control input-style" placeholder="Jumlah Pagu . . ."  style="border-radius: 8px;" data-a-sign="" data-a-dec="," data-a-sep="." >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">SKPD</label>
      <div class="col-sm-9">
    <input type="text" name="skpd"  value="<?php echo isset($skpd)?$skpd:""; ?>" id="skpd" class="form-control input-style" placeholder="SKPD . . ."  style="border-radius: 8px;">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Keterangan</label>
      <div class="col-sm-9">
		<textarea name="keterangan" class="form-control input-style"><?php echo isset($keterangan)?$keterangan:""; ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-3 control-label">Tahun</label>
      <div class="col-sm-9">
		<select class="form-control input-style select2" name="tahun" id="tahun">
			<option selected value="0"> - Tahun - </option>
			<?php for($x=date("Y"); $x>=2014; $x--) { ?>
		
				<option <?php if(isset($tahun)) echo $x==$tahun?'selected':''; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
		
			<?php } ?>
		</select>
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