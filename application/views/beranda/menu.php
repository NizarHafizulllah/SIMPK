  <div class="header">
  </div>
<nav class="navbar navbar-default">
  <div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
	  <ul class="nav navbar-nav menu">
		<li class="active<?php //echo $aktif=='beranda'?'active':''; ?>"><a href="<?php echo site_url() ?>">Beranda <span class="sr-only">(current)</span></a></li>
		<li class="<?php //echo $aktif=='dinas'?'active':''; ?>"><a href="<?php echo site_url('beranda/profil_daerah') ?>">Profil Daerah<span class="sr-only">(current)</span></a></li>
		<li class="dropdown <?php //echo $aktif=='pendaftar'?'active':''; ?>">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil Program<span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li><a href="<?php echo site_url('beranda/klaster1'); ?>">Klaster 1</a></li>
			<li><a href="<?php echo site_url('beranda/klaster2'); ?>">Klaster 2</a></li>
			<li><a href="<?php echo site_url('beranda/klaster3'); ?>">Klaster 3</a></li>
			<li><a href="<?php echo site_url('beranda/klaster4'); ?>">Klaster 4</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container main">
	<div class="col-md-8">
