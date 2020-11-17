$(document).ready(function(){

    $('#form_agregar_cliente').submit(function() {
        $.ajax({
            type: 'POST',
            url: 'php/guardar_cliente.php',
            data: $('#form_agregar_cliente').serialize(),
            success:  function(data) {
                if (data == 'Ok'){

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                          confirmButton: 'btn btn-success',
                          cancelButton: 'btn btn-danger'
                        },
                        // buttonsStyling: false,
                    });
                    swalWithBootstrapButtons.fire({
                        type: 'success',
                        title: '¡Correcto!',
                        text: 'En breve nos pondremos en contacto',
                        confirmButtonClass: 'btn btn-success',
                        confirmButtonText:  'Aceptar'
                    });

                } else {

                    console.log(data);

                }
                
            }
        });
        return false;
    });

});