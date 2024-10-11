<?php

// Importa a classe de configuração da conexão ao banco de dados
require_once 'DatabaseConfig.php'; 

class DatabaseConnection
{
    private $connection; // Armazena a conexão ao banco

    // Método para conectar ao banco de dados usando a configuração
    public function connect(DatabaseConfig $config)
    {
        $this->connection = null;

        try {
            // Cria a string DSN usando os dados da configuração
            $dsn = "mysql:host=" . $config->getHost() . ";dbname=" . $config->getDbName();

            // Estabelece a conexão usando PDO
            $this->connection = new PDO($dsn, $config->getUsername(), $config->getPassword());

            // Configura o modo de erro para exceção
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Conexão realizada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }

        return $this->connection;
    }
}

function validarArquivos($file, $connection) {
    // Validar extensão do arquivo
    if (!validateFileExtension($file)) {
        return "Extensão de arquivo inválida. Por favor, envie apenas arquivos .xls ou .csv.";
    }

    // Verificar se o arquivo já foi enviado
    if (isFileAlreadyUploaded($file['name'], $connection)) {
        return "Esse arquivo já foi enviado anteriormente.";
    }

    // Salvar o arquivo
    if (saveFile($file, $connection)) {
        return "Arquivo enviado e salvo com sucesso.";
    } else {
        return "Erro ao salvar o arquivo. Tente novamente.";
    }
}


?>
