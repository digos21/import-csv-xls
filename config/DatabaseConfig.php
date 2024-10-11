<?php

class DatabaseConfig
{
    // Atributos de configuração da conexão
    private $host;
    private $db_name;
    private $username;
    private $password;

    // Método construtor para definir as configurações de conexão
    public function __construct($host, $db_name, $username, $password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    // Métodos getters para acessar as informações de configuração
    public function getHost()
    {
        return $this->host;
    }

    public function getDbName()
    {
        return $this->db_name;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}

?>