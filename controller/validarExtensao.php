<?php 

// Definir extensões permitidas para ser enviadas para o banco de dados
function validarExtensao($file) {
    // Definir extensões permitidas
    $allowedExtensions = ['csv', 'xls'];
    
    // Extrair a extensão do arquivo
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    
    // Verificar se a extensão é permitida
    if (in_array($fileExtension, $allowedExtensions)) {
        return true;
    } else {
        return false;
    }
}




?>