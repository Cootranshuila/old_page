<?php
class Conexion{
	public function conectar(){
		$conexion = new PDO('mysql:dbname=cootranshuila;host=127.0.0.1','root','Dus34b7jk9++kmo');
		return $conexion;
	}
}
?>