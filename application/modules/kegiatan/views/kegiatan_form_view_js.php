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
                    judul: {
                        validators: {
                            notEmpty: {
                                message : 'Judul tidak boleh kosong' 
                            }
                        }
                    }, 

                    keterangan: {
                        validators: {
                            notEmpty: {
                                message : 'Keterangan tidak boleh kosong' 
                            }
                        }
                    }, 
                    
                }
                
            });



        $('#reset').click(function() {
            $('#form_data').data('bootstrapValidator').resetForm(true);
        });




$("#simpan").click(function(){
 console.log('tests');

    $.ajax({
        url:'<?php echo site_url("$this->controller/simpan"); ?>',
        data : $('#form_data').serialize(),
        type : 'post',
		contentType: 'multipart/form-data; charset=UTF-8; boundary=AaB03x', 
		encoding: '', 
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

    return false;
});



$("#update").click(function(){ 
    $.ajax({
        url:'<?php echo site_url("$this->controller/update"); ?>',
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

  







});


</script>