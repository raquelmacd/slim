<?php

declare(strict_types=1);

namespace App\Repositorio;

use App\Entidade\Aluno;

interface AlunoRepositorioInterface
{
    public function add(Aluno $aluno);
    public function listar(): array;
    public function buscarId(int $id) : Aluno;
}