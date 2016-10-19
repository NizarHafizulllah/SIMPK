
<script type="text/javascript">

$(document).ready(function(){

	 var dt = $("#biro_jasa").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$this->controller/get_data") ?>'
		 	});

		 
		 $("#biro_jasa_filter").css("display","none");  
	
	 
		 $("#btn_submit").click(function(){
		 	  // alert('hello');
		 	

				dt.column(1).search($("#id_desa").val())
				dt.column(2).search($("#tahun").val())
        dt.column(3).search($("#id_kecamatan").val())
				.draw();

				return false;
		 });


		 $("#btn_reset").click(function(){

			$("#id_desa").val('');
      

      
      delete rs;
      $("#id_desa").val("");
      


			$("#btn_submit").click();
		 });


});

$("#excel_print").click(function() {
  

  var tahun;
  var kecamatan;
  var desa;

  tahun = $("#tahun").val();
  kecamatan = $("#id_kecamatan").val();
  desa = $("#id_desa").val();
  
  // window.alert(desa);
  
  open('<?php echo site_url("$this->controller/excel?"); ?>'+ 'tahun=' + tahun + '&desa='+ desa +'&kecamatan='+kecamatan);

});


$("#pdf_print").click(function() {
  

  var tahun;
  var kecamatan;
  var desa;

  tahun = $("#tahun").val();
  kecamatan = $("#id_kecamatan").val();
  desa = $("#id_desa").val();
  
  // window.alert(desa);
  
  open('<?php echo site_url("$this->controller/pdf?"); ?>'+ 'tahun=' + tahun + '&desa='+ desa +'&kecamatan='+kecamatan);

});
	

 $(".select2").select2();


function hapus(nik){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA PENDUDUK MISKIN. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA USER  PENDUDUK MISKIN',
            draggable: true,
            buttons : [
              {
                label : 'YA',
                cssClass : 'btn-primary',
                hotkey: 13,
                action : function(dialogItself){


                  dialogItself.close();
                  $('#myPleaseWait').modal('show'); 
                  $.ajax({
                  	url : '<?php echo site_url("$this->controller/hapusdata") ?>',
                  	type : 'post',
                  	data : {nik : nik},
                  	dataType : 'json',
                  	success : function(obj) {
                  		$('#myPleaseWait').modal('hide'); 
                  		if(obj.error==false) {
                  				BootstrapDialog.alert({
				                      type: BootstrapDialog.TYPE_PRIMARY,
				                      title: 'Informasi',
				                      message: obj.message,
				                       
				                  });   

                  			$('#biro_jasa').DataTable().ajax.reload();		
                  		}
                  		else {
                  			BootstrapDialog.alert({
			                      type: BootstrapDialog.TYPE_DANGER,
			                      title: 'Error',
			                      message: obj.message,
			                       
			                  }); 
                  		}
                  	}
                  });

                }
              },
              {
                label : 'TIDAK',
                cssClass : 'btn-danger',
                action: function(dialogItself){
                    dialogItself.close();
                }
              }
            ]
          });

}
 		 

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




</script>