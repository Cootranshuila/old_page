$(document).ready(function(){
	$envio = "";
	$tipoPagareTaquillero = "";
	$tipoPagareSatellite = "";
	// $('.hide').hide();
	// se ocultan los pasos del formulario
	$('#paso2, #paso3, #paso4, #datosConductor, #datosConsignatarios, #tipoConsignatarioSatellite, #tipoConsignatarioTaquillero, #textPagare').hide();
	// $('#paso1, #datosConductor, #tipoConsignatarioSatellite, #tipoConsignatarioTaquillero').hide();
	$('#empleado1, #independiente1, #empleado2, #independiente2, .btnEnd, .viewEstadoPostulado, .viewEstadoEntrevista').hide();

	$('#requisitoConductor, #requisitoConsignatario, #requisitoTaquillero, #requisitoSatellite, #requisitoAuxiliar').hide();
	$('#miModal').modal('show');

	$('.formulario').on('click', '#btnSerEst', function(){
		$idEst = $('#estadoId').val();
		if ($idEst.length > 6) {
			$.ajax({
				url: 'serachEstado.php',
				type: 'GET',
				// dataType: 'json',
				data: {id: $idEst},
			})
			.done(function(res) {
				// console.log(res);
				if (res == 'Postulado') {
					$('#estPos').html('Se encuentra en proceso');
					$('.viewEstadoPostulado').show();
					$('.viewEstadoEntrevista').hide();
				}
				else{
					if (res == 'Rechazado') {
						$('#estPos').html('Su postulacion ha sido rechazada');
						$('.viewEstadoPostulado').show();
						$('.viewEstadoEntrevista').hide();
					}
					else{
						if (res == 'undefined') {
							$('#estPos').html('Usuario no encontrado');
							$('.viewEstadoPostulado').show();
							$('.viewEstadoEntrevista').hide();
						}
						else{
							res = JSON.parse(res);
							$('.viewEstadoPostulado').hide();
							$('#estEnt1').html('Fecha: '+res[0]);
							$('#estEnt2').html('Hora: '+res[1]);
							$('#estEnt3').html('Lugar: '+res[2]);
							$('#estEnt4').html('Observaciones: '+res[3]);
							$('.viewEstadoEntrevista').show();
						}
					}
				}
			});			
		}
		else{
			$('#estadoId').addClass('is-invalid');
		}
	});

	$('#verRequisitos').change(function(event) {
		$val = $('#verRequisitos').val();
		$('#verRequisitos').removeClass('is-invalid');
		if ($val != 'Seleccione') {
			if ($val == 'Conductor') {
				$('#requisitoConductor').slideDown(800);
				$('#requisitoConsignatario').slideUp(800);
				$('#requisitoAuxiliar').slideUp(800);
			}
			if ($val == 'Consignatarios') {
				$('#requisitoConsignatario').slideDown(800);
				$('#requisitoConductor').slideUp(800);
				$('#requisitoAuxiliar').slideUp(800);	
			}
			if ($val == 'auxiliarConductor') {
				$('#requisitoAuxiliar').slideDown(800);
				$('#requisitoConductor').slideUp(800);	
				$('#requisitoConsignatario').slideUp(800);
			}
		}
		else{
			$('#verRequisitos').addClass('is-invalid');
			$('#requisitoConsignatario').slideUp(800);
			$('#requisitoConductor').slideUp(800);
			$('#requisitoAuxiliar').slideUp(800);
		}
	});

	$('#tipoConsignatarioRequisito').change(function(event) {
		$val = $('#tipoConsignatarioRequisito').val();
		$('#tipoConsignatarioRequisito').removeClass('is-invalid');
		if ($val != 'Seleccione') {
			if ($val == 'taquilleros') {
				$('#requisitoTaquillero').slideDown(800);
				$('#requisitoSatellite').slideUp(800);
			}
			if ($val == 'satellite') {
				$('#requisitoSatellite').slideDown(800);
				$('#requisitoTaquillero').slideUp(800);					
			}
		}
		else{
			$('#tipoConsignatarioRequisito').addClass('is-invalid');
			$('#requisitoSatellite').slideUp(800);
			$('#requisitoTaquillero').slideUp(800);	
		}
	});

	// 
	// cuando se da click en el boton next del paso 1
	// 
	$('.formulario').on('click', '#next1', function(){
		// se extrae los valores de los campos obligatorios para validarlos
		$nombres               = $('#nombres').val();
		$apellidos             = $('#apellidos').val();
		$tipo_identificacion   = $('#tipo_identificacion').val();
		$numero_identificacion = $('#numero_identifiacacion').val();
		$email                 = $('#email').val();
		$nacimiento            = $('#nacimiento').val();
		$genero                = $('#genero').val();
		$estado_civil          = $('#estado_civil').val();
		$celular               = $('#celular').val();
		$departamento          = $('#departamento').val();
		$ciudad                = $('#ciudad').val();
		$direccion             = $('#direccion').val();
		$fotoPostulado         = $('#fotoPostulado').val();
		$cargo                 = $('#cargo').val();

		// valiable para saber si los datos cumplen la validacion
		$contPaso1 = 0;

		// se quita la clase que da color rojo en los inputs
		$('.inputs').removeClass('is-invalid');

		$fn = $nacimiento.split(['/'])[2];
		$('.hide').css('display', 'none');

		// se inician las validaciones de los campos
		if ($nacimiento.length == 10 && $fn != undefined) { 
			// $('#nombres').addClass('is-invalid'); 
			$contPaso1++;
		}else{ $('#spanfecha1').css('display', 'block'); $('#nacimiento').addClass('is-invalid'); }


		if ($nombres.length < 3) { 
			$('#nombres').addClass('is-invalid'); 
			$('#spanNombre').css('display', 'block');
		}else{ $contPaso1++ }
		if ($apellidos.length < 3) { 
			$('#apellidos').addClass('is-invalid');
			$('#spanApellido').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ($tipo_identificacion == 'Seleccione') { 
			$('#tipo_identificacion').addClass('is-invalid'); 
			$('#spanTipoIde').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ($numero_identificacion.length < 7) { 
			$('#numero_identifiacacion').addClass('is-invalid'); 
			$('#spanIde').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ($email.length < 8) {
			$('#email').addClass('is-invalid'); 
			$('#spanEmail1').css('display', 'block'); 
		}else{ $contPaso1++ }
		if (($fn <= 1900) || ($fn >= 2002)) { 
			$('#nacimiento').addClass('is-invalid'); 
			$('#spanfecha2').css('display', 'block');
		}else{ $contPaso1++ }
		if ($genero == 'Genero') { 
			$('#genero').addClass('is-invalid'); 
			$('#spanGen').css('display', 'block');
		}else{ $contPaso1++ }
		if ($estado_civil == 'Estado civil') { 
			$('#estado_civil').addClass('is-invalid');
			$('#spanEst').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ($celular.length <= 9 || $celular.length >= 11 ) { 
			$('#celular').addClass('is-invalid'); 
			$('#spanCel').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ($departamento == 'Departamento') { 
			$('#departamento').addClass('is-invalid'); 
			$('#spanDep').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ($ciudad == 'Ciudad') { 
			$('#ciudad').addClass('is-invalid'); 
			$('#spanCiu').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ($direccion.length < 8) {
			$('#direccion').addClass('is-invalid'); 
			$('#spanDir').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ($cargo == 'Seleccione') { 
			$('#cargo').addClass('is-invalid'); 
			$('#spanCar').css('display', 'block'); 
		}else{ $contPaso1++ }
		if ( /\S+@\S+\.\S+/.test($email) == false ) { 
			$('#email').addClass('is-invalid'); 
			$('#spanEmail2').css('display', 'block'); 
		}else{ $contPaso1++ }



		if ($fotoPostulado != '') {
			$formato1 = $fotoPostulado.split('.');
			$formato1 = $formato1.length - 1;
			$fotoPostulado = $fotoPostulado.split('.')[$formato1];
			$fotoPostulado = $fotoPostulado.toLowerCase();
			if ($fotoPostulado == 'png' || $fotoPostulado == 'jpg' || $fotoPostulado == 'jpeg') {
				var fileSize = $('#fotoPostulado')[0].files[0].size;
			    var siezekiloByte = parseInt(fileSize / 1024);
			    var inp = $('#fotoPostulado').attr('size');
			    if (siezekiloByte >  $('#fotoPostulado').attr('size')) {
			        $('#fotoPostulado').addClass('is-invalid'); 
					$('#spanFot3').css('display', 'block');
			    }
			    else{
					$contPaso1++;
				}
			}
			else{
				$('#fotoPostulado').addClass('is-invalid'); 
				$('#spanFot2').css('display', 'block');
			}
		}
		else{
			$('#fotoPostulado').addClass('is-invalid'); 
			$('#spanFot1').css('display', 'block');
		}
		


		// se entra si todas las validaciones son correctas
		if ( $contPaso1 == 16 ) {
			// se oculta el paso 1 y se muestra el paso 2
			$('#paso1').slideUp(1000);
			$('#paso2').slideDown(1000);
			$('#step_1').removeClass('step-select');
			$('#step_2').addClass('step-select');

			if ($cargo == 'Conductor') {
				$('.btnEnd').show();
				$('#datosConductor').show(800);
				$('#datosConsignatarios').hide();
				$('#datosAuxiliar').hide();
				$envio = "conductor";
			}

			if ($cargo == 'Consignatarios') {
				$('.btnEnd').show();
				$('#datosConsignatarios').show(800);
				$('#datosConductor').hide();
				$('#datosAuxiliar').hide();
			}

			if ($cargo == 'auxiliarConductor') {
				$('.btnEnd').show();
				$('#datosAuxiliar').show(800);
				$('#datosConductor').hide();
				$('#datosConsignatarios').hide();
				$envio = "auxiliar";
			}
		}
	});

	// 
	// cuando se da click en el boton next del paso 1
	// 
	$('.formulario').on('click', '#next2', function(){
		// se extrae los valores de los campos obligatorios para validarlos
		// $educacion    = $('input:radio[name=educacion]:checked').val();
		// $titulo       = $('#titulo').val();
		// $fechaTit     = $('#fechaTit').val();
		// $modalidadEdu = $('#modalidadEdu').val();
		// $semestresEdu = $('#semestresEdu').val();
		// $graduadoEdu  = $('#graduadoEdu').val();
		// $nombreTit    = $('#nombreTit').val();
		// $FechaTerEdu  = $('#FechaTerEdu').val();
		// $numeroTar    = $('#numeroTar').val();

		// // valiable para saber si los datos cumplen la validacion
		// $contPaso2 = 0;

		// // se quita la clase que da color rojo en los inputs
		// $('.invalid2').removeClass('is-invalid');


		// $fn1 = $fechaTit.split(['/'])[2];
		// $fn2 = $FechaTerEdu.split(['/'])[2];
		// $('.hideEdu').css('display', 'none');

		// // se inician las validaciones de los campos
		// if ($fechaTit.length == 10 && $fn1 != undefined) { 
		// 	// $('#nombres').addClass('is-invalid'); 
		// 	$contPaso2++;
		// }else{ $('#spanFechaTit').css('display', 'block'); $('#fechaTit').addClass('is-invalid'); }

		// if ($FechaTerEdu.length == 10 && $fn2 != undefined) { 
		// 	// $('#nombres').addClass('is-invalid'); 
		// 	$contPaso2++;
		// }else{ $('#spanFechTer').css('display', 'block'); $('#FechaTerEdu').addClass('is-invalid'); }


		// if ($educacion == undefined) { 
		// 	$('.radioEdu').addClass('is-invalid'); 
		// 	$('#spanRad').css('display', 'block');
		// }else{ $contPaso2++ }

		// if ($titulo.length < 3) { 
		// 	$('#titulo').addClass('is-invalid');
		// 	$('#spanTit').css('display', 'block'); 
		// }else{ $contPaso2++ }

		// if (($fn1 <= 1950) || ($fn1 >= 2021)) { 
		// 	$('#fechaTit').addClass('is-invalid'); 
		// 	$('#spanFechaTit2').css('display', 'block');
		// }else{ $contPaso2++ }

		// if ($modalidadEdu == 'Seleccione') { 
		// 	$('#modalidadEdu').addClass('is-invalid');
		// 	$('#spanMod').css('display', 'block'); 
		// }else{ $contPaso2++ }

		// if ($semestresEdu == '') { 
		// 	$('#semestresEdu').addClass('is-invalid');
		// 	$('#spanSem1').css('display', 'block'); 
		// }else{ $contPaso2++ }

		// if ($semestresEdu > 12 || semestresEdu <= 0) { 
		// 	$('#semestresEdu').addClass('is-invalid');
		// 	$('#spanSem2').css('display', 'block'); 
		// }else{ $contPaso2++ }

		// if ($graduadoEdu == 'Seleccione') { 
		// 	$('#graduadoEdu').addClass('is-invalid');
		// 	$('#spanGra').css('display', 'block'); 
		// }else{ $contPaso2++ }

		// if ($nombreTit.length < 3) { 
		// 	$('#nombreTit').addClass('is-invalid');
		// 	$('#spanNomTit').css('display', 'block'); 
		// }else{ $contPaso2++ }

		// if (($fn2 <= 1950) || ($fn2 >= 2020)) { 
		// 	$('#FechaTerEdu').addClass('is-invalid'); 
		// 	$('#spanFechTer2').css('display', 'block');
		// }else{ $contPaso2++ }

		// // if ($numeroTar.length < 3) { 
		// // 	$('#numeroTar').addClass('is-invalid');
		// // 	$('#spanNumTar').css('display', 'block'); 
		// // }else{ $contPaso2++ }



		// // se entra si todas las validaciones son correctas
		// if ( $contPaso2 == 11 ) {
			// se oculta el paso 1 y se muestra el paso 2
			$('#paso2').slideUp(1000);
			$('#paso3').slideDown(1000);
			$('#step_2').removeClass('step-select');
			$('#step_3').addClass('step-select');
		// }
	});

	// 
	// cuando se da click en el boton next del paso 1
	// 
	$('.formulario').on('click', '#next3', function(){
		// se extrae los valores de los campos obligatorios para validarlos
		// $empresa       = $('#empresa').val();
		// $tipoEmpresa   = $('#tipoEmpresa').val();
		// $paisEmpre     = $('#paisEmpre').val();
		// $depEmpre      = $('#depEmpre').val();
		// $munEmpre      = $('#munEmpre').val();
		// $correoEmpre   = $('#correoEmpre').val();
		// $telEmpre      = $('#telEmpre').val();
		// $fechaIngEmpre = $('#fechaIngEmpre').val();
		// $fechaRetEmpre = $('#fechaRetEmpre').val();
		// $carEmpre      = $('#carEmpre').val();
		// $dirEmpre      = $('#dirEmpre').val();

		// // valiable para saber si los datos cumplen la validacion
		$contPaso3 = 0;

		// // se quita la clase que da color rojo en los inputs
		// $('.invalid3').removeClass('is-invalid');

		// $fn1 = $fechaIngEmpre.split(['/'])[2];
		// $fn2 = $fechaRetEmpre.split(['/'])[2];
		// $('.hideExp').css('display', 'none');

		// // se inician las validaciones de los campos
		// if ($fechaIngEmpre.length == 10 && $fn1 != undefined) { 
		// 	// $('#nombres').addClass('is-invalid'); 
		// 	$contPaso3++;
		// }else{ $('#spanFechaIngEmpre1').css('display', 'block'); $('#fechaIngEmpre').addClass('is-invalid'); }

		// if ($fechaRetEmpre.length == 10 && $fn2 != undefined) { 
		// 	// $('#nombres').addClass('is-invalid'); 
		// 	$contPaso3++;
		// }else{ $('#spanFechaTerEmpre1').css('display', 'block'); $('#fechaRetEmpre').addClass('is-invalid');  }


		// if ($empresa.length < 3) { 
		// 	$('#empresa').addClass('is-invalid');
		// 	$('#spanEmpre').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if ($tipoEmpresa == 'Seleccione') { 
		// 	$('#tipoEmpresa').addClass('is-invalid');
		// 	$('#spanTipoEmp').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if ($paisEmpre.length < 3) { 
		// 	$('#paisEmpre').addClass('is-invalid');
		// 	$('#spanPaisEmpre').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if ($depEmpre.length < 3) { 
		// 	$('#depEmpre').addClass('is-invalid');
		// 	$('#spanDepEmpre').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if ($munEmpre.length < 3) { 
		// 	$('#munEmpre').addClass('is-invalid');
		// 	$('#spanMunEmpre').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if ($correoEmpre.length < 8) {
		// 	$('#correoEmpre').addClass('is-invalid'); 
		// 	$('#spanCorEmpre1').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if ( /\S+@\S+\.\S+/.test($correoEmpre) == false ) { 
		// 	$('#correoEmpre').addClass('is-invalid'); 
		// 	$('#spanCorEmpre2').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if ($telEmpre.length < 5) {
		// 	$('#telEmpre').addClass('is-invalid'); 
		// 	$('#spanTelEmpre').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if (($fn1 <= 1980) || ($fn1 >= 2021)) { 
		// 	$('#fechaIngEmpre').addClass('is-invalid'); 
		// 	$('#spanFechaIngEmpre2').css('display', 'block');
		// }else{ $contPaso3++ }

		// if (($fn2 <= 1980) || ($fn2 >= 2021)) { 
		// 	$('#fechaRetEmpre').addClass('is-invalid'); 
		// 	$('#spanFechaRetEmpre2').css('display', 'block');
		// }else{ $contPaso3++ }

		// if ($carEmpre.length < 3) { 
		// 	$('#carEmpre').addClass('is-invalid');
		// 	$('#spanCarEmpre').css('display', 'block'); 
		// }else{ $contPaso3++ }

		// if ($dirEmpre.length < 3) { 
		// 	$('#dirEmpre').addClass('is-invalid');
		// 	$('#spanDirEmpre').css('display', 'block'); 
		// }else{ $contPaso3++ }

		for(var i = 1; i <= 7; i++){
			$value1 = 'refFam' + i;
			$value = $('#' + $value1).val();
			if (i == 1 || i == 4) {
				if( $value.length < 4 ) {
					$('#' + $value1).addClass('is-invalid');
					$('#spanRefFam' + i).css('display', 'block'); 
				}
				else{ $contPaso3++ }
			}
			if (i == 2 || i == 5) {
				if( $value.length < 7 ) {
					$('#' + $value1).addClass('is-invalid');
					$('#spanRefFam' + i).css('display', 'block'); 
				}
				else{ $contPaso3++ }
			}
			if (i == 3 || i == 6) {
				if( $value.length != 10 ) {
					$('#' + $value1).addClass('is-invalid');
					$('#spanRefFam' + i).css('display', 'block'); 
				}
				else{ $contPaso3++ }
			}
		}

		for(var i = 1; i <= 7; i++){
			$value1 = 'refLab' + i;
			$value = $('#' + $value1).val();
			if (i == 1 || i == 4) {
				if( $value.length < 4 ) {
					$('#' + $value1).addClass('is-invalid');
					$('#spanRefLab' + i).css('display', 'block'); 
				}
				else{ $contPaso3++ }
			}
			if (i == 2 || i == 5) {
				if( $value.length < 7 ) {
					$('#' + $value1).addClass('is-invalid');
					$('#spanRefLab' + i).css('display', 'block'); 
				}
				else{ $contPaso3++ }
			}
			if (i == 3 || i == 6) {
				if( $value.length != 10 ) {
					$('#' + $value1).addClass('is-invalid');
					$('#spanRefLab' + i).css('display', 'block'); 
				}
				else{ $contPaso3++ }
			}
		}


		// se entra si todas las validaciones son correctas
		if ( $contPaso3 == 12 ) {
			// se oculta el paso 1 y se muestra el paso 2
			$('#paso3').slideUp(1000);
			$('#paso4').slideDown(1000);
			$('.btnEnd').show();
			$('#step_3').removeClass('step-select');
			$('#step_4').addClass('step-select');
			if ($genero == 'Femenino') {
				$('.divLibreta').hide();
			}
			else{
				$('.divLibreta').show();	
			}
		}
	});

	// si se da click en el boton de regresar en el paso 2
	$('.formulario').on('click', '#back1', function(){
		// se oculta el paso 2 y se muestra el paso 1
		$('#paso1').slideDown(1000);
		$('#paso2').slideUp(1000);
		$('#step_2').removeClass('step-select');
		$('#step_1').addClass('step-select');
		$('.btnEnd').hide();
	});

	// si se da click en el boton de regresar en el paso 3
	$('.formulario').on('click', '#back2', function(){
		// se oculta el paso 2 y se muestra el paso 1
		$('#paso2').slideDown(1000);
		$('#paso3').slideUp(1000);
		$('#step_3').removeClass('step-select');
		$('#step_2').addClass('step-select');
		$('.btnEnd').hide();
	});

	// si se da click en el boton de regresar en el paso 3
	$('.formulario').on('click', '#back3', function(){
		// se oculta el paso 2 y se muestra el paso 1
		$('#paso3').slideDown(1000);
		$('#paso4').slideUp(1000);
		$('#step_4').removeClass('step-select');
		$('#step_3').addClass('step-select');
		$('.btnEnd').hide();
	});

	$('#tipoConsignatario').change(function(event) {
		$val = $('#tipoConsignatario').val();
		$('#tipoConsignatario').removeClass('is-invalid');
		if ($val != 'Seleccione') {
			if ($val == 'taquilleros') {
				$('#tipoConsignatarioTaquillero').slideDown(800);
				$('#tipoConsignatarioSatellite').slideUp(800);
				$envio = "taquilleros";
			}
			else{
				$('#tipoConsignatarioSatellite').slideDown(800);
				$('#tipoConsignatarioTaquillero').slideUp(800);
				$envio = "satellite";
			}
		}
		else{
			$('#tipoConsignatario').addClass('is-invalid');
			$('#tipoConsignatarioSatellite').slideUp(800);
			$('#tipoConsignatarioTaquillero').slideUp(800);
			$envio = '';
		}
	});

	$('#taquilleroVin').change(function(event) {
		$valTaqVin = $('#taquilleroVin').val();
		if ($valTaqVin == 'No') {
			$('#textPagare').show();
		}
		if ($valTaqVin == 'Si') {
			$('#textPagare').hide();
		}
		if ($valTaqVin == 'Seleccione') {
			$('#textPagare').hide();
		}
	});

	// si se confirma el envio del formulario
	$("#postulado_paso1").on("submit", function(e){
		
	    e.preventDefault();
	    var f = $(this);
	    
	    if ($envio == '') {
	    	$('#tipoConsignatario').addClass('is-invalid');
	    }
	    else{
	    	$('#tipoConsignatario').removeClass('is-invalid');	
	    }

	    if ($envio == "conductor") {
	    	$contConductor = 0;
	    	$('.hideCon').css('display', 'none');
	    	for($i = 1; $i < 19; $i++){
	    		if ($i == 2) {

	    		}
	    		else{
	    			if ($genero == 'Femenino' && $i == 10) {

	    			}
	    			else{
			    		$foto = 'foto'+$i+'Conductor';
			    		$foto = $('#foto'+ $i +'Conductor').val();
						if ($foto != '') {
							$formato = 'formatoFoto'+$i;
							$formato = $foto.split('.');
							$formato = $formato.length - 1;
							$foto = $foto.split('.')[$formato];
							$foto = $foto.toLowerCase();
							if ($foto == 'png' || $foto == 'jpg' || $foto == 'jpeg') {
								var fileSize = $('#foto'+$i+'Conductor')[0].files[0].size;
							    var siezekiloByte = parseInt(fileSize / 1024);
							    var inp = $('#foto'+$i+'Conductor').attr('size');
							    if (siezekiloByte >  $('#foto'+$i+'Conductor').attr('size')) {
							        $('#foto'+$i+'Conductor').addClass('is-invalid');
									$('span.foto'+$i+'Conductor3').css('display', 'block');
							    }
							    else{
									$contConductor++;
									$('#foto'+$i+'Conductor').removeClass('is-invalid');
								}
							}
							else{
								$('#foto'+$i+'Conductor').addClass('is-invalid');
								$('span.foto'+$i+'Conductor2').css('display', 'block');
							}
						}
						else{
							$('#foto'+$i+'Conductor').addClass('is-invalid');
							$('span.foto'+$i+'Conductor1').css('display', 'block');
						}
					}
				}
	    	}

	    	for($i = 1; $i < 2; $i++){
	    		$pdf = 'pdf'+$i+'Conductor';
	    		$pdf = $('#pdf'+ $i +'Conductor').val();
				if ($pdf != '') {
					$formato = 'formatoPdf'+$i;
					$formato = $pdf.split('.');
					$formato = $formato.length - 1;
					$pdf = $pdf.split('.')[$formato];
					$pdf = $pdf.toLowerCase();
					if ($pdf == 'pdf') {
						var fileSize = $('#pdf'+$i+'Conductor')[0].files[0].size;
					    var siezekiloByte = parseInt(fileSize / 1024);
					    var inp = $('#pdf'+$i+'Conductor').attr('size');
					    if (siezekiloByte >  $('#pdf'+$i+'Conductor').attr('size')) {
					        $('#pdf'+$i+'Conductor').addClass('is-invalid');
							$('span.pdf'+$i+'Conductor3').css('display', 'block');
					    }
					    else{
							$contConductor++;
							$('#pdf'+$i+'Conductor').removeClass('is-invalid');
						}
					}
					else{
						$('#pdf'+$i+'Conductor').addClass('is-invalid');
						$('span.pdf'+$i+'Conductor2').css('display', 'block');
					}
				}
				else{
					$('#pdf'+$i+'Conductor').addClass('is-invalid');
					$('span.pdf'+$i+'Conductor1').css('display', 'block');
				}
	    	}

	    	if ($contConductor == 18 && $genero == 'Masculino' || $contConductor == 17 && $genero == 'Femenino') {
	    		var formDataConductor = new FormData(document.getElementById("postulado_paso1"));
	    		
	    		formDataConductor.append('cargo', 'Conductor');
	    		

	    		if ($terminos == 'si') {
	    			$('.finish').html('cargando <span class="fa fa-sync fa-spin"></span>');
			    	$('.finish').prop('disabled', 'disabled');
					$.ajax({
					    url: "guardar_postulado.php",
					    type: "post",
					    dataType: "html",
					    data: formDataConductor,
					    cache: false,
					    contentType: false,
					    processData: false
					})
				    .done(function(res){
				    	console.log(res);
				    	if (res == 'esta en proceso') {
				    		alert("ya se encuentra en proceso");
				    		$('.finish').html('Enviar <span class="ti-save"></span>');
						    $('.finish').removeAttr('disabled');
				    	}
				    	if (res == 'registro guardado') {
				    		window.location.replace('formulario_postulado.php?g=s');
				    	}
				    });
				}
	    	}
	    }

	    if ( $envio == 'taquilleros' ) {
	    	$('#taquilleroVin').removeClass('is-invalid');
	    	$contTaquilleros = 0;
	    	$('.hideTaq').css('display', 'none');

	    	$taquilleroVin = $('#taquilleroVin').val();
	    	if ($taquilleroVin == 'Seleccione') {
	    		$('#taquilleroVin').addClass('is-invalid');
	    		$('.taquilleroVin').css('display', 'block');
	    	}else{ $contTaquilleros++ }

	    	$('.hideTaq').css('display', 'none');
	    	for($i = 1; $i < 10; $i++){
	    		if ($genero == 'Femenino' && $i == 7) {

	    		}
	    		else{
		    		$foto = 'foto'+$i+'Taquillero';
		    		$foto = $('#foto'+ $i +'Taquillero').val();
					if ($foto != '') {
						$formato = 'formatoFoto'+$i;
						$formato = $foto.split('.');
						$formato = $formato.length - 1;
						$foto = $foto.split('.')[$formato];
						$foto = $foto.toLowerCase();
						if ($foto == 'png' || $foto == 'jpg' || $foto == 'jpeg') {
							var fileSize = $('#foto'+$i+'Taquillero')[0].files[0].size;
						    var siezekiloByte = parseInt(fileSize / 1024);
						    var inp = $('#foto'+$i+'Taquillero').attr('size');
						    if (siezekiloByte >  $('#foto'+$i+'Taquillero').attr('size')) {
						        $('#foto'+$i+'Taquillero').addClass('is-invalid');
								$('span.foto'+$i+'Taquillero3').css('display', 'block');
						    }
						    else{
						    	if ($i == 4 || $i == 5) {

						    	}else{
									$contTaquilleros++;
									$('#foto'+$i+'Taquillero').removeClass('is-invalid');
								}
							}
						}
						else{
							$('#foto'+$i+'Taquillero').addClass('is-invalid');
							$('span.foto'+$i+'Taquillero2').css('display', 'block');
						}
					}
					else{
						if ($i == 4 || $i == 5) {

						}
						else{
							$('#foto'+$i+'Taquillero').addClass('is-invalid');
							$('span.foto'+$i+'Taquillero1').css('display', 'block');
						}
					}
				}
	    	}

	    	for($i = 1; $i < 2; $i++){
	    		$pdf = 'pdf'+$i+'Taquillero';
	    		$pdf = $('#pdf'+ $i +'Taquillero').val();
				if ($pdf != '') {
					$formato = 'formatoPdf'+$i;
					$formato = $pdf.split('.');
					$formato = $formato.length - 1;
					$pdf = $pdf.split('.')[$formato];
					$pdf = $pdf.toLowerCase();
					if ($pdf == 'pdf') {
						var fileSize = $('#pdf'+$i+'Taquillero')[0].files[0].size;
					    var siezekiloByte = parseInt(fileSize / 1024);
					    var inp = $('#pdf'+$i+'Taquillero').attr('size');
					    if (siezekiloByte >  $('#pdf'+$i+'Taquillero').attr('size')) {
					        $('#pdf'+$i+'Taquillero').addClass('is-invalid');
							$('span.pdf'+$i+'Taquillero3').css('display', 'block');
					    }
					    else{
							$contTaquilleros++;
							$('#pdf'+$i+'Taquillero').removeClass('is-invalid');
						}
					}
					else{
						$('#pdf'+$i+'Taquillero').addClass('is-invalid');
						$('span.pdf'+$i+'Taquillero2').css('display', 'block');
					}
				}
				else{
					$('#pdf'+$i+'Taquillero').addClass('is-invalid');
					$('span.pdf'+$i+'Taquillero1').css('display', 'block');
				}
	    	}
			

			if ( $contTaquilleros == 9 && $genero == 'Masculino' || $contTaquilleros == 8 && $genero == 'Femenino') {
				var formDataTaquillero = new FormData(document.getElementById("postulado_paso1"));
				
	    		formDataTaquillero.append('cargo', 'Taquillero');

	    		if ($terminos == 'si') {
	    			$('.finish').html('cargando <span class="fa fa-sync fa-spin"></span>');
	    			$('.finish').prop('disabled', 'disabled');
	    			$('#tipoConsignatario').prop('disabled', 'disabled');
					$.ajax({
					    url: "guardar_postulado.php",
					    type: "post",
					    dataType: "html",
					    data: formDataTaquillero,
					    cache: false,
					    contentType: false,
					    processData: false
					})
				    .done(function(res){
				    	console.log(res);
				    	if (res == 'esta en proceso') {
				    		alert("ya se encuentra en proceso");
				    		$('.finish').html('Enviar <span class="ti-save"></span>');
				    		$('.finish').removeAttr('disabled');
				    		$('#tipoConsignatario').removeAttr('disabled');
				    	}
				    	if (res == 'registro guardado') {
				    		window.location.replace('formulario_postulado.php?g=s');
				    	}
				    	if (res == 'Error al guardar') {
				    		window.location.replace('formulario_postulado.php?g=n');	
				    	}
				    });
				}
			}
	    }

	    if ( $envio == 'satellite' ) {
	    	$contSatellite = 0;
	    	$('.hideSat').css('display', 'none');

			for($i = 1; $i < 3; $i++){
				if ($genero == 'Femenino' && $i == 2) {

				}
				else{
		    		$foto = 'foto'+$i+'Satellite';
		    		$foto = $('#foto'+ $i +'Satellite').val();
					if ($foto != '') {
						$formato = 'formatoFoto'+$i;
						$formato = $foto.split('.');
						$formato = $formato.length - 1;
						$foto = $foto.split('.')[$formato];
						$foto = $foto.toLowerCase();
						if ($foto == 'png' || $foto == 'jpg' || $foto == 'jpeg') {
							var fileSize = $('#foto'+$i+'Satellite')[0].files[0].size;
						    var siezekiloByte = parseInt(fileSize / 1024);
						    var inp = $('#foto'+$i+'Satellite').attr('size');
						    if (siezekiloByte >  $('#foto'+$i+'Satellite').attr('size')) {
						        $('#foto'+$i+'Satellite').addClass('is-invalid');
								$('span.foto'+$i+'Satellite3').css('display', 'block');
						    }
						    else{
								if ($i == 6 || $i == 7) {

						    	}else{
									$contSatellite++;
									$('#foto'+$i+'Satellite').removeClass('is-invalid');
								}
							}
						}
						else{
							$('#foto'+$i+'Satellite').addClass('is-invalid');
							$('span.foto'+$i+'Satellite2').css('display', 'block');
						}
					}
					else{
						if ($i == 6 || $i == 7) {

						}else{
							$('#foto'+$i+'Satellite').addClass('is-invalid');
							$('span.foto'+$i+'Satellite1').css('display', 'block');
						}
					}
				}
	    	}

	   //  	for($i = 1; $i < 2; $i++){
	   //  		$pdf = 'pdf'+$i+'Satellite';
	   //  		$pdf = $('#pdf'+ $i +'Satellite').val();
				// if ($pdf != '') {
				// 	$formato = 'formatoPdf'+$i;
				// 	$formato = $pdf.split('.');
				// 	$formato = $formato.length - 1;
				// 	$pdf = $pdf.split('.')[$formato];
				// 	$pdf = $pdf.toLowerCase();
				// 	if ($pdf == 'pdf') {
				// 		var fileSize = $('#pdf'+$i+'Satellite')[0].files[0].size;
				// 	    var siezekiloByte = parseInt(fileSize / 1024);
				// 	    var inp = $('#pdf'+$i+'Satellite').attr('size');
				// 	    if (siezekiloByte >  $('#pdf'+$i+'Satellite').attr('size')) {
				// 	        $('#pdf'+$i+'Satellite').addClass('is-invalid');
				// 			$('span.pdf'+$i+'Satellite3').css('display', 'block');
				// 	    }
				// 	    else{
				// 			$contSatellite++;
				// 			$('#pdf'+$i+'Satellite').removeClass('is-invalid');
				// 		}
				// 	}
				// 	else{
				// 		$('#pdf'+$i+'Satellite').addClass('is-invalid');
				// 		$('span.pdf'+$i+'Satellite2').css('display', 'block');
				// 	}
				// }
				// else{
				// 	$('#pdf'+$i+'Satellite').addClass('is-invalid');
				// 	$('span.pdf'+$i+'Satellite1').css('display', 'block');
				// }
	   //  	}

	   		console.log($contSatellite)

			if ( $contSatellite == 2 && $genero == 'Masculino' || $contSatellite == 1 && $genero == 'Femenino') {
				var formDataSatellite = new FormData(document.getElementById("postulado_paso1"));
		
	    		formDataSatellite.append('cargo', 'Satellite');

	    		if ($terminos == 'si') {
	    			$('.finish').html('cargando <span class="fa fa-sync fa-spin"></span>');
	    			$('.finish').prop('disabled', 'disabled');
	    			$('#tipoConsignatario').prop('disabled', 'disabled');
					$.ajax({
					    url: "guardar_postulado.php",
					    type: "post",
					    dataType: "html",
					    data: formDataSatellite,
					    cache: false,
					    contentType: false,
					    processData: false
					})
				    .done(function(res){
				    	console.log(res);
				    	if (res == 'esta en proceso') {
				    		alert("ya se encuentra en proceso");
				    		$('.finish').html('Enviar <span class="ti-save"></span>');
				    		$('.finish').removeAttr('disabled');
				    		$('#tipoConsignatario').removeAttr('disabled');
				    	}
				    	if (res == 'registro guardado') {
				    		window.location.replace('formulario_postulado.php?g=s');
				    	}
				    	if (res == 'Error al guardar') {
				    		window.location.replace('formulario_postulado.php?g=n');	
				    	}
				    });
				}
			}
	    }

	    if ( $envio == 'auxiliar' ) {
	    	$contAuxiliar = 0;
	    	$('.hideAux').css('display', 'none');
	    	for($i = 1; $i < 15; $i++){
	    		if ($i == 2 || $i == 7 || $i == 9 || $i == 11 || $i == 14) {

	    		}
	    		else{
	    			if ($genero == 'Femenino' && $i == 10) {

	    			}
	    			else{
			    		$foto = 'foto'+$i+'Auxiliar';
			    		$foto = $('#foto'+ $i +'Auxiliar').val();
						if ($foto != '') {
							$formato = 'formatoFoto'+$i;
							$formato = $foto.split('.');
							$formato = $formato.length - 1;
							$foto = $foto.split('.')[$formato];
							$foto = $foto.toLowerCase();
							if ($foto == 'png' || $foto == 'jpg' || $foto == 'jpeg') {
								var fileSize = $('#foto'+$i+'Auxiliar')[0].files[0].size;
							    var siezekiloByte = parseInt(fileSize / 1024);
							    var inp = $('#foto'+$i+'Auxiliar').attr('size');
							    if (siezekiloByte >  $('#foto'+$i+'Auxiliar').attr('size')) {
							        $('#foto'+$i+'Auxiliar').addClass('is-invalid');
									$('span.foto'+$i+'Auxiliar3').css('display', 'block');
							    }
							    else{
									$contAuxiliar++;
									$('#foto'+$i+'Auxiliar').removeClass('is-invalid');
								}
							}
							else{
								$('#foto'+$i+'Auxiliar').addClass('is-invalid');
								$('span.foto'+$i+'Auxiliar2').css('display', 'block');
							}
						}
						else{
							$('#foto'+$i+'Auxiliar').addClass('is-invalid');
							$('span.foto'+$i+'Auxiliar1').css('display', 'block');
						}
					}
				}
	    	}

	    	for($i = 1; $i < 2; $i++){
	    		$pdf = 'pdf'+$i+'Auxiliar';
	    		$pdf = $('#pdf'+ $i +'Auxiliar').val();
				if ($pdf != '') {
					$formato = 'formatoPdf'+$i;
					$formato = $pdf.split('.');
					$formato = $formato.length - 1;
					$pdf = $pdf.split('.')[$formato];
					$pdf = $pdf.toLowerCase();
					if ($pdf == 'pdf') {
						var fileSize = $('#pdf'+$i+'Auxiliar')[0].files[0].size;
					    var siezekiloByte = parseInt(fileSize / 1024);
					    var inp = $('#pdf'+$i+'Auxiliar').attr('size');
					    if (siezekiloByte >  $('#pdf'+$i+'Auxiliar').attr('size')) {
					        $('#pdf'+$i+'Auxiliar').addClass('is-invalid');
							$('span.pdf'+$i+'Auxiliar3').css('display', 'block');
					    }
					    else{
							$contAuxiliar++;
							$('#pdf'+$i+'Auxiliar').removeClass('is-invalid');
						}
					}
					else{
						$('#pdf'+$i+'Auxiliar').addClass('is-invalid');
						$('span.pdf'+$i+'Auxiliar2').css('display', 'block');
					}
				}
				else{
					$('#pdf'+$i+'Auxiliar').addClass('is-invalid');
					$('span.pdf'+$i+'Auxiliar1').css('display', 'block');
				}
	    	}

	    	if ($contAuxiliar == 10 && $genero == 'Masculino' || $contAuxiliar == 9 && $genero == 'Femenino') {
	    		var formDataConductor = new FormData(document.getElementById("postulado_paso1"));
	    		
	    		formDataConductor.append('cargo', 'Auxiliar');

	    		if ($terminos == 'si') {
	    			$('.finish').html('cargando <span class="fa fa-sync fa-spin"></span>');
			    	$('.finish').prop('disabled', 'disabled');
					$.ajax({
					    url: "guardar_postulado.php",
					    type: "post",
					    dataType: "html",
					    data: formDataConductor,
					    cache: false,
					    contentType: false,
					    processData: false
					})
				    .done(function(res){
				    	console.log(res);
				    	if (res == 'esta en proceso') {
				    		alert("ya se encuentra en proceso");
				    		$('.finish').html('Enviar <span class="ti-save"></span>');
						    $('.finish').removeAttr('disabled');
				    	}
				    	if (res == 'registro guardado') {
				    		window.location.replace('formulario_postulado.php?g=s');
				    	}
				    });
				}
	    	}
	    }
	});

});

function preg(){
	var preg = 'Si da clic en el boton aceptar confirma el manejo';
	preg += ' de su informacion que sera vista por demas persona para el';
	preg += ' respectivo proceso. Nota: Si es llamado para continuar en el proceso';
	preg += ' debera presentarse con los soportes de formacion y experiencia laboral';
	var pregunta = confirm(preg);
	if (pregunta) {
		$terminos = 'si';
	}
	else{
		$terminos = 'no';
	}
	return pregunta;
}