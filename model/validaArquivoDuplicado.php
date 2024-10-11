<?php

class validarArquivoDuplicado
{
    // Atributos de configuração da conexão
    private $hash;


    // Método construtor para definir as configurações do hash
    public function __construct($hash)
    {
        $this->host = $hash

    }

    // Métodos getters para acessar as informações do hash do arquivo
    public function getHash()
    {
        return $this->hash;
    }

   
}

?>