//FUNCION PARA AGREGAR LA CUOTA SEMANA (resive el id que es el numero de usuario y el numero de semana)
function cuota(id, semana) {

    $.ajax({
        type: 'POST',
        url: 'validaciones/agregar_cuota.php',
        data: {id:id, semana:semana},
        success: function(data) {

            console.log(data);
            if (data == 'Ok') {
                $('#btn-cuota'+id).removeClass('btn-success').addClass('btn-dark');
                $('#btn-cuota'+id).attr("disabled", "true");

                new PNotify({
                    title: 'Correcto',
                    text: 'La cuota fue confirmada correctamente',
                    type: 'success',
                    hide: true,
                    addclass: 'pnotify-center',
                    styling: 'bootstrap3'
                });
            }
            
        }
    });
    
}

//FUNCION PARA AGREGAR El APORTE SEMANAL (resive el id que es el numero de usuario y el numero de semana)
function aporte(id, semana) {

    $.ajax({
        type: 'POST',
        url: 'validaciones/agregar_aporte.php',
        data: {id:id, semana:semana},
        success: function(data) {

            console.log(data);
            if (data == 'Ok') {
                $('#btn-aporte'+id).removeClass('btn-success').addClass('btn-dark');
                $('#btn-aporte'+id).attr("disabled", "true");

                new PNotify({
                    title: 'Correcto',
                    text: 'El apote fue confirmado correctamente',
                    type: 'success',
                    hide: true,
                    addclass: 'pnotify-center',
                    styling: 'bootstrap3'
                });
            }
            
        }
    });
    
}