<?php

declare(strict_types=1);

namespace App\Service;

use App\Entidade\Aluno;
use App\Repositorio\AlunoRepositorioInterface;

class AlunoService {
    protected $repositorio;

    public function __construct(AlunoRepositorioInterface $repositorio)
    {
        $this->repositorio = $repositorio;
    } 

    public function adicionar(Aluno $aluno)
    {
        $this->repositorio->add($aluno);
    }

    public function buscarId(int $id)
    {
        return $this->repositorio->buscarId($id);
    }

    public function listar() : array
    {
        return $this->repositorio->listar();
    }
}