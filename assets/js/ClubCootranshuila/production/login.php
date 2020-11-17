<?php

session_start();

if (isset($_SESSION['usr'])) {
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ICON -->
    <link rel="icon" type="image/png" href="images/loog.png" />

    <title>Cootranshuila Team | Login</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">

    <style>
     
      .pnotify-center {
          right: calc(50% - 150px) !important;
        }
     
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <img src="images/logo.png" style="margin-bottom: 60px; margin-top: 33%;" class="img-responsive " alt="logo">

            <form name="loginForm" id="loginForm">
              <h1>Iniciar session</h1>
              <div>
                <input type="text" class="form-control" placeholder="Identificacion" name="id" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Contraseña" name="pass" required />
              </div>
              <div>
                <button type="submit" class="btn btn-default">Ingresar</button>
                <!-- <a class="btn btn-default submit" href="index.html">Ingresar</a> -->
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p> -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <!-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> -->
                  <p>©2019 Copyrigth. Cootranshuila Team.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <!-- <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div> -->
      </div>
    </div>
  </body>

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- PNotify -->
<script src="../vendors/pnotify/dist/pnotify.js"></script>
<script>


  $('#loginForm').submit(function() {
		$.ajax({
			type: 'POST',
			url: 'validaciones/validar_login.php',
			data: $('#loginForm').serialize(),
			success:  function(data) {
        console.log(data);
				if (data == 'Ok') {
					window.location.href = 'index.php';
				} else {
					new PNotify({
              title: 'Error',
              text: 'Usuario o contraseña incorrectas',
              type: 'error',
              hide: true,
              addclass: 'pnotify-center',
              styling: 'bootstrap3'
          });

					$('#loginForm')[0].reset();
				}
			}
		});
		return false;
	});

</script>

</html>

