<?php

declare(strict_types=1);

namespace App\Repositorio;

use App\Entidade\Aluno;
use PDO;

class AlunoRepositorio implements AlunoRepositorioInterface
{
    private PDO $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function add(Aluno $aluno) : void
    {
        $stmt = $this->conexao->prepare("INSERT INTO aluno(nome,periodo) VALUES (:nome, :periodo)");
        $stmt->bindParam(':nome', $aluno->nome);
        $stmt->bindParam(':periodo', $aluno->periodo);
        $stmt->execute();
    }

    public function buscarId(int $id): Aluno
    {
        $buscar = $this->conexao->prepare("SELECT * FROM aluno WHERE id = :id");
        $buscar->setFetchMode(PDO::FETCH_CLASS, Aluno::class);
        $buscar->bindParam(':id',$id);
        $buscar->execute();
        return $buscar->fetch();
    }

    public function listar(): array
    {
        $consultar = $this->conexao->prepare("SELECT * FROM aluno");
        $consultar->setFetchMode(PDO::FETCH_CLASS, Aluno::class);
        $consultar->execute();

        return $consultar->fetchAll();
    }
}