<h3>Grafik Data Kemiskinan Menurut Kecamatan</h3>
<hr>
<script>
$(function () {

   $("#id_kecamatan").change(function(){

    $.ajax({

	            url : '<?php echo site_url("$this->controller/get_desa") ?>',
	            data : { id_kecamatan : $(this).val() },
	            type : 'post', 
	            success : function(result) {
	                $("#id_desa").html(result)
	            }
	      });

    });

   $("#id_desa").change(function(){

    $.ajax({

	            url : '<?php echo site_url("$this->controller/get_rw") ?>',
	            data : { id_desa : $(this).val() },
	            type : 'post', 
	            success : function(result) {
	                $("#rw").html(result)
	            }
	      });

    });
		
	$('#cari').click(function() {
		var nilai = $('#tahun').val();
		
		if(!nilai) {
			alert('Anda harus pilih tahun dulu');
			return false;
		}
		
		$('#grafik').html('<div style="text-align: center; padding-top: 70px;"><img src="<?php echo base_url('assets/images/35.gif'); ?>"></div>');
		
		$.ajax({
			
			url : '<?php echo site_url("beranda/get_grafik_kec"); ?>',
            data : $('#form_data').serialize(),
            type : 'post', 
            success : function(result) {
                $("#grafik").html(result);
            }

			
		});

		return false;
		
	});
	
});
</script>
<div class="panel panel-default" style="background-image: linear-gradient(#54b4eb, #2fa4e7 60%, #1d9ce5);">
  <div class="panel-body">
	<span class="col-md-12">
	<div class="navbar-form" style="margin-top: -7px; margin-bottom: -7px; margin-left: -30px; margin-right: -30px;">
	<form method="post" id="form_data">
		<select class="form-control" name="tahun" id="tahun">
			<option value="">- Pilih Tahun -</option>
			<?php for($x=date('Y'); $x>=2000; $x--) { ?>
				<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
			<?php } ?>
		</select>
        <?php echo form_dropdown("id_kecamatan",$arr_kecamatan,'','id="id_kecamatan" class="form-control "'); ?>
        <?php echo form_dropdown("id_desa",$arr_desa,'','id="id_desa" class="form-control"'); ?>
        <?php echo form_dropdown("rw",$arr_rw,'','id="rw" class="form-control"'); ?>
		<button class="btn btn-default" id="cari">Cari</button>
	</form>
    </div><!-- /input-group -->
	</span>
  </div>
</div>

<div id="grafik"></div>
