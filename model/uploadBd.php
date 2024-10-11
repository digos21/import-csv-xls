<?php

function uploadBd($file, $connection) {
    // Definir o diretório de upload
    $uploadDir = 'uploads/';
    
    // Caminho completo do arquivo
    $filePath = $uploadDir . basename($file['name']);
    
    // Mover o arquivo para o diretório definido
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Inserir o arquivo no banco de dados
        $query = "INSERT INTO uploaded_files (file_name, upload_date) VALUES (?, NOW())";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('s', $file['name']);
        $stmt->execute();
        
        return true;
    }
    
    return false;
}



?>