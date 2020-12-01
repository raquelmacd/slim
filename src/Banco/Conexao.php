<?php

declare(strict_types=1);

namespace App\Banco;

use PDO;


class Conexao  extends PDO {

    private $host = "localhost";
    private $banco = "prova";
    private $usuario = "root";
    private $senha = "gmacinformatica_tcc";

    public function __construct(){
        $options = array(
            PDO::ATTR_STATEMENT_CLASS => array(Statement::class),
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        parent::__construct("mysql:host={$this->host};dbname={$this->banco}",$this->usuario,$this->senha, $options);
    }

}