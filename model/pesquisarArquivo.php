<?php

class pesquisarArquivo
{
     // Atributos de configuração da conexão
     private $nome;
     private $data;

 
     // Método construtor para definir as configurações de conexão
     public function __construct($nome, $data)
     {
         $this->host = $nome;
         $this->db_name = $data;

     }
 
     // Métodos getters para acessar as informações de configuração
     public function getNome()
     {
         return $this->nome;
     }
 
     public function getData()
     {
         return $this->data;
     }
 


   
}

?>