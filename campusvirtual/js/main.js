// Funcion para registrarse
$("#form-register").submit(function () {
    
    $.ajax({
        url: 'validaciones/register.php',
        type: 'POST',
        data: $("#form-register").serialize(),
        success: function (data) {
            if (data == 1) {
                swal({
                    title: "Registro realizado!",
                    text: "A su correo sera enviado el usuario y contraseña",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'Aceptar'
                },
                function(isConfirm){
                  if (isConfirm) {
                        swal.close();
                        $("#form-register")[0].reset();
                    }
                });
            } else {
                swal({
                    title: "Error!",
                    text: "Contacte el servicio al cliente",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    })

    return false;

});

// Funcion Login
$("#form-login").submit(function () {
    
    $.ajax({
        url: 'validaciones/login.php',
        type: 'POST',
        data: $("#form-login").serialize(),
        success: function (data) {
            if (data == 1) {
                window.location.href = "single-course.php?contenido"
            } else {
                $("#form-login")[0].reset();
                swal({
                    title: "Error!",
                    text: "Usuario o contraseña incorrectos",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Aceptar'
                });
            }
        }
    })

    return false;

});