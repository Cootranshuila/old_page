
$('#guardarencuesta').click(function () {
    
    var formData = $("#formencuesta").serialize();

    var recomendacionBtn = $('input[name="recomendacionBtn"]:checked').val();
    var nameRecomen      = $('#nameRecomen').val();
    var phoneRecomen     = $('#phoneRecomen').val();

    if (recomendacionBtn == 'si') {
        if (nameRecomen != '' && phoneRecomen != '') {
            
            $('#nameRecomenResponse').html('');
            $('#phoneRecomenResponse').html('');

            //Peticion AJAX
            peticion(formData);


        } else {
            if(nameRecomen == ''){$('#nameRecomenResponse').html('Este campo es obligatorio');} else {$('#nameRecomenResponse').html('');}
            if(phoneRecomen == ''){$('#phoneRecomenResponse').html('Este campo es obligatorio');} else {$('#phoneRecomenResponse').html('');}
        }
    } else {

        //Peticion AJAX
        peticion(formData);
        
    }

})

function peticion(data) {
    
    $.ajax({
        url:'assets/php/datos_encuesta_clientes.php',
        type:'POST',
        data: data,
       success:function(response){
            if (response == 1) {
                swal({
                    title: "Encuesta realizada",
                    text: "",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'Aceptar'
                }, function(isConfirm){
                    if (isConfirm) {
                        location.href = "../../../index.php";
                    }
                });
            } else {
                console.log(data);
            }
       }
    });

}