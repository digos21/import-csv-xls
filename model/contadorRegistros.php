<?php 

function getTotalRecords($connection, $fileName = null, $date = null) {
    // Base da consulta SQL para contar o total de registros
    $query = "SELECT COUNT(*) as total FROM uploaded_files WHERE 1=1";
    
    // Adicionar filtros de nome e data se aplicável
    if ($fileName) {
        $query .= " AND file_name LIKE ?";
        $fileName = "%$fileName%";
    }
    
    if ($date) {
        $query .= " AND DATE(upload_date) = ?";
    }
    
    // Preparar a consulta
    $stmt = $connection->prepare($query);
    
    // Lógica para adicionar parâmetros dinamicamente
    if ($fileName && $date) {
        $stmt->bind_param('ss', $fileName, $date);
    } elseif ($fileName) {
        $stmt->bind_param('s', $fileName);
    } elseif ($date) {
        $stmt->bind_param('s', $date);
    }
    
    // Executar a consulta
    $stmt->execute();
    $stmt->bind_result($total);
    $stmt->fetch();
    
    return $total;
}



?>