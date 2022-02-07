<?php

function ciudadesForm() {

    $error = "";
    $resultado = [];
    $numPoblacion = "";

    if (isset($_POST['enviar'])) {

        // Iniciamos el cliente SOAP
        // Escribimos la dirección donde se encuentra el servicio
        $url = "http://192.168.129.80/DWES/DWES-UD7/ejercicio4-servidor?controller=ciudades&action=serviceCiudades";
        $uri = "http://192.168.129.80/DWES/DWES-UD7/";
        $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

        // Establecemos los parámetros de envío
        if (is_int((int)$_POST['numPoblacion']) && $_POST['numPoblacion'] > 0) {
            $numPoblacion = (int)$_POST['numPoblacion'];
            // Si los parámetros son correctos, llamamos a la función mostrarCiudades de ejercicio3.php
            $resultado = $cliente->mostrarCiudades($numPoblacion);
        } else {
            $error = "<strong>Error:</strong> Debes introducir un número entero, mayor a 0.";
        }
    }

    // Se incluye la vista.
    require './views/ciudadesForm.php';
}


?>