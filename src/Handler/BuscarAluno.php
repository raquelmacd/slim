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

final class BuscarAluno extends BaseHandler {

    public function __invoke(ServerRequestInterface $request,ResponseInterface $response, $args) : ResponseInterface
    {
        $alunoRepositorio = new AlunoRepositorio(new Conexao);
        $alunoService = new AlunoService($alunoRepositorio);
        $aluno = $alunoService->buscarId((int)$args['id']);
        $response->getBody()->write($this->serializer->serialize($aluno,'json'));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    } 
}