<?php

	function conectaDb() {

		$host='localhost';
		$dbname='cootranshuila';
		$user='root';
		$pass='Dus34b7jk9++kmo'; //

		try {

			$pdo = new PDO("mysql: host=$host; dbname=$dbname; charset=utf8", $user, $pass);
			return $pdo;

			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Conectado a la base de datos.";
		}
		catch(PDOException $e) {
			echo "Error en la conexion ".$e->getMessage();

		}
	}

	$conexion = conectaDb();
	
	//Funcion para Guardar, Modificar y Eliminar
	function NonQuery($sqlsrt, &$conexion = null){

		if(!$conexion) global $conexion;

		$result = $conexion->prepare($sqlsrt);
		$result->execute();

		return $result->rowCount();

	}

	//Funcion para Select
	function ObtenerRegistros($sqlsrt, &$conexion = null){

		if(!$conexion) global $conexion;

		$result      = $conexion->query($sqlsrt);
		$resultArray = array();

		foreach ($result as $row) {
			
			$resultArray[] = $row;

		}

		return $resultArray;

	}

	//Funcion para convertir datos  en UTF-8 
	function ConvertirUTF8($array) {

		array_walk_recursive($array,function(&$item,$key){

			if (!mb_detect_encoding($item,'utf-8',true)) {
				$item = utf8_encode($item);
			}

		});

		return $array;

	}

?>