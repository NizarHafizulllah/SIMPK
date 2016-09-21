<style type="text/css">
	.thumbnail img{
		height: 200px;
	}
</style>
<h3>Foto Kegiatan</h3>
<hr>

<div class="row">
<?php if($query == null){?>
  <h3 style="text-align: center">- Data kosong -</h3>
<?php }else{ foreach ($query as $row):?>
  <div class="col-xs-3 col-md-3">
	<a class="fancybox thumbnail" rel="galery" href="<?php echo base_url().'assets/kegiatan/'.$row->photo; ?>" title="<?php echo $row->keterangan; ?>">
		<img src="<?php echo base_url().'assets/kegiatan/'.$row->photo; ?>">
	</a>
  </div>
<?php endforeach; } ?>
</div>
<br>
<div style="text-align: center">
  <?php echo $halaman; ?>
</div>
<script>
$(".fancybox").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	false
	});
</script>