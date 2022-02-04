<?php

/**
 * PARTE SERVIDOR.
 */

// Instanciamos un nuevo servidor SOAP
$uri="http://192.168.129.80/DWES/DWES-UD7/";
$server = new SoapServer(null,array('uri'=>$uri));
$server->addFunction("mostrarCiudades");
$server->handle();

function getConnection() {
    $user = 'developer';
    $pwd = 'developer';
    return new PDO('mysql:host=localhost;dbname=ciudades', $user, $pwd);
}

// Función para obtener ciudades con poblacion mayor o igual a una dada.
function mostrarCiudades($numPoblacion) {

    $db = getConnection();

    $sqlQuery = "SELECT * FROM ciudades WHERE poblacion >= ?";
    $stmt = $db->prepare($sqlQuery);
    $stmt->bindParam(1, $numPoblacion);

    $stmt->execute();

    $ciudades = $stmt->fetchAll();

    return $ciudades;
}

?>