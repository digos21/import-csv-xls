<?php

//Chamar a função para conexão ao banco de dados 

function verificarArquivoBd($fileName, $connection) {
    // Criar uma consulta SQL para verificar se o arquivo já está no banco de dados
    $query = "SELECT COUNT(*) FROM uploaded_files WHERE file_name = ?";
    
    // Preparar a consulta
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $fileName);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    
    // Se o arquivo já foi enviado, o count será maior que 0
    if ($count > 0) {
        return true;
    }
    
    return false;
}



?>