 <link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >

    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
        <!-- Content Header (Page header) -->
   

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penduduk</h3>
              <div class="box-tools pull-right">
              <a href="<?php echo site_url("$this->controller/baru"); ?>"><button type="button" class="btn btn-primary form-control"><i class="fa fa fa-plus-circle "></i> Tambah Penduduk</button></a>
              </div>
            </div>
            <div class="box-body">


<div class="row">
            

            <form role="form" action="" id="btn-cari" >
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" style="border-radius: 8px;">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">Kecamatan</label>
                <?php echo form_dropdown("id_kecamatan",$arr_kecamatan,'','id="id_kecamatan" class="form-control input-style " style="border-radius: 8px;"'); ?>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">Desa</label>
                <?php echo form_dropdown("id_desa",array(),'','id="id_desa" class="form-control input-style" style="border-radius: 8px;"'); ?>
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
<div class="col-md-12">
<div class="table-responsive">
<table width="100%" border="0" id="biro_jasa" class="table table-bordered table-hover dataTable" role="grid">
<thead>
  <tr>
        <th width="7%">NIK</th>
        <th width="13%">Nama</th>        
        <th width="20%">Alamat</th>
        <th width="7%">Pekerjaan</th>
        <th width="10%">Desa</th>
        <th width="14%">#</th>
    </tr>
  
</thead>
</table>
</div>
</div>
            </div>
           



<?php 
$this->load->view("admin_penduduk_view_js");
?>