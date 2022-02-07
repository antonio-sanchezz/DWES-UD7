<?php

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