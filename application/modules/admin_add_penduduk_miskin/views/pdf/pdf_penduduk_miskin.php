<html>
  <head>
    <title>
      <?php echo   $title; ?>
    </title>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/print_style.css">


</head>

<body>

<!-- <div id="wrap" style="width:1024; margin:0px auto" >  -->


<style>
* {
  font-size:10px;
}
.judul {
  font-size:12px;
  font-weight:bold;
   text-align:center;
}

#gambar {
  width:50px;
  position:fixed;
  top:10px;
  float:left;
}

#kop {
  text-align:center;
}

.thead {
  font-weight: bold;
}
</style>



<table width="100%" border="0" cellpadding="3">
  
  <tr>
    <td width="23%" align="center"></td>
    <td width="54%" align="center"><span class="judul">DATA PENDUDUK MISKIN<br />
      KABUPATEN SUMBAWA BARAT
      <?php if(!empty($kecamatan)){ echo '<br/> KECAMATAN '.$kecamatan;}?><?php if(!empty($desa)){ echo '<br/> DESA/KEL. '.$desa;}?></span><br />
    </td>
    <td width="23%" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><hr /></td>
  </tr>
</table>

    
    

<br/>
<br/> 

<table border="0.4" cellpadding="5" width="100%">
  
  <?php 

  $a = 0;
  foreach($query as $x => $row): 
    if($row->jk=="l"){
    $gender = "Laki-laki";
    }else{
    $gender = "Perempuan";
    }

    if($row->tahun != $a) {
  ?>
<tr style="border: 0">
  <td colspan="8" class="thead">Tahun : <?php echo $row->tahun; ?></td>
</tr>    
<tr class="thead">
    <th width="3%">No</th>
    <th width="13%">No KK</th>
    <th width="13%">NIK</th>
    <th width="15%">Nama</th>
    <th width="10%">Jenis Kelamin</th>
    <th width="20%">Tempat/Tgl. Lahir</th>
    <th width="18%">Alamat</th>
    <th width="8%">Pekerjaan</th>
  </tr>
<?php } ?>
  <tr>
    <td><?php echo $x+1; ?></td>
    <td><?php echo $row->nomor_kk; ?></td>
    <td><?php echo $row->nik; ?></td>
    <td><?php echo $row->nama; ?></td>
    <td><?php echo $gender; ?></td>
    <td><?php echo $row->tempat_lahir.', '.flipdate($row->tanggal_lahir); ?></td>
    <td><?php echo $row->alamat; ?></td>
    <td><?php echo $row->pekerjaan; ?></td>
  </tr>
  <?php $a = $row->tahun; endforeach; ?>
</table>
    
<!-- </div> end of wrap -->
</body>

</html>