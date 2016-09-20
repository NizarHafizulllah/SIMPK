<style type="text/css">
	.thumbnail img{
		height: 200px;
	}
</style>
<h3>Foto Kegiatan</h3>
<hr>

<div class="row">
<?php for($x=1; $x<=12; $x++) { ?>
  <div class="col-xs-3 col-md-3">
	<a class="fancybox thumbnail" rel="galery" href="<?php echo base_url().'assets/kegiatan/kegiatan'.$x.'.jpg'; ?>" title="Deskripsi tentang kegiatan <?php echo $x; ?>">
		<img src="<?php echo base_url().'assets/kegiatan/kegiatan'.$x.'.jpg'; ?>">
	</a>
  </div>
<?php } ?>
</div>
<br>
<div style="text-align: center">
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