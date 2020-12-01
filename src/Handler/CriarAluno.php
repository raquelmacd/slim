<?php

declare (strict_types=1);

namespace App\Handler;

use App\Banco\Conexao;
use App\Entidade\Aluno;
use App\Repositorio\AlunoRepositorio;
use App\Service\AlunoService;
use PDO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CriarALuno extends BaseHandler {

    public function __invoke(ServerRequestInterface $request,ResponseInterface $response) : ResponseInterface
    {
        $aluno = $this->serializer->deserialize(
            $request->getBody()->getContents(),
            Aluno::class,
            'json'
        );

        $alunoRepositorio = new AlunoRepositorio(new Conexao());
        $alunoService = new AlunoService($alunoRepositorio);
        $alunoService->adicionar($aluno);
        return $response->withStatus(201);
    } 
}