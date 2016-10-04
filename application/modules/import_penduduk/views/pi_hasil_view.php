<section class="content">
          <div class="row">
            <div class="col-xs-12">
            
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Pilih Data Yang Ingin Di Export</h3>
                  <div class="pull-right"><button type="submit" class="btn btn-primary">Import Data</button></div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <h2>IMPORT DATA PENDUDUK SELESAI </h2>
                  <span style="color:green">Data berhasil diproses <?php echo $berhasil; ?> </span><br />
                  <span style="color:red">Data gagal diproses <?php echo $gagal; ?> </span>
                  <hr />

                  <?php 
                    foreach($arr_berhasil as $x) : 
                    echo "$x berhasil disimpan <br />";
                    endforeach;
                  ?>
                  <?php 
                    foreach($arr_gagal as $x) : 
                    echo "$x gagal disimpan. NIK sudah ada  <br />";
                    endforeach;
                  ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section>

