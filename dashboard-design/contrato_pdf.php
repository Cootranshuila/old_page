<?php 

session_start();
require('lib/pdf/mpdf.php');
require "ConexionBaseDatos_PDO.php";
$conexion = conectaDb();
$fecha = date("y/m/d");
$responsable = $_SESSION['user'];
	
	if (isset($_REQUEST['con'])) {
		$query = "select * from contrato where contratoCodigo = ".$_REQUEST['con'];
	} else{
		$query = "select * from contrato order by contratoCodigo desc limit 1";
	}

	$sql = $conexion->prepare($query);
	$sql->execute();
	$resultado = $sql->fetchAll();
	foreach ($resultado as $row) {
	
	$contrato = $row['contratoCodigo'];

	$html = '<header class="clearfix">
			  <br><br><br><br><br>
		      <h1><strong>CONTRATO DE PRESTACION DE SERVICIOS DE TRANSPORTE TERRESTRE SUSCRITO ENTRE:</strong></h1>
		      <h1><strong>No. '.$contrato.'</strong></h1>
		      <h4><strong>Contratante</strong>: '.$row['contratoContratante'].'</h4>
		      <h4><strong>Contratista</strong>: COOPERATIVA DE TRANSPORTADORES DEL HUILA LIMITADA "COOTRANSHUILA".</h4>
		    </header>
		    <div class="content">
				<p>Entre los suscritos entre saber <b>MARINO CASTRO CARVAJAL</b>, mayor de edad, vecino del Municipio de Neiva (Huila), identificado con cedula de ciudadanía número 83.029.098 de Saldo Blanco (Huila) en condición de Representante Legal de la Empresa de Transporte <b>COOPERATIVA DE TRANSPORTADORES DEL HUILA LIMITADA “COOTRANSHUILA”</b>, ente social dedicado al transporte especial, turismo y escolar, sociedad legalmente construida con Nit: 891.100.299-7 domiciliada en la ciudad de Neiva (Huila), quien para los efectos del presente CONTRATO se denominara el CONTRATISTA, y de otra parte '.$row['contratoContratante'].', mayor de edad, con direccion '.$row['contratoRespoDireccion'].', en condición de Representante Legal de la Empresa o representante de '.$row['contratoContratante'].' identificado con Nit. '.$row['contratoNit3'].' - '.$row['contratoNit4'].', se denominara el CONTRATANTE, hemos celebrado el presente contrato de Prestación de Servicios de Transporte de acuerdo a lo señalado en la normativa vigente, el cual se regirá por las siguientes cláusulas:<br> <b>PRIMERA:</b> El CONTRATISTA se obliga para el contratante a prestar el servicio de Transporte Especial para TRANSPORTE PUBLICO ESPECIAL DE PERSONAS para el transporte de un grupo de personas de la siguiente forma: 
				</p>
		    </div>
		    <main>
		      <table class="tableOne">
		        <thead>
		          <tr>
		            <th colspan="4"><b>RUTA</b></th>
		          </tr>
		        </thead>
		        <tbody>

		        	echo "<tr>";

					<td colspan="4" id="recorrido"> '.$row["contratoRecorrido"].' </td>";
					
					echo "</tr>";

		          	echo "<tr>";

					echo "<td colspan="1"><b>Placa</b></td>";
					echo "<td colspan="1">'.$row["contratoPlaca"].'</td>";
					echo "<td colspan="1"><b>Numero interno</b></td>";
					echo "<td colspan="1">'.$row["contratoNumeroInterno"].'</td>";
					
					echo "</tr>";
		        </tbody>
		      </table>

		      <div class="content">
				<p><b>SEGUNDA:</b> El CONTRATANTE especificara las rutas, horarios y destinos a fin de programar. <br>
				<b>TERCERA:</b> Los vehículos del presente contrato debe cumplir con las siguientes condiciones, como: revisión tecnicomecanica, soat, pólizas de responsabilidad civil contractual y extracontractual, tarjeta de operación vigente, botiquín de primeros auxilios, herramientas básicas alistamiento excelente. <br>
				<b>CUARTA:</b> FRECUENCIA Y HORARIO DE OPERACIÓN: el servicio se prestara desde el lugar de concentración al lugar donde desarrolle la actividad y la programación previamente suministrada diariamente para el desplazamiento. <br>
				<b>QUINTA:</b> DURACION: El término de duración del contrato de transporte será a partir del de de hasta de de . <br>
				<b>SEXTA:</b> OBLIGACIONES DEL CONTRATANTE: el contratante deberá cancelar oportunamente los valores establecidos en el presente contrato, previa cuenta de cobro radicada por el contratista y visto bueno del interventor del contrato. <br>
				<b>SEPTIMA:</b> OBLIGACIONES DEL CONTRATISTA: el contratista se obliga a cumplir con los recorridos autorizados y programados. <br>
				<b>OCTAVA:</b> Los conductores deberán estar debidamente afiliados a la Seguridad Social y con experiencia en la operación de los vehículos. <br>
				<b>NOVENA:</b> Dentro los términos de este contrato queda terminantemente prohibido transportar personas ajenas o diferentes a los mencionados. <br>
				<b>DECIMA:</b> Las partes convienen como cláusula Penal de conformidad con las normas legales. Esta cláusula se aplicara en todos los casos en que haya incumplido y podrá ser cobrada sin notificación para constituir en mora y sin requerimiento alguno mediante un proceso ejecutivo. <br><br>
				En constancia se firma el presente contrato por las partes, en dos ejemplares del mismo contenido, en la ciudad de Neiva, a las de de del . VALOR DEL SERVICIO: $'.$row["contratoValor"].', '.$row["contratoValorLetra"].', FORMA DE PAGO: '.$row["PagoForma"].' ANTES DE INICIAR EL VIAJE.
				</p>
		    </div>
		    </main><br>
		    <div>
				<table class="tableTwo">
		        <thead>
		          <tr>
		            <th align="left"><b>CONTRATANTE</b></th>
		            <th align="left"><b>CONTRATISTA</b></th>
		          </tr>
		        </thead>
		        <tbody>

					echo "<tr>";

						echo "<td colspan="1"><br><br><br><br></td>";
						echo "<td colspan="1"><br><br><br><br></td>";
					
					echo "</tr>";

		          	echo "<tr>";

						echo "<td colspan="1"><b>'.$row["contratoContratante"].'</b></td>";
						echo "<td colspan="1"><b>MARINO CASTRO CARVAJAL</b></td>";
					
					echo "</tr>";

					echo "<tr>";

						echo "<td colspan="1"><b>CC. </b>'.$row["contratoNit3"].'</td>";
						echo "<td colspan="1"><b>CC.</b> 83.029.098</td>";
					
					echo "</tr>";
					echo "<tr>";

						echo "<td colspan="1"><b>Representante lega</b></td>";
						echo "<td colspan="1"><b>Representante lega</b></td>";
					
					echo "</tr>";
					echo "<tr>";

						echo "<td colspan="1">'.$row["contratoContratante"].'</td>";
						echo "<td colspan="1">COOTRANSHUILA LTDA</td>";
					
					echo "</tr>";
					echo "<tr>";

						echo "<td colspan="1"><b>Nit. </b>'.$row["contratoNit3"].' - '.$row["contratoNit4"].'</td>";
						echo "<td colspan="1"><b>Nit.</b> 891100299 - 7</td>";
					
					echo "</tr>";
		        </tbody>
		      </table>

		    </div>



		    <header class="clearfix">
		    </header>
		    <main>
		      <table class="tableThree">
		        <thead>
		          <tr>
		            <th colspan="3"><img class="ini" src="images/especial/logo1.jpg"></th>
		            <th colspan="3"><img class="ini" src="images/especial/logo/logo.jpg"></th>
		          </tr>
		        </thead>
		        <tbody>
					
		          	echo "<tr>";
						echo "<td align="center" colspan="6"><b>FORMATO ÚNICO DE EXTRACTO DEL CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL<br><br>No: 441025001 '.$row['contratoAno'].' '.$row['contratoCodigo'].' 001</b></td>";					
					echo "</tr>";
					echo "<tr>";
						echo "<td align="center" colspan="4"><b><h6>RAZÓN SOCIAL DE LA EMPRESA DE TRANSPORTE ESPECIAL</h6><br>COOPERATIVA DE TRANSPORTADORES DEL HUILA LTDA</b></td>";					
						echo "<td align="center" colspan="2"><b><h6>Nit:</h6><br>891100299 - 7</b></td>";					
					echo "</tr>";
					echo "<tr>";
						echo "<td align="center" colspan="6"><b>CONTRATO Nº:<br>'.$row['contratoCodigo'].'</b></td>";		
					echo "</tr>";
					echo "<tr>";
						echo "<td align="center" colspan="4"><b><h6>CONTRATANTE</h6>'.$row["contratoContratante"].'</b></td>";					
						echo "<td align="center" colspan="2"><b><h6>NIT / CC:</h6>'.$row["contratoNit3"].' - '.$row["contratoNit4"].'</b></td>";					
					echo "</tr>";
					echo "<tr>";
						echo "<td align="center" colspan="6"><b><h6>OBJETO CONTRATO:</h6>'.$row['contratoObjetivo'].'</b></td>";	
					echo "</tr>";
					echo "<tr>";
						echo "<td bgcolor="#CCCCCC" align="center" colspan="1">Origen</td>";
						echo "<td align="center" colspan="2">'.$row['contratoOrigen'].'</td>";
						echo "<td bgcolor="#CCCCCC" align="center" colspan="1">Destino</td>";	
						echo "<td align="center" colspan="2">'.$row['contratoDestino'].'</td>";					
					echo "</tr>";
					echo "<tr>";
						echo "<td align="center" colspan="6"><b><h6>RECORRIDO:</h6>'.$row['contratoRecorrido'].'</b></td>";	
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="left" colspan="1"><b>CONVENIO: </b>'.$row['contratoConvenio'].'</td>";				
						echo "<td align="left" colspan="2"><b>CONSORCIO: </b>'.$row['contratoConsorcio'].'</td>";				
						echo "<td align="left" colspan="2"><b>UNION TEMPORAL: </b>'.$row['contratoUnion'].'</td>";			
						echo "<td align="left" colspan="1"><b>CON: </b>'.$row['contratoCon'].'</td>";				
					echo "</tr>";
					echo "<tr>";
						echo "<td bgcolor="#CCCCCC" align="center" colspan="6"><b>VIGENCIA DEL CONTRATO</b></td>";				
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="center" colspan="2"><b>FECHA INICIAL </b></td>";				
						echo "<td align="center" colspan="1"><h6><b>DIA</b></h6>'.$row['contratoDiaInicio'].'</td>";			
						echo "<td align="center" colspan="2"><h6><b>MES</b></h6>'.$row['contratoMesInicio'].'</td>";			
						echo "<td align="center" colspan="1"><h6><b>AÑO </b></h6>'.$row['contratoAnoInicio'].'</td>";			
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="center" colspan="2"><b>FECHA DE VENCIMIENTO</b></td>";				
						echo "<td align="center" colspan="1"><h6><b>DIA</b></h6>'.$row['contratoDiaFin'].'</td>";			
						echo "<td align="center" colspan="2"><h6><b>MES</b></h6>'.$row['contratoMesFin'].'</td>";			
						echo "<td align="center" colspan="1"><h6><b>AÑO </b></h6>'.$row['contratoAnoFin'].'</td>";			
					echo "</tr>";
					echo "<tr>";
						echo "<td bgcolor="#CCCCCC" align="center" colspan="6"><b>CARACTERÍSTICAS DEL VEHICULO</b></td>";	
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="left" colspan="1"><b>PLACA: </b>'.$row['contratoPlaca'].'</td>";				
						echo "<td align="left" colspan="1"><b>MODELO: </b>'.$row['contratoModelo'].'</td>";				
						echo "<td align="left" colspan="2"><b>MARCA: </b>'.$row['contratoMarca'].'</td>";			
						echo "<td align="left" colspan="2"><b>CLASE: </b>'.$row['contratoClase'].'</td>";				
					echo "</tr>";
					echo "<tr>";				
						echo "<td align="center" colspan="3"><b><h6>NÚMERO INTERNO:</h6> </b>'.$row['contratoNumeroInterno'].'</td>";
						echo "<td align="center" colspan="3"><b><h6>NÚMERO TARJETA DE OPERACIÓN:</h6> </b>'.$row['contratoTarOperacion'].'</td>";
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="center" bgcolor="#CCCCCC" colspan="1"><b>DATOS DEL CONDUCTOR 1 </b></td>";				
						echo "<td align="center" colspan="2"><b><h6>NOMBRES Y APELLIDOS</h6></b>'.$row['contratoConduc1Nombre'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>Nº DE IDENTIFICACIÓN</h6></b>'.$row['contratoConduc1Cedula'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>NºLICENCIA CONDUCCIÓN</h6></b>'.$row['contratoConduc1Licencia'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>VIGENCIA</h6></b>'.$row['contratoConduc1Vigencia'].'</td>";
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="center" bgcolor="#CCCCCC" colspan="1"><b>DATOS DEL CONDUCTOR 2 </b></td>";				
						echo "<td align="center" colspan="2"><b><h6>NOMBRES Y APELLIDOS</h6></b>'.$row['contratoConduc2Nombre'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>Nº DE IDENTIFICACIÓN</h6></b>'.$row['contratoConduc2Cedula'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>NºLICENCIA CONDUCCIÓN</h6></b>'.$row['contratoConduc2Licencia'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>VIGENCIA</h6></b>'.$row['contratoConduc2Vigencia'].'</td>";
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="center" bgcolor="#CCCCCC" colspan="1"><b>DATOS DEL CONDUCTOR 3 </b></td>";				
						echo "<td align="center" colspan="2"><b><h6>NOMBRES Y APELLIDOS</h6></b>'.$row['contratoConduc3Nombre'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>Nº DE IDENTIFICACIÓN</h6></b>'.$row['contratoConduc3Cedula'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>NºLICENCIA CONDUCCIÓN</h6></b>'.$row['contratoConduc3Licencia'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>VIGENCIA</h6></b>'.$row['contratoConduc3Vigencia'].'</td>";
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="center" bgcolor="#CCCCCC" colspan="1"><b>RESPONSABLE DEL CONTRATANTE </b></td>";				
						echo "<td align="center" colspan="2"><b><h6>NOMBRES Y APELLIDOS</h6></b>'.$row['contratoRespoNombre'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>Nº DE IDENTIFICACIÓN</h6></b>'.$row['contratoRespoCedula'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>DIRECCIÓN</h6></b>'.$row['contratoRespoDireccion'].'</td>";
						echo "<td align="center" colspan="1"><b><h6>TELÉFONO</h6></b>'.$row['contratoRespoTelefono'].'</td>";
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="center" colspan="2"><b><h6>VIGILADO</h6></b><br><img class="fin" src="images/especial/logo3.jpg"></td>";
						echo "<td align="center" colspan="2"><center><h4>NEIVA,  AVENIDA 26 Nº 4 - 82<br>TELÉFONO: (057) 8756368 - 8756365<br><u>gerencia@cootranshuila.com</u><br><u>turismo@cootranshuila.com</u><br><u>www.cootranshuila.com</u></h4></center></td>";
						echo "<td align="center" colspan="2"><br><br><br><br><b><h6>FIRMA Y SELLO</h6></b></td>";
					echo "</tr>";

		        </tbody>
		      </table>
		    </main>
		   
		    <footer>
		      COOTRANSHUILA LTDA. Llegamos lejos.
		    </footer>';

	}

	$mpdf = new mPDF('c', 'A4');
	$css = file_get_contents("css/stylePDFcontrato.css");
	$mpdf->WriteHTML($css, 1);
	$mpdf->WriteHTML($html, 2);
	$mpdf->Output('contrato_'.$contrato.'.pdf', 'I');
	// header("location:Index.php");

?>

