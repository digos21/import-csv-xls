<?php
//Aqui deverá ser adicionado a função para determinar se o arquivo corresponde ao tipo csv ou xls 

// Importa a classe de configuração da conexão ao banco de dados
require_once 'DatabaseConfig.php'; 



class validarArquivoCsvXls
{
    // Atributos que serão recebidos pela página index com as informações sobre o tipo de arquivo 
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