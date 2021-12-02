<?php

/*
$serverName = "DESKTOP-0UQG9G5\SQLEXPRESS"; 
$connectionInfo = array( "Database"=>"proyfinal");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
*/


//Con Conexion con PDO

$serverName = "DESKTOP-0UQG9G5\SQLEXPRESS"; 
$nombreBaseDeDatos = "proyfinal";
$contraseña = "";
$usuario = "DESKTOP-0UQG9G5\PC";

# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto

try {
    $base_de_datos = new PDO("sqlsrv:server=$serverName;database=$nombreBaseDeDatos");
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

if($base_de_datos) echo "Correcto";

?>

