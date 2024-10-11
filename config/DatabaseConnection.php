<?php

require_once 'DatabaseConfig.php'; // Importa a classe de configuração

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

?>
