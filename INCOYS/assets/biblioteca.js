// libreria para buscar campos en la tabla
(function(document) {
  'use strict';
  var LightTableFilter = (function(Arr) {

    var _input;

    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }

    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
      init: function() {
        var inputs = document.getElementsByClassName('light-table-filter');
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);

  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });

})(document);
// acciones y eventos de botones
$(document).ready(function(){  

	$(".register-books").click(function() { 
		var titulo = $("#titulo").val(); 
		var descp  = $("#descp").val(); 
		var autor  = $("#autor").val(); 
		var isbn   = $("#isbn").val(); 
		var portada= $("#portada").val(); 
		var editorial = $("#editorial").val(); 
		var fecha_lac = $("#fecha_lac").val(); 
		var categoria = $("#categoria").val(); 
		var parametros = {
				"titulo" : titulo,
				"descp" : descp,
				"autor" : autor,
				"isbn" : isbn,
				"portada" : portada,
				"editorial" : editorial,
				"fecha_lac": fecha_lac,
				"categoria": categoria,
				"submit_libr": true
				};
		$.ajax({ data:  parametros, url:   'registrarLibro',type:  'post',
		beforeSend: function () {$("#reslibro").html("Enviando, espere por favor...");},
		success:  function (response) {$("#reslibro").html(response); }
		});
	});	
	
	$(".register-book").click(function() { 
		alert('Hola mundo');
	});
	
	$(".eliminar").click(function() {
		var code = $(this).val(); 
		var parametros = { "code" : code, "submit_libr": true };
		$.ajax({ data:  parametros, url:  'eliminarLibro',type:  'post',
		beforeSend: function () {$("#respuestalibro").html("<div class='alert alert-info'>Enviando, espere por favor...</div>");},
		success:  function (response) {$("#respuestalibro").html(response); }
		});
		
	});	
	
	$(".update-libro").click(function() { 
		
		//alert('Hola actualizador ');	
		
		var idlibro = $("#libro").val(); 
		var titulo = $("#titulo").val(); 
		var descp  = $("#descp").val(); 
		var autor  = $("#autor").val(); 
		var isbn   = $("#isbn").val(); 
		var portada= $("#portada").val(); 
		var editorial = $("#editorial").val(); 
		var fecha_lac = $("#fecha_lac").val(); 
		var categoria = $("#categoria").val(); 
		var parametros = {
				"id_libro" : idlibro,
				"titulo" : titulo,
				"descp" : descp,
				"autor" : autor,
				"isbn" : isbn,
				"portada" : portada,
				"editorial" : editorial,
				"fecha_lac": fecha_lac,
				"categoria": categoria,
				"submit_libr": true
				};
		$.ajax({ data:  parametros, url: 'actualizarLibro',type:  'post',
		beforeSend: function () {$("#reslibro").html("Enviando, espere por favor...");},
		success:  function (response) {$("#reslibro").html(response); }
		});
	});	
		
	$(".editar").click(function() { 
		$(location).attr('href','edit-libro.jsp?code='+$(this).val());
	});
	
	$(".register-lector").click(function(){ 
		
		var cedula   = $("#cedula").val(); 
		var nombre   = $("#nombre").val(); 
		var telefono  = $("#telefono").val(); 
		var direccion  = $("#direccion").val(); 
		var ciudad   = $("#ciudad").val(); 
		var correo   = $("#correo").val(); 
		
		var parametros = { 
				"cedula"	:cedula,
				"nombre"	:nombre,
				"telefono"	:telefono,
				"direccion"	:direccion,
				"ciudad"	:ciudad,
				"correo" 	:correo,
		}
		
		$.ajax({ data:  parametros, url: 'registrarLector',type:  'post',
			beforeSend: function () {$("#reslector").html("Enviando, espere por favor...");},
			success:  function (response) {$("#reslector").html(response); }
			});
		
	});
	
	// validar solo numeros
    $(".number").keyup(function(e){  this.value = (this.value + '').replace(/[^0-9]/g, ''); });	
	
	$(".validar-cedula").keyup(function(e){  
		var parametros = { "cedula"	: $(this).val() }
		$.ajax({ data:  parametros, url: 'validarCedula',type:  'POST',
			//beforeSend: function () {$("#reslector").html(" Cargando...");},
			success:  function (response) {$("#reslector").html(response); }
			});
	});
	
	$(".editar-lector").click(function(){
		var code = $(this).val();
		console.info("Llamando "+code);
		 $.ajax({
	            url: 'prueba?cedula='+code,
	            type: 'GET',
	            dataType: 'JSON',
	            success: function (data) {
	                for (var c = 0; c < data.length; c++) {
	                    var infocancion =  data[c].cedula;
	                    $("#idLector").val(code);
	                    $("#cedula").val(data[c].cedula);
	                    $("#nombre").val(data[c].Nombre);
	                    $("#telefono").val(data[c].telefono);
	                    $("#direccion").val(data[c].direccion);
	                    $("#ciudad").val(data[c].ciudad);
	                    $("#correo").val(data[c].correo);
	                    console.info("cargo los datos ");
	                }
	                $(".register-lector").prop('disabled', true);
	                $(".update-lector").prop('disabled', false);
	                $(".cancel-lector").show("slow");
	            }
	        })
	});
	
	$(".update-lector").click(function() { 
		
		var idlector   = $("#idLector").val();
		var cedula   = $("#cedula").val(); 
		var nombre   = $("#nombre").val(); 
		var telefono  = $("#telefono").val(); 
		var direccion  = $("#direccion").val(); 
		var ciudad   = $("#ciudad").val(); 
		var correo   = $("#correo").val(); 
		
		var parametros = { 
				"idLector"	:idlector,
				"cedula"	:cedula,
				"nombre"	:nombre,
				"telefono"	:telefono,
				"direccion"	:direccion,
				"ciudad"	:ciudad,
				"correo" 	:correo,
		}
		
		$.ajax({ data:  parametros, url: 'actualizarLector',type:  'POST',
			beforeSend: function () {$("#reslector").html("Enviando, espere por favor...");},
			success:  function (response) {$("#reslector").html(response); }
			});
	});
	
	$(".cancel-lector").click(function(){
		$(".update-lector").prop('disabled', true);
		$(".cancel-lector").toggle("slow");
		$(".register-lector").prop('disabled', false);
	});
	
	

	
	
});