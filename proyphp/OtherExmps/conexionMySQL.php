<?php
$cnn = null;   //Connection se guarda en una variable
$host="localhost";
$user="root";
$password="";
$bd="proyfinal";

function conectar(){
    try{
        $GLOBALS['cnn']=new PDO("mysql:host=".$GLOBALS['host'].";dbname=".$GLOBALS['bd']."", $GLOBALS['user'], $GLOBALS['password']);
        $GLOBALS['cnn']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*
            Otra posible estructura pero no igual de segura:
        $GLOBALS['cnn'] = new PDO("mysql:host=localhost;dbname=prueba", "usuario", "password");
        */

        print "Conectado!: Conexion a la bd " .$GLOBALS['bd']."<br/>";
    }catch (PDOException $e){
        print "Error!: No se pudo conectar a la bd ".$GLOBALS['bd']."<br/>";
        //print "\nError!: ".$e."<br/>";
        die();
    }
}

function desconectar() {
    $GLOBALS['cnn']=null;
}

conectar(); //Con solo cargar el archivo se conecta

?>