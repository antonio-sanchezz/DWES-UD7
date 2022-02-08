<?php

if (isset($_POST['enviar'])) {

    $wsdl = 'https://www.crcind.com/csp/samples/SOAP.Demo.CLS?WSDL'; //URL de nuestro servicio soap

    //Basados en la estructura del servicio armamos un array
    $params = [
        "name" => $_POST['name']
    ];

    $options = [
        "uri"=> $wsdl,
        "style"=> SOAP_RPC,
        "use"=> SOAP_ENCODED,
        "soap_version"=> SOAP_1_1,
        "cache_wsdl"=> WSDL_CACHE_BOTH,
        "connection_timeout" => 15,
        "trace" => false,
        "encoding" => "UTF-8",
        "exceptions" => false,
    ];

    //Enviamos el Request
    $soap = new SoapClient($wsdl, $options);
    $result = $soap->GetListByName($params);

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>GetListByName - WSDL</title>
    </head>
<body>
    <h1>GetListByName</h1>
    <h2>Servicio WSDL</h2>
    <form action="getListByName.php" method="post">
    <?php
        print "<input type='text' name='name'> ";
        print "<input type='submit' name='enviar' value='Buscar'>";
    
    if (isset($_POST['enviar'])) {
        foreach($result as $person) {
            foreach($person as $person2) {
                for ($i = 0; $i < count($person2); $i++) {
                    print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person2[$i]->ID . "</p>";
                    print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person2[$i]->Name . "</p>";
                    print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person2[$i]->SSN . "</p>";
                    print "<p style='font-size: 12pt;font-weight: bold;color: #0066CC;'>" . $person2[$i]->DOB . "</p><br>";
                }  
            }
        }
    }
    ?>
    </form>
</body>
</html>