
$(document).ready(function() {


	$("#form-contacto").bind("submit", function() {

		$("#loading").removeClass("d-none");

		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(respuesta) {
				console.log(respuesta);
				if (respuesta == "Ok") {
					$("#loading").addClass("d-none"); 
					$("#alert").removeClass("d-none").addClass("alert-success");
				}
				if (respuesta == "Error") {
					$("#loading").addClass("d-none"); 
					$("#alert_danger").removeClass("d-none").addClass("alert-danger");
				}
			}
		});

	   	$("#form-contacto")[0].reset();

		return false;
	});

	$("#form-reclamo").bind("submit", function() {

		$("#loading").removeClass("d-none");

		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(respuesta) {
				console.log(respuesta);
				if (respuesta == "Ok") {
					$("#loading").addClass("d-none"); 
					$("#alert_reclamo").removeClass("d-none").addClass("alert-success");
					$("#ModalReclamo").modal();
				}
				if (respuesta == "Error") {
					$("#loading").addClass("d-none"); 
					$("#alert_danger").removeClass("d-none").addClass("alert-danger");
				}
			}
		});

	   	$("#form-reclamo")[0].reset();

		return false;
	});

	$("#form-comentario").bind("submit", function() {

		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function(respuesta) {

					$("#alertComen").removeClass("d-none").addClass("alert-success");
					$("#mostrarComen").html(respuesta);

			}
		});

	   	$("#form-comentario")[0].reset();

		return false;
	});

});