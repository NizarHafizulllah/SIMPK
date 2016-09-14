<link href="<?php echo base_url("assets") ?>/css/datepicker.css" rel="stylesheet">
<script src="<?php echo base_url("assets") ?>/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url("assets") ?>/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


  <link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" >

    <script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>
        <!-- Content Header (Page header) -->
   
<!-- Large modal -->
<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      Hello
    </div>
  </div>
</div>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penduduk Miskin Per Kabupaten</h3>
              <div class="box-tools pull-right">
			  <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Baru</button>
              <a href="<?php echo site_url("admin_add_data_miskin_kab/baru"); ?>"><button type="button" class="btn btn-primary form-control"><i class="fa fa fa-plus-circle "></i> Tambah Data</button></a>
              </div>
            </div>
            <div class="box-body">


<div class="row">
            

            <form role="form" action="" id="btn-cari" >
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama">Kabupaten</label>
					<select class="form-control">
						<option> - Kabupaten - </option>
					</select>
                <?php //echo form_dropdown("id_kecamatan",$arr_kecamatan,'','id="id_kecamatan" class="form-control input-style select2"'); ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" style="border-radius: 8px;">
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
<table width="100%" border="0" id="biro_jasa" class="table table-striped table-hover dataTable no-footer" role="grid">
<thead>
  <tr>
    
        <th width="7%">No.</th>
        <th width="23%">Nama Kabupaten</th>        
        <th width="10%">Jumlah</th>
        <th width="14%">#</th>
    </tr>
  
</thead>
</table>
</div>
</div>
            </div>
           



<?php 
$this->load->view("view_js");
?>