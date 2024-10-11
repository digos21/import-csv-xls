<?php

class Database
{
    // Atributos para armazenar informações de conexão
    private $host; // Endereço do servidor (ex: localhost)
    private $db_name; // Nome do banco de dados
    private $username; // Nome de usuário
    private $password; // Senha do usuário
    private $connection; // Armazena a conexão ativa com o banco

    // Método construtor para inicializar os atributos de conexão
    public function __construct($host, $db_name, $username, $password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    // Método para criar uma conexão com o banco de dados
    public function connect()
    {
        $this->connection = null;

        try {
            // Criando a string DSN (Data Source Name) para a conexão com PDO
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;
            
            // Instanciando o objeto PDO para realizar a conexão
            $this->connection = new PDO($dsn, $this->username, $this->password);
            
            // Definindo o modo de erro do PDO para Exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Conexão realizada com sucesso!";
        } catch (PDOException $e) {
            // Caso ocorra um erro, será capturado e exibido
            echo "Erro na conexão: " . $e->getMessage();
        }

        // Retorna o objeto de conexão ou null se falhar
        return $this->connection;
    }
}

?>