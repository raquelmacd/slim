<?php

declare (strict_types=1);

namespace App\Handler;

use App\Banco\Conexao;
use App\Repositorio\AlunoRepositorio;
use App\Service\AlunoService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ListarAluno extends BaseHandler {

    public function __invoke(ServerRequestInterface $request,ResponseInterface $response) : ResponseInterface
    {
        $alunoRepositorio = new AlunoRepositorio(new Conexao);
        $alunoService = new AlunoService($alunoRepositorio);
        $alunos = $alunoService->listar();
        $response->getBody()->write($this->serializer->serialize($alunos,'json'));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    } 
}