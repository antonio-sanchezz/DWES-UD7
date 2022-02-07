<?php

/**
 * PARTE CLIENTE.
 */

// Vaciamos algunas variables
$error = "";
$resultado = [];
$numPoblacion = "";

// Iniciamos el cliente SOAP
// Escribimos la dirección donde se encuentra el servicio
$url = "http://192.168.129.80/DWES/DWES-UD7/ejercicio4?controller=ciudades&action=serviceCiudades";
$uri = "http://192.168.129.80/DWES/DWES-UD7/";
$cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));

// Ejecutamos las siguientes líneas al enviar el formulario.
if (isset($_POST['enviar'])) {
    // Establecemos los parámetros de envío
    if (is_int((int)$_POST['numPoblacion']) && $_POST['numPoblacion'] > 0) {
        $poblacion = (int)$_POST['numPoblacion'];
        // Si los parámetros son correctos, llamamos a la función mostrarCiudades de ejercicio3.php
        $resultado = $cliente->mostrarCiudades($poblacion);
    } else {
        $error = "<strong>Error:</strong> Debes introducir un número entero, mayor a 0.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Obtener ciudades - Servicio Web + PHP + SOAP</title>
    </head>
<body>
    <h1>Obtener ciudades</h1>
    <form action="ejercicio4.php" method="post">
    <?php
        print "<input type='number' name='numPoblacion' value='$numPoblacion'>";
        print "<input type='submit' name='enviar' value='Buscar'>";
        print "<p class='error'>$error</p>";
        foreach($resultado as $ciudad) {
            print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $ciudad['nombre'] . "</p>";
        }
    ?>
    </form>
</body>
</html>