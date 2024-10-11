<?php

// Simulação de upload de arquivo ($_FILES['file']) e conexão ao banco ($connection)

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $response = handleFileUpload($_FILES['file'], $connection);
    echo $response;
}



?>