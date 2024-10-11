<?php 
//adicionar a classe de conexão ao banco de dados

function getUploadHistory($connection, $fileName = null, $date = null, $page = 1, $limit = 10) {
    // Definir o offset (ponto de início para a paginação)
    $offset = ($page - 1) * $limit;
    
    // Base da consulta SQL
    $query = "SELECT file_name, upload_date FROM uploaded_files WHERE 1=1";
    
    // Se o nome do arquivo foi fornecido, adicionar um filtro
    if ($fileName) {
        $query .= " AND file_name LIKE ?";
        $fileName = "%$fileName%";
    }
    
    // Se a data foi fornecida, adicionar um filtro de data
    if ($date) {
        $query .= " AND DATE(upload_date) = ?";
    }
    
    // Adicionar a parte de ordenação e limite para paginação
    $query .= " ORDER BY upload_date DESC LIMIT ? OFFSET ?";
    
    // Preparar a consulta
    $stmt = $connection->prepare($query);
    
    // Lógica para adicionar os parâmetros dinamicamente
    if ($fileName && $date) {
        $stmt->bind_param('ssii', $fileName, $date, $limit, $offset);
    } elseif ($fileName) {
        $stmt->bind_param('sii', $fileName, $limit, $offset);
    } elseif ($date) {
        $stmt->bind_param('sii', $date, $limit, $offset);
    } else {
        $stmt->bind_param('ii', $limit, $offset);
    }
    
    // Executar a consulta
    $stmt->execute();
    
    // Obter os resultados
    $result = $stmt->get_result();
    
    // Armazenar os arquivos em um array
    $files = [];
    while ($row = $result->fetch_assoc()) {
        $files[] = $row;
    }
    
    return $files;
}


?>