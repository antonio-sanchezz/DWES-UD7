<?php

function serviceCiudades() {

    // Se incluye el modelo.
    require './models/ciudadesModel.php';

    $uri="http://192.168.129.80/DWES/DWES-UD7/ejercicio4";
    $server = new SoapServer(null,array('uri'=>$uri));
    $server->addFunction("mostrarCiudades");
    $server->handle();

}

?>