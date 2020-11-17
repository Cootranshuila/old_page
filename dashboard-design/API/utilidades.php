<?php

require_once('ConexionBaseDatos_PDO.php');

function clientes_turismo(){

    $query = 'SELECT * from clientes_turismo';

    $respuesta = ObtenerRegistros($query);

    return ConvertirUTF8($respuesta);

}

function clientes_turismoID($id){

    $query = "SELECT * from clientes_turismo where id = $id";

    $respuesta = ObtenerRegistros($query);

    return ConvertirUTF8($respuesta);

}

function AgregarCliente($array) {

    $fecha    = $array[0]['fecha_registro'];
    $nombre   = $array[0]['nombre_clientetur'];
    $correo   = $array[0]['correo_clientetur'];
    $telefono = $array[0]['telefono_clientetur'];

    $query = "INSERT into clientes_turismo (fecha_registro,nombre_clientetur,correo_clientetur,telefono_clientetur) values ('$fecha', '$nombre', '$correo', '$telefono')";

    NonQuery($query);

    return true;

}


?>