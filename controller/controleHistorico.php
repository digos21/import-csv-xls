<?php

// Supondo que os parâmetros foram passados via GET na URL
$fileName = isset($_GET['file_name']) ? $_GET['file_name'] : null;
$date = isset($_GET['date']) ? $_GET['date'] : null;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

displayUploadHistory($connection, $fileName, $date, $page);



?>