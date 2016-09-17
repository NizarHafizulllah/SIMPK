<script type="text/javascript">

$(document).ready(function(){

 $(".select2").select2();
$("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "HH-BB-TTTT"});

$('#form_data').bootstrapValidator({
                message: 'This value is not valid', 
                feedbackIcons: { 
                    valid: 'glyphicon glyphicon-ok', 
                    invalid: 'glyphicon glyphicon-remove', 
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    jumlah1: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },

                    jumlah2: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },
                     jumlah3: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },

                    jumlah4: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },

                     jumlah5: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },

                     jumlah6: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },

                    jumlah7: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },

                    jumlah8: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },
                  
                    jumlah9: {
                        validators: {
                            notEmpty: {
                                message : 'inputan tidak boleh kosong' 
                            }
                        }
                    },
                  

                    nik: {
                        validators: {
                            notEmpty: {
                                message : 'NIK Tidak Boleh Kosong'    
                            },
                            remote: {
                                type: 'POST',
                                url: "<?php echo site_url('admin_add_penduduk/cekNIK'); ?>",
                                message: 'Penduduk dengan NIK ini sudah pernah ditambahkan',
                                delay: 200
                            }
                        }
                    } 

                    
                }
                
            });



        $('#reset').click(function() {
            $('#form_data').data('bootstrapValidator').resetForm(true);
        });

  $("#id_kota").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_kecamatan") ?>',
            data : { id_kota : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_kecamatan").html(result)
            }
      });

    });

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

$("#tombolsubmitsimpan").click(function(){
 console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_data').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message
                             
                        });   
                      $('#form_data').data('bootstrapValidator').resetForm(true);

            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        }); 
            }
        }

    });
    $('#biro_jasa').DataTable().ajax.reload();
    return false;
});



$("#tombolsubmitupdate").click(function(){ 
    $.ajax({
        url:'<?php echo site_url("$this->controller/update"); ?>',
        data : $('#form_edit').serialize(),
        type : 'post',
        dataType : 'json',
        success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message
                             
                        });   
                     // $('#form_data').data('bootstrapValidator').resetForm(true);
            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        }); 
            }
        }
    });

    return false;
});

  $("#id_polda").change(function(){

    $.ajax({

            url : '<?php echo site_url("$this->controller/get_samsat") ?>',
            data : { id_polda : $(this).val() },
            type : 'post', 
            success : function(result) {
                $("#id_samsat").html(result)
            }
      });

    });







});

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