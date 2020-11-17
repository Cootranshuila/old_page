<?php 

	// $url = 'https://checkout.payulatam.com/ppp-web-gateway-payu/'; // Producción
	$url = 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/'; // Sandbox
	
	$ApiKey = '8W03AUFbPqnIAmXYD9wPW20H3z'; // Obtener este dato dela cuenta de Payu
	$merchantId = '813763'; // Obtener este dato dela cuenta de Payu
	$accountId = '512321'; // Obtener este dato dela cuenta de Payu
	$description = 'Paquete turistico'; //Descripción del pedido
	$referenceCode = 'AAAAAA013'; // Referencia Unica del pedido
	$amount = '10000'; //Es el monto total de la transacción. Puede contener dos dígitos decimales. Ej. 10000.00 ó 10000.
	$tax = '0'; // Es el valor del IVA de la transacción, si se envía el IVA nulo el sistema aplicará el 19% automáticamente. Puede contener dos dígitos decimales. Ej: 19000.00. En caso de no tener IVA debe enviarse en 0.
	$taxReturnBase = '0'; // Es el valor base sobre el cual se calcula el IVA. En caso de que no tenga IVA debe enviarse en 0.
	$currency = 'COP'; // Moneda
	$test = '0'; // Variable para poder utilizar tarjetas de crédito de pruebas, los valores pueden ser 1 ó 0.
	$buyerEmail = 'test@test.com'; // Respuesta por Payu al comprador
	$responseUrl = 'https://testx.tk/payu/respuesta.php'; // URL de respuesta,
	$confirmationUrl = 'http://testx.tk/payu/confirmacion.php'; // URL de confirmación
	$confirmacionEmail = 'test@test.com'; // Confirmación email
 ?>