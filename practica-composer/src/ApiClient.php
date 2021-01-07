<?php
include_once 'client.php';

$client = new Client();
$clientes = array();

//mis variables. Primero el dominio
$letter = $_GET['domain'];
$result = $client->getByDomain($letter);
$clientes['byDomain'] = array();

//la fecha
$date = $_GET['date'];
$rs = $client->getByDate($date);
$clients['byDate'] = array();


if($rs->rowCount()) {
    while($row = $rs->fetch()) {
        $byDate = array(
            'date' => $row['date'],
            
        );
        array_push($clients['byDate'], $byDate);
    }
        http_response_code(200);
        echo json_encode($clients);

    } else if ($result->rowCount()) {
        
        while($row = $result->fetch()) {
            $byDomain = array(
                'clientEmail' => $row['clientEmail'],
            );

            array_push($clientes['byDomain'], $byDomain);
        }
            http_response_code(200);
            echo json_encode($clientes);

    } else {
        http_response_code(404);
        echo json_encode(array('error' => 'Data not found'));
    }

?>
