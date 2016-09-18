
<script type="text/javascript">

$(document).ready(function(){

	 var dt = $("#biro_jasa").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": false } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("$this->controller/get_data2") ?>'
		 	});

		 
		 $("#biro_jasa_filter").css("display","none");  
	

		$("#tahun").change(function(){
			dt.column(3).search($("#tahun").val()).draw();
			
			return false;
		});

		 $("#btn_submit").click(function(){
		 	  // alert('hello');
		 	  

		 	  dt.column(1).search($("#id_desa").val())
			  dt.column(2).search($("#nama").val())
				 .draw();

				 return false;
		 });


		 $("#btn_reset").click(function(){
			$("#id_desa").val('');
      
      
      delete rs;
      $("#nama").val("");
      


			$("#btn_submit").click();
		 });


});
	

 $(".select2").select2();


function hapus(nik){



BootstrapDialog.show({
            message : 'ANDA AKAN MENGHAPUS DATA USER BIRO JASA. ANDA YAKIN  ?  ',
            title: 'KONFIRMASI HAPUS DATA USER  BIRO JASA',
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

$("#id_desa").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_nama") ?>',
            data : { id_desa : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#nama").html(result)
            }
    });

});


</script>