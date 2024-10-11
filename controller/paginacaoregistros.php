<?php
//Adicionar a classe de conexao ao banco de dados

function displayUploadHistory($connection, $fileName = null, $date = null, $page = 1, $limit = 10) {
    // Obter o histórico de uploads
    $files = getUploadHistory($connection, $fileName, $date, $page, $limit);
    
    // Exibir os registros
    if (!empty($files)) {
        echo "<table>";
        echo "<tr><th>Nome do Arquivo</th><th>Data de Upload</th></tr>";
        
        foreach ($files as $file) {
            echo "<tr><td>{$file['file_name']}</td><td>{$file['upload_date']}</td></tr>";
        }
        
        echo "</table>";
        
        // Obter o total de registros
        $totalRecords = getTotalRecords($connection, $fileName, $date);
        $totalPages = ceil($totalRecords / $limit);
        
        // Exibir os links de paginação
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href=\"?page=$i\">Página $i</a> ";
        }
    } else {
        echo "Nenhum registro encontrado.";
    }
}




?>