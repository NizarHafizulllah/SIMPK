<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- dropdown button -->
    

    <link rel="stylesheet" href="<?php echo base_url('assets/dropdown/'); ?>/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dropdown/'); ?>/css/style.css"> <!-- Resource style -->
    <script src="<?php echo base_url('assets/dropdown/'); ?>/js/modernizr.js"></script> <!-- Modernizr -->


    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">

    




  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
  
    
      <img id="gambar" src="<?php echo base_url('assets/img/pendidikan.jpeg'); ?>" width="1500" height="300" border="9">
         <header>
        <div class="cd-dropdown-wrapper">
      <a class="cd-dropdown-trigger" href="#0">Menu</a>
      <nav class="cd-dropdown">
        <h2>Title</h2>
        <a href="#" class="cd-close">Close</a>
        <ul class="cd-dropdown-content">

         <li><a href="#">Beranda</a></li>
         <li><a href="#">Profil Daerah</a></li>
             <li class="has-children">
            <a href="#">Profil Program</a>
            <ul class="cd-dropdown-icons is-hidden">
              <li class="go-back"><a href="#0">Menu</a></li>
              
              <li>
                <a class="cd-dropdown-item item-1" href="#">
                  <h3>Klaster 1</h3>
                  <p>This is the item description</p>
                </a>
              </li>

              <li>
                <a class="cd-dropdown-item item-2" href="#">
                  <h3>Klaster 2</h3>
                  <p>This is the item description</p>
                </a>
              </li>

              <li>
                <a class="cd-dropdown-item item-3" href="#">
                  <h3>Klaster 3</h3>
                  <p>This is the item description</p>
                </a>
              </li>

              <li>
                <a class="cd-dropdown-item item-4" href="#">
                  <h3>Klaster 4</h3>
                  <p>This is the item description</p>
                </a>
              </li>

            </ul> <!-- .cd-dropdown-icons -->
          </li> <!-- .has-children -->

          <li class="has-children">
            <a href="#">Galeri</a>

            <ul class="cd-dropdown-gallery is-hidden">
              <li class="go-back"><a href="#">Menu</a></li>
              <li class="see-all"><a href="#">Buka Galeri</a></li>
              <li>
                <a class="cd-dropdown-item" href="#">
                  <img src="<?php echo base_url('assets/img/raskin.jpg') ?>" alt="Pembagian Raskin">
                  <h3>Pembagian Raskin</h3>
                </a>
              </li>

              <li>
                <a class="cd-dropdown-item" href="#">
                  <img src="<?php echo base_url('assets/img/pkh.jpg') ?>" alt="Pembagian Raskin">
                  <h3>Keluarga Harapan</h3>
                </a>
              </li>
              <li>
                <a class="cd-dropdown-item" href="#">
                  <img src="<?php echo base_url('assets/img/pendidikan.jpeg') ?>" alt="Pembagian Raskin">
                  <h3>Pendidikan</h3>
                </a>
              </li>
              <li>
                <a class="cd-dropdown-item" href="#">
                  <img src="<?php echo base_url('assets/img/dokter.jpg') ?>" alt="Pembagian Raskin">
                  <h3>Jamkesmas</h3>
                </a>
              </li>



             
            </ul> <!-- .cd-dropdown-gallery -->
          </li> <!-- .has-children -->

      

          <li class="cd-divider">Data Kemiskinan</li>

          <li><a href="#">Grafik</a></li>
          <li><a href="#">Tematik</a></li>
          <li><a href="#">Pivot</a></li>
        </ul> <!-- .cd-dropdown-content -->
      </nav> <!-- .cd-dropdown -->
    </div> <!-- .cd-dropdown-wrapper -->
  </header>


    <!-- dropdown -->

    <script src="<?php echo base_url('assets/dropdown/'); ?>/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url('assets/dropdown/'); ?>/js/jquery.menu-aim.js"></script> <!-- menu aim -->
    <script src="<?php echo base_url('assets/dropdown/'); ?>/js/main.js"></script>

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets') ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets') ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets') ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets') ?>/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets') ?>/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets') ?>s/dist/js/demo.js"></script>
  </body>
</html>
