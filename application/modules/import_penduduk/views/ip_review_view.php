
<section class="content">
          <div class="row">
            <div class="col-xs-12">
            <form class="form-inline" id="gembreng" enctype="multipart/form-data" method="post" action="<?php echo site_url($this->controller."/save"); ?>">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pilih Data Yang Ingin Di Export</h3>
                  <div class="pull-right"><button type="submit" class="btn btn-primary">Import Data</button></div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="3%"><input type="checkbox" id="selall" name="selall" value="1" /></th>
                        <th width="4%" >NO.</th>
                        <th width="12%" >NO. KK</th>
                        <th width="12%" >NIK</th>
                        <th width="11%" >NAMA</th>
                        <th width="10%" >TMP LAHIR</th>
                        <th width="10%" >TGL LAHIR</th>
                        <th width="14%" >ALAMAT</th>
                        <th width="3%" >RT</th>
                        <th width="5%" >RW</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
        $i = 0;
        //show_array($data);  
        foreach($data as $index => $row) : 
        $i++;
        ?>   
           <tr>
             <td><input class="ck_data" type="checkbox" name="data[<?php echo $index; ?>]" value="<?php echo isset($index)?$index:""; ?>" /></td>
             <td><?php echo $i; ?></td>
             <td><?php echo $row['nomor_kk']; ?></td>
             <td><?php echo $row['nik']; ?></td>
             <td><?php echo $row['nama']; ?></td>
             <td><?php echo $row['tempat_lahir']; ?></td>
             <td><?php echo flipdate($row['tanggal_lahir']); ?></td>
             <td><?php echo $row['alamat']; ?></td>
             <td><?php echo $row['rt']; ?></td>
             <td><?php echo $row['rw']; ?></td>
       </tr>
           <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th width="3%"><input type="checkbox"  value="1" /> All</th>
                        <th width="4%" >NO.</th>
                        <th width="12%" >NO. KK</th>
                        <th width="12%" >NIK</th>
                        <th width="9%" >NAMA</th>
                        <th width="12%" >TMP LAHIR</th>
                        <th width="10%" >TGL LAHIR</th>
                        <th width="14%" >ALAMAT</th>
                        <th width="3%" >RT</th>
                        <th width="5%" >RW</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>




<link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.css">
<script src="<?php echo base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $('#example2').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
    </script>

<script>
 $(document).ready(function(){
 
$("#selall").click(function(){
    
    if(this.checked) { // check select status
            $('.ck_data').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.ck_data').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }

    
}
);
});              
</script>