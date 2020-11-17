$(document).ready(function () {

    setTimeout(actualizar(), 1500);
    
    $('#form_ingresar').submit(function () {
        ingresar()
        return false;
    })
})

function ingresar() {
    $.ajax({
        url: 'php/ingreso.php',
        type: 'POST',
        data: $('#form_ingresar').serialize(),
        success: function (data) {
            if (data != 0) {
                window.location.href = 'index.php';
                $('.content-update').html(`
                    <form action="https://www.gotomeet.me/Cootranshuila">
                        <div class="wrap-title">
                            <h5>Bienvenido</h5>
                        </div>
                        <div class="wrap-title">
                            <h5>`+data+`</h5>
                        </div>
                        <br>
                        <button type="submit" class="button" style="width: 100%;">Ingresar a la trasmision</button>
                        <button type="button" class="button" id="votar" data-toggle="modal" data-target=".bd-example-modal-xl" style="width: 100%;">Votar</button>
                    </form>
                `)
                actualizar()
            } else {
                $('#form_ingresar')[0].reset();
                $('#err').html('<span>Usuario o contraseña incorrectos.</span>')
            }
        }
    })
}

function actualizar() {
    $.ajax({
        url: 'php/actualizar.php',
        type: 'POST',
        success: function (data) {
            console.log(data)
            var porcentaje = financial((data*100)/125, 2)
            $('#total').text(data)
            $('#porcentaje').text(porcentaje+'%')
        }
    })
}

function financial(x) {
    return Number.parseFloat(x).toFixed(2);
}