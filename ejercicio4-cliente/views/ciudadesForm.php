<!DOCTYPE html>
<html>
    <head>
        <title>Obtener ciudades - Servicio Web + PHP + SOAP</title>
    </head>
<body>
    <h1>Obtener ciudades</h1>
    <form action="?controller=ciudades&action=ciudadesForm" method="post">
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