<?php 

session_start();
require('../assets/lib/pdf/mpdf.php');
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
				<p>Entre los suscritos entre saber <b>MARINO CASTRO CARVAJAL</b>, mayor de edad, vecino del Municipio de Neiva (Huila), identificado con cedula de ciudadanía número 83.029.098 de Saldo Blanco (Huila) en condición de Representante Legal de la Empresa de Transporte <b>COOPERATIVA DE TRANSPORTADORES DEL HUILA LIMITADA “COOTRANSHUILA”</b>, ente social dedicado al transporte especial, turismo y escolar, sociedad legalmente construida con Nit: 891.100.299-7 domiciliada en la ciudad de Neiva (Huila), quien para los efectos del presente CONTRATO se denominara el CONTRATISTA, y de otra parte '.$row['contratoRespoNombre'].', mayor de edad con C.C '.$row['contratoRespoCedula'].', en condición de Representante Legal de la Empresa o representante de '.$row['contratoContratante'].' identificado con Nit. '.$row['contratoNit3'].' - '.$row['contratoNit4'].' direccion '.$row['contratoRespoDireccion'].', se denominara el CONTRATANTE, hemos celebrado el presente contrato de Prestación de Servicios de Transporte de acuerdo a lo señalado en la normativa vigente, el cual se regirá por las siguientes cláusulas:<br> <b>PRIMERA:</b> El CONTRATISTA se obliga para el contratante a prestar el servicio de Transporte Especial para TRANSPORTE PUBLICO ESPECIAL DE PERSONAS para el transporte de un grupo de personas de la siguiente forma: 
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
				<p><b>SEGUNDA:</b> El CONTRATANTE especificara las rutas, horarios y destinos a fin de programar. 
				<b>TERCERA:</b> Los vehículos del presente contrato debe cumplir con las siguientes condiciones, como: revisión tecnicomecanica, soat, pólizas de responsabilidad civil contractual y extracontractual, tarjeta de operación vigente, botiquín de primeros auxilios, herramientas básicas alistamiento excelente. 
				<b>CUARTA:</b> FRECUENCIA Y HORARIO DE OPERACIÓN: el servicio se prestara desde el lugar de concentración al lugar donde desarrolle la actividad y la programación previamente suministrada diariamente para el desplazamiento. 
				<b>QUINTA:</b> DURACION: El término de duración del contrato de transporte será a partir del '.$row['contratoDiaInicio'].' de '.$row['contratoMesInicio'].' de '.$row['contratoAnoInicio'].' hasta '.$row['contratoDiaFin'].' de '.$row['contratoMesFin'].' de '.$row['contratoAnoFin'].'. 
				<b>SEXTA:</b> OBLIGACIONES DEL CONTRATANTE: el contratante deberá cancelar oportunamente los valores establecidos en el presente contrato, previa cuenta de cobro radicada por el contratista y visto bueno del interventor del contrato. 
				<b>SEPTIMA:</b> OBLIGACIONES DEL CONTRATISTA: el contratista se obliga a cumplir con los recorridos autorizados y programados. 
				<b>OCTAVA:</b> Los conductores deberán estar debidamente afiliados a la Seguridad Social y con experiencia en la operación de los vehículos. 
				<b>NOVENA:</b> Dentro los términos de este contrato queda terminantemente prohibido transportar personas ajenas o diferentes a los mencionados. 
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

						echo "<td colspan="1"><b>'.$row["contratoRespoNombre"].'</b></td>";
						echo "<td colspan="1"><b>MARINO CASTRO CARVAJAL</b></td>";
					
					echo "</tr>";

					echo "<tr>";

						echo "<td colspan="1"><b>CC. </b>'.$row["contratoRespoCedula"].'</td>";
						echo "<td colspan="1"><b>CC.</b> 83.029.098</td>";
					
					echo "</tr>";
					echo "<tr>";

						echo "<td colspan="1"><b>Representante legal</b></td>";
						echo "<td colspan="1"><b>Representante legal</b></td>";
					
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
		            <th style="border:none; align-content: space-between; padding-bottom:25px;" colspan="6">
			            <img class="ini" width="230" style="margin-right:10px;" src="../assets/images/especial/logo1.png">
			            <img class="ini" width="90" style="margin-right:40px;" src="../assets/images/especial/logo1aux.jpg">
			            <img class="ini" width="190" style="margin-top:-65px;" src="../assets/images/especial/logo/logo.jpg">
		            </th>
		          </tr>
		        </thead>
		        <tbody>
					
		          	<tr>
						<td style="border:none;" colspan="6">
							<center><b>FORMATO ÚNICO DE EXTRACTO DEL CONTRATO DEL SERVICIO PÚBLICO DE TRANSPORTE TERRESTRE AUTOMOTOR ESPECIAL<br><br>No: 441025001 '.$row['contratoAno'].' '.$row['contratoCodigo'].' 0001</b></center><br><br><br>
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td style="border:none;" colspan="6">
								<h5>RAZÓN SOCIAL DE LA EMPRESA DE TRANSPORTE ESPECIAL: <b>COOPERATIVA DE TRANSPORTADORES DEL HUILA LTDA</b></br></h5> <br>				
								<h4>Nit: <b>891100299 - 7</b></br></h4> <br>
								<h4>CONTRATO Nº: <b>'.$row['contratoCodigo'].'</b></h4> <br>
								<h4>CONTRATANTE: <b>'.$row["contratoContratante"].'</b></h4> <br>
								<h4>NIT/CC: <b>'.$row["contratoNit3"].' - '.$row["contratoNit4"].'</b></h4> <br>
								<h4>OBJETO CONTRATO: <b>'.$row['contratoObjetivo'].'</b></br></h4>	<br>
								<h4>ORIGEN-DESTINO: <b>'.$row['contratoOrigen'].' - '.$row['contratoDestino'].'</b></br></h4> <br>
								<h4>CONVENIO DE COLABORACIÓN: <b></b></br></h4><br>
						</td>
					</tr>
					<tr>
						<td style="border:none;" colspan="6">
							<center><b>VIGENCIA DEL CONTRATO</b></center><br>
						</td>
					</tr>
					echo "<tr>";			
						echo "<td align="center" colspan="2"><b>FECHA INICIAL </b></td>";				
						echo "<td align="center" colspan="1"><b>DIA: </b>'.$row['contratoDiaInicio'].'</td>";			
						echo "<td align="center" colspan="2"><b>MES: </b>'.$row['contratoMesInicio'].'</td>";			
						echo "<td align="center" colspan="1"><b>AÑO: </b>'.$row['contratoAnoInicio'].'</td>";			
					echo "</tr>";
					echo "<tr>";			
						echo "<td align="center" colspan="2"><b>FECHA DE VENCIMIENTO</b></td>";				
						echo "<td align="center" colspan="1"><b>DIA: </b>'.$row['contratoDiaFin'].'</td>";			
						echo "<td align="center" colspan="2"><b>MES: </b>'.$row['contratoMesFin'].'</td>";			
						echo "<td align="center" colspan="1"><b>AÑO: </b>'.$row['contratoAnoFin'].'</td>";			
					echo "</tr>";
					<tr>
						<td style="border:none;" colspan="6">
							<br><br><center><b>CARACTERÍSTICAS DEL VEHÍCULO</b></center><br>
						</td>
					</tr>
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
						echo "<td align="center" colspan="2"><b><h6>VIGILADO</h6></b><br><img width="30%" height="10%" class="fin" src="../assets/images/especial/logo3.jpg"></td>";
						echo "<td align="center" colspan="2"><center><h4>NEIVA,  AVENIDA 26 Nº 4 - 82<br>TELÉFONO: (057) 8756368 - 8756365<br><u>gerencia@cootranshuila.com</u><br><u>turismo@cootranshuila.com</u><br><u>www.cootranshuila.com</u></h4></center></td>";
						echo "<td align="center" colspan="2"><br><br><br><br><b><h6>FIRMA Y SELLO</h6></b></td>";
					echo "</tr>";

		        </tbody>
		      </table>
		    </main>

		    <footer>
		      COOTRANSHUILA LTDA. Llegamos lejos.
		    </footer>

		    <header class="clearfix">
		    </header>
		    <main>
		      <table class="tableThree">
		     
		        <tbody>
					
		          	<tr>
						<td style="border:none;" colspan="6">
							<br><br><br><br><center><b>INSTRUCTIVO PARA LA DETERMINACIÓN DEL NÚMERO CONSECUTIVO DEL FORMATO ÚNICO DE EXTRACTO DEL CONTRATO -FUEC </b></center><br><br><br><br><br>
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td style="border:none;" colspan="6">
							El Formato Único de Extracto del Contrato -FUEC estará constituido por los siguientes números: 
						</td>
					</tr>
					
					<tr>
						<td style="border:none;" colspan="6">
							<br><br>a) Los tres primeros dígitos de izquierda a derecha corresponderán al código de la Dirección Territorial que otorgó la habilitación o de aquella a la cual se hubiese trasladado la empresa de Servicio Público de Transporte Terrestre Automotor Especial; 
						</td>
					</tr>
					<br><br>
					<tr>			
						<td colspan="2">Antioquia-Chocó</td>				
						<td align="center" colspan="1">305</td>			
						<td colspan="2">Huila-Caquetá </td>			
						<td align="center" colspan="1">441</td>			
					</tr>
					<tr>			
						<td colspan="2">Atlántico</td>				
						<td align="center" colspan="1">208</td>			
						<td colspan="2">Magdalena</td>			
						<td align="center" colspan="1">247</td>			
					</tr>
					<tr>			
						<td colspan="2">Bolívar-San Andrés y Providencia</td>				
						<td align="center" colspan="1">213</td>			
						<td colspan="2">Meta-Vaupés-Vichada</td>			
						<td align="center" colspan="1">550</td>			
					</tr>
					<tr>			
						<td colspan="2">Boyacá-Casanare </td>				
						<td align="center" colspan="1">415</td>			
						<td colspan="2">Nariño-Putumayo </td>			
						<td align="center" colspan="1">352</td>			
					</tr>
					<tr>			
						<td colspan="2">Caldas</td>				
						<td align="center" colspan="1">317</td>			
						<td colspan="2">N/Santander-Arauca </td>			
						<td align="center" colspan="1">454</td>			
					</tr>
					<tr>			
						<td colspan="2">Cauca</td>				
						<td align="center" colspan="1">319</td>			
						<td colspan="2">Quindío</td>			
						<td align="center" colspan="1">363</td>			
					</tr>
					<tr>			
						<td colspan="2">Cesar</td>				
						<td align="center" colspan="1">220</td>			
						<td colspan="2">Risaralda</td>			
						<td align="center" colspan="1">366</td>			
					</tr>
					<tr>			
						<td colspan="2">Córdoba-Sucre</td>				
						<td align="center" colspan="1">223</td>			
						<td colspan="2">Santander</td>			
						<td align="center" colspan="1">468</td>			
					</tr>
					<tr>			
						<td colspan="2">Cundinamarca</td>				
						<td align="center" colspan="1">425</td>			
						<td colspan="2">Tolima</td>			
						<td align="center" colspan="1">473</td>			
					</tr>
					<tr>			
						<td colspan="2">Guajira</td>				
						<td align="center" colspan="1">241</td>			
						<td colspan="2">Valle del Cauca</td>			
						<td align="center" colspan="1">376</td>			
					</tr>

					<tr>
						<td style="border:none;" colspan="6">
							<br><br>b) Los cuatro dígitos siguientes señalarán el número de resolución mediante la cual se otorgó la habilitación de la Empresa. En caso que la resolución no tenga estos dígitos, los faltantes serán completados con ceros a la izquierda;
						</td>
					</tr>

					<tr>
						<td style="border:none;" colspan="6">
							<br>c) Los dos siguientes dígitos, corresponderán a los dos últimos del año en que la empresa fue habilitada;

						</td>
					</tr>

					<tr>
						<td style="border:none;" colspan="6">
							<br>d) A continuación, cuatro dígitos que corresponderán al año en el que se expide el extracto del contrato;

						</td>
					</tr>

					<tr>
						<td style="border:none;" colspan="6">
							<br>e) Posteriormente, cuatro dígitos que identifican el número del contrato. La numeración debe ser consecutiva, establecida por cada empresa y continuará con la numeración dada a los contratos de prestación del servicio celebrados con anterioridad a la expedición de la presente Resolución para el transporte de estudiantes, empleados, turistas, usuarios del servicio de salud y grupo específico de usuarios.

						</td>
					</tr>

					<tr>
						<td style="border:none;" colspan="6">
							<br>f) Finalmente, los cuatro últimos dígitos corresponderán a los cuatro dígitos del número consecutivo del extracto de contrato de la empresa que se expida para la ejecución de cada contrato. En el evento, que el numero consecutivo del extracto de contrato de la empresa supere los cuatro dígitos, se tomarán los últimos cuatro dígitos del consecutivo.
						</td>
					</tr>

		        </tbody>
		      </table>
		    </main>
		   
		    <footer>
		      COOTRANSHUILA LTDA. Llegamos lejos.
		    </footer>';

	}

	$mpdf = new mPDF('c', 'A4');
	$css = file_get_contents("../assets/css/stylePDFcontrato.css");
	$mpdf->WriteHTML($css, 1);
	$mpdf->WriteHTML($html, 2);
	$mpdf->Output('contrato_'.$contrato.'.pdf', 'I');
	// header("location:Index.php");

?>

